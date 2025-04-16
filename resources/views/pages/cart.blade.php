@extends('layouts.home')

@section('title')
    Cart | Merchandise Anime
@endsection

@section('content')
    <!-- Single Page Header start -->
    <div class="py-5 container-fluid page-header">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="mb-0 breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="text-white breadcrumb-item active">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    @if (session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <!-- Cart Page Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">

            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="select-all"></th>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $subtotal = 0; @endphp
                    @foreach ($carts as $cart)
                        <tr>
                            <td>
                                <input type="checkbox" class="cart-checkbox" name="selected_items[]"
                                    value="{{ $cart->id }}">
                            </td>
                            <th scope="row">
                                <img src="{{ Storage::url($cart->product->photos) }}" class="img-fluid rounded-circle"
                                    style="width: 80px; height: 80px;" alt="">
                            </th>
                            <td>{{ $cart->product->name }}</td>
                            <td>Rp.{{ number_format($cart->product->price) }}</td>
                            <td>{{ $cart->qty }} Pcs</td>
                            @php
                                $total = $cart->product->price * $cart->qty;
                                $subtotal += $total;
                            @endphp
                            <td>Rp.{{ number_format($total) }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border btn btn-md rounded-circle bg-light">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($carts) > 0)
                <form action="{{ route('checkout.index') }}" method="GET" id="checkout-form">
                        <input type="hidden" name="selected_items" id="selected-items">
                    <div class="d-flex justify-content-end">
                        <h5>Total: <span id="total-amount">Rp.0</span></h5>
                    </div>
                    <button type="submit"
                        class="px-4 py-3 mb-4 btn border-secondary rounded-pill text-primary text-uppercase ms-4"
                        id="checkout-button">Proceed Checkout
                    </button>
                </form>
            @endif
        </div>
    </div>
    <!-- Cart Page End -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkboxes = document.querySelectorAll(".cart-checkbox");
            let totalAmount = document.getElementById("total-amount");
            let selectAll = document.getElementById("select-all");
            let selectedItemsInput = document.getElementById("selected-items");
            let checkoutForm = document.getElementById("checkout-form");
            let checkoutButton = document.getElementById("checkout-button");

            function updateTotal() {
                let total = 0;
                let selectedItems = [];

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        let row = checkbox.closest("tr");
                        let price = parseInt(row.children[5]?.innerText.replace(/\D/g, "")) || 0;
                        total += price;
                        selectedItems.push(checkbox.value);
                    }
                });

                totalAmount.innerText = "Rp." + total.toLocaleString();
                selectedItemsInput.value = selectedItems.join(",");
                checkoutButton.disabled = selectedItems.length === 0; // Disable tombol jika tidak ada item terpilih
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", updateTotal);
            });

            selectAll.addEventListener("change", function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
                updateTotal();
            });

            checkoutForm.addEventListener("submit", function(event) {
                if (selectedItemsInput.value.trim() === "") {
                    event.preventDefault(); // Cegah form submit jika tidak ada item yang dipilih
                    alert("Pilih setidaknya satu item sebelum checkout.");
                }
            });

            updateTotal();
        });
    </script>

@endsection
