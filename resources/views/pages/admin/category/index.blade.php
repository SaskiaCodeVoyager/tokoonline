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

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    });
</script>
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
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($query as $key => $category)
                                                <tr class="hover:bg-blue-50">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if($category->photo)
                                                            <img src="{{ asset('storage/' . $category->photo) }}" class="h-16 w-16 object-cover rounded-lg" alt="Category Image">
                                                        @else
                                                            <span class="text-gray-500">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('category.edit', $category->id) }}" class="mb-1 mr-1 btn btn-soft-blue">
                                                                Edit
                                                            </a>
                                                            @if(!$category->products()->exists()) 
                                                                <form id="deleteForm{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" ">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="mb-1 mr-1 btn btn-soft-red delete-btn" data-id="{{ $category->id }}">
                                                                        Delete
                                                                    </button>                                                                    
                                                                </form>
                                                            @else
                                                                <button class="mb-1 mr-1 btn btn-secondary cursor-not-allowed" disabled>
                                                                    In Use
                                                                </button>
                                                            @endif
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

<!-- Modal Konfirmasi -->
<div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Apakah Anda yakin?</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Data kategori ini akan dihapus secara permanen.</p>
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
            document.getElementById("confirmModal").classList.remove("hidden");
            document.getElementById("confirmModal").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("confirmModal").classList.add("hidden");
            document.getElementById("confirmModal").classList.remove("flex");
            deleteId = null;
        }

        // Event listener untuk semua tombol delete
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                const categoryId = this.getAttribute("data-id");
                openModal(event, categoryId);
            });
        });

        // Tombol konfirmasi hapus
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

