<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-blue-600">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <style>
        /* Tombol Primary (Tambah Product Baru) */
        .btn-primary {
            background-color: #60a5fa; /* Biru lembut */
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #3b82f6; /* Biru lebih gelap saat hover */
            transform: translateY(-2px);
        }

        .btn-primary:active {
            background-color: #2563eb; /* Biru lebih gelap saat di-klik */
            transform: translateY(0);
        }

        /* Header Tabel */
        th {
            background-color: #ebf8ff; /* Biru lembut */
            color: #1d4ed8; /* Biru tua untuk teks */
        }

        /* Tabel Body */
        td {
            padding: 12px;
            border-top: 1px solid #e5e7eb; /* Border lebih lembut */
            text-align: left;
        }

        /* Hover Efek Baris Tabel */
        tr:hover {
            background-color: #f0f9ff; /* Biru sangat lembut saat hover */
        }

        /* Responsivitas Tabel */
        .table-responsive {
            overflow-x: auto;
        }

        /* Styling untuk tombol di setiap baris */
        .btn-group {
            display: inline-flex;
            gap: 8px;
        }

        .btn-danger {
            background-color: #f87171; /* Merah lembut */
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #f43f5e; /* Merah lebih gelap saat hover */
        }

        /* Styling untuk pagination */
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }

        /* Styling untuk gambar produk */
        img {
            max-width: 40px;
            border-radius: 4px;
        }
    </style>

@if(session('success'))
<div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800 shadow">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800 shadow">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product.create') }}" class="mb-3 btn btn-primary">
                                    + Add New Product
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Quality</th>
                                                <th>Country Of Origin</th>
                                                <th>Min Weight</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key => $product)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category->name}}</td>
                                                    <td>Rp.{{ number_format($product->price) }}</td>
                                                    <td>{{ $product->quantity }} Pcs</td>
                                                    <td>{{ $product->quality }}</td>
                                                    <td>{{ $product->country_of_origin }}</td>
                                                    <td>{{ $product->weight }}</td>
                                                    <td>
                                                        <img src="{{ Storage::url($product->photos) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('product.edit', $product->id) }}" class="mb-1 mr-1 btn btn-primary">
                                                                Edit
                                                            </a>
                                                            <form id="deleteForm{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="button" class="mb-1 mr-1 btn btn-danger delete-btn" data-id="{{ $product->id }}">
                                                                    Delete
                                                                </button>
                                                                                                                             
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
<div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Apakah Anda yakin?</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Data ini akan dihapus secara permanen.</p>
        <div class="mt-4 flex justify-end space-x-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-lg">Batal</button>
            <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let deleteId = null;

        function openModal(event, id) {
            event.preventDefault(); // Mencegah form langsung terkirim
            deleteId = id;
            document.getElementById("confirmModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("confirmModal").style.display = "none";
            deleteId = null;
        }

        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                const productId = this.getAttribute("data-id");
                openModal(event, productId);
            });
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
            if (deleteId) {
                document.getElementById("deleteForm" + deleteId).submit();
            }
        });

        // Tutup modal dengan klik di luar modal
        window.addEventListener("click", function (event) {
            const modal = document.getElementById("confirmModal");
            if (event.target === modal) {
                closeModal();
            }
        });

        // Tutup modal dengan tombol ESC
        window.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    });
</script>


</x-app-layout>
