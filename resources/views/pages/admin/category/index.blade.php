<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-blue-600">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <style>
    /* Tombol Soft Blue */
.btn-soft-blue {
    background-color: #60a5fa; /* Biru lembut */
    color: white;
    border: none;
    padding: 10px 20px; /* Memperbesar ukuran tombol */
    border-radius: 8px; /* Menggunakan border-radius yang lebih besar untuk sudut yang lebih lembut */
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-block;
    cursor: pointer;
}

.btn-soft-blue:hover {
    background-color: #3b82f6; /* Biru yang lebih gelap saat hover */
    transform: translateY(-2px); /* Efek tombol naik sedikit saat hover */
}

.btn-soft-blue:active {
    background-color: #2563eb; /* Biru yang lebih gelap ketika tombol ditekan */
    transform: translateY(0); /* Mengembalikan posisi tombol ketika ditekan */
}

/* Tombol Soft Red */
.btn-soft-red {
    background-color: #f87171; /* Merah lembut */
    color: white;
    border: none;
    padding: 10px 20px; /* Memperbesar ukuran tombol */
    border-radius: 8px;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-block;
    cursor: pointer;
}

.btn-soft-red:hover {
    background-color: #f43f5e; /* Merah yang lebih gelap saat hover */
    transform: translateY(-2px); /* Efek tombol naik sedikit saat hover */
}

.btn-soft-red:active {
    background-color: #ef4444; /* Merah lebih gelap ketika tombol ditekan */
    transform: translateY(0); /* Mengembalikan posisi tombol ketika ditekan */
}

/* Header Tabel */
.table th {
    background-color: #ebf8ff; /* Biru lembut untuk header */
    color: #1d4ed8; /* Biru tua untuk teks */
    padding: 12px;
    text-align: left;
    font-weight: bold;
}

/* Tabel Body */
.table td {
    border-top: 1px solid #e5e7eb; /* Warna border lebih lembut */
    padding: 12px;
    text-align: left;
}

/* Hover Efek Baris Tabel */
.table tr:hover {
    background-color: #f0f9ff; /* Biru sangat lembut saat hover */
}

/* Efek Hover pada Baris Tabel */
.table-hover tbody tr:hover {
    background-color: #f3f4f6; /* Efek hover saat memilih row */
}

/* Responsivitas Tabel */
.table-responsive {
    overflow-x: auto;
}

/* Padding Tabel */
.table th, .table td {
    padding: 12px;
    text-align: left;
}

/* Header Section */
.x-slot[name="header"] h2 {
    color: #3b82f6; /* Warna biru untuk judul */
}

/* Background Card */
.card-body {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Button Group Styling */
.btn-group {
    display: inline-flex;
    gap: 8px;
}

/* Link Button Styles */
a.btn {
    font-weight: bold;
    text-decoration: none;
}

</style>
    <!-- Menampilkan Pesan Sukses -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Menampilkan Pesan Error -->
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('category.create') }}" class="mb-3 btn btn-soft-blue">
                                    + Add New Category
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($query as $key => $category)
                                                <tr class="hover:bg-blue-50">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('category.edit', $category->id) }}" class="mb-1 mr-1 btn btn-soft-blue">
                                                                Edit
                                                            </a>
                                                            <form id="deleteForm{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="mb-1 mr-1 btn btn-soft-red">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$query->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
