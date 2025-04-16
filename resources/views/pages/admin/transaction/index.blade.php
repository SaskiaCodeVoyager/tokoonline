<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    <form action="" class="mb-4">
                        <x-text-input id="search" name="search" type="text" placeholder="Search" class="block w-52 m-3" autocomplete="off" />
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembeli</th>
                                    <th>product_name</th>
                                    <th>Total Price</th>
                                    <th>Status Transaction</th>
                                    <th>Checkout Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $key => $transaction)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if(isset($items[$transaction->id]))
                                                {{ $items[$transaction->id]->first_name }} {{ $items[$transaction->id]->last_name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($itemsDetails[$transaction->id]))
                                                @foreach($itemsDetails[$transaction->id] as $itemDetail)
                                                    {{ $itemDetail->product->name ?? 'ga ada' }}<br> <!-- Menampilkan nama produk -->
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>Rp.{{ number_format($transaction->total_price) }}</td>
                                        <td>
                                            @php
                                                $status = $transaction->transaction_status;
                                                $badgeColor = match ($status) {
                                                    'pending' => 'bg-yellow-500',
                                                    'completed' => 'bg-green-500',
                                                    'failed' => 'bg-red-500',
                                                    default => 'bg-gray-500',
                                                };
                                            @endphp
                                            
                                            <span class="px-2 inline-flex leading-5 text-base font-semibold rounded-full {{ $badgeColor }} text-white">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('transaction.edit', $transaction->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-700">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                 
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $query->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
