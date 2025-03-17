<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Product Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('product.update', $item->id) }}"
                                    class="mt-6 space-y-6" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <x-input-label for="categories_id" :value="__('Category')" />
                                        <select id="categories_id" name="categories_id"
                                            class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == old('categories_id', $item->categories_id) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('categories_id')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
            
                                    @php
                                        $fields = [
                                            'name' => 'Product Name',
                                            'quantity' => 'Quantity',
                                            'quality' => 'Quality',
                                            'check' => 'Check',
                                            'country_of_origin' => 'Country Of Origin',
                                            'price' => 'Price',
                                            'weight' => 'Weight'
                                        ];
                                    @endphp
            
                                    @foreach ($fields as $field => $label)
                                        <div>
                                            <x-input-label for="{{ $field }}" :value="__($label)" />
                                            <x-text-input id="{{ $field }}" name="{{ $field }}" type="{{ $field === 'price' || $field === 'quantity' ? 'number' : 'text' }}"
                                                class="block w-full mt-1" autocomplete="{{ $field }}" :value="old($field, $item->$field)" />
                                            @error($field)
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
            
                                    @php
                                        $textareas = [
                                            'thumb_description' => 'Thumbnail Description',
                                            'short_description' => 'Short Description',
                                            'long_description' => 'Long Description'
                                        ];
                                    @endphp
            
                                    @foreach ($textareas as $field => $label)
                                        <div>
                                            <x-input-label for="{{ $field }}" :value="__($label)" />
                                            <textarea id="{{ $field }}" name="{{ $field }}"
                                                class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                autocomplete="{{ $field }}">{{ old($field, $item->$field) }}</textarea>
                                            @error($field)
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
            
                                    <div>
                                        <x-input-label for="photos" :value="__('Photos')" />
                                        <x-text-input id="photos" name="photos" type="file"
                                            class="block w-full mt-1" autocomplete="photos" />
                                        @error('photos')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
            
                                        <img class="mt-3" src="{{ Storage::url($item->photos) }}"
                                            style="max-width: 250px;" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                                            style="text-decoration: none;" href="{{ route('product') }}">
                                            {{ __('Cancel') }}
                                        </a>

                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>