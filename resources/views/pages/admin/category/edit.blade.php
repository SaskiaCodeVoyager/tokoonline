<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-blue-600">
            {{ __('Category Edit') }}
        </h2>
    </x-slot>

    <style>
        /* Text Input Styling */
        .x-text-input {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #60a5fa; /* Biru lembut untuk border */
            width: 100%;
            background-color: #eff6ff; /* Background biru soft */
            transition: border 0.3s ease;
        }
    
        .x-text-input:focus {
            border-color: #3b82f6; /* Biru lebih gelap saat fokus */
            outline: none;
            background-color: #dbeafe; /* Background biru lebih terang saat fokus */
        }
    
        /* Tombol Styling */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
    
        .btn-soft-blue {
            background-color: #3b82f6; /* Biru terang untuk tombol */
            color: white;
            border: none;
        }
    
        .btn-soft-blue:hover {
            background-color: #2563eb; /* Biru sedikit lebih gelap saat hover */
            transform: translateY(-2px); /* Efek angkat sedikit pada tombol */
        }
    
        .btn-soft-blue:active {
            background-color: #1d4ed8; /* Biru lebih gelap saat tombol ditekan */
            transform: translateY(0);
        }
    
        .btn-cancel {
            background-color: #d1e7ff; /* Biru muda untuk tombol cancel */
            color: #333333;
            border: none;
        }
    
        .btn-cancel:hover {
            background-color: #c3d9ff; /* Biru lebih terang saat hover */
        }
    
        /* Layout */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }
    
        .form-actions a {
            text-decoration: none;
            font-weight: 600;
        }
    
        .form-actions .x-primary-button {
            margin-left: auto;
        }
    </style>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('category.update', $item->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div>
                                        <x-input-label for="name" :value="__('Category Name')" />
                                        <x-text-input id="name" name="name" type="text"
                                            class="x-text-input" autocomplete="name" :value="old('name', $item->name)" />
                                        @error('name')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <x-input-label for="photo" :value="__('Category Photo')" />
                                        <input id="photo" name="photo" type="file" class="block w-full border rounded-md p-2" accept="image/*">
                                        
                                        <!-- Preview Foto Saat Ini -->
                                        @if($item->photo)
                                            <div class="mt-4">
                                                <p class="text-gray-600">Current Photo:</p>
                                                <img src="{{ asset('storage/' . $item->photo) }}" class="h-32 w-32 object-cover rounded-lg" alt="Category Image">
                                            </div>
                                        @endif

                                        @error('photo')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-actions">
                                        <a class="btn btn-cancel" href="{{ route('category') }}">
                                            {{ __('Cancel') }}
                                        </a>
                                        <x-primary-button class="btn btn-soft-blue">{{ __('Save') }}</x-primary-button>
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