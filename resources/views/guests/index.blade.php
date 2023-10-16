<!DOCTYPE html>
<html>
<head>
    <title>Data Tamu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .custom-thead {
            background-color: #4c7199;
            color: #b5cde6;
        }
    </style>
</head>

<body>
    @include('components.navbaruser')

    <div class="container">
        <h1 class="mt-5">Data Tamu</h1>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <input type="search" id="searchInput" class="form-control" placeholder="Cari Nama Tamu"
                        aria-label="Cari Nama Tamu">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('guests.create') }}" class="btn btn-primary my-3">Tambah Data Tamu</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="custom-thead">
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Asal Instansi</th>
                        <th>Plat Kendaraan</th>
                        <th>Kebutuhan</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        @if (isset($guests[$i]))
                            <tr>
                                <td>{{ $guests[$i]->nama }}</td>
                                <td>{{ $guests[$i]->tanggal }}</td>
                                <td>{{ $guests[$i]->asal_instansi }}</td>
                                <td>{{ $guests[$i]->plat_kendaraan }}</td>
                                <td>{{ $guests[$i]->kebutuhan }}</td>
                                <td>
                                    <a href="{{ route('guests.edit', $guests[$i]->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="confirmDelete({{ $guests[$i]->id }})" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Status">
                                        <button type="button" class="btn btn-info" onclick="toggleStatus(this)">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-secondary" onclick="toggleStatus(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endfor
                </tbody>
            </table>
        </div>

    
        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <!-- End Pagination -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function searchGuests() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.getElementsByTagName('td')[0].innerText.toLowerCase();
                row.style.display = name.includes(searchText) ? '' : 'none';
            });
        }

        function confirmDelete(guestId) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    const deleteForm = document.createElement('form');
                    deleteForm.action = `{{ route('guests.destroy', '') }}/${guestId}`;
                    deleteForm.method = 'POST';
                    deleteForm.style.display = 'none';
                    deleteForm.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(deleteForm);
                    deleteForm.submit();
                }
            });
        }

        function toggleStatus(button) {
            const btnGroup = button.parentElement;
            const buttons = btnGroup.querySelectorAll('button');
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }

        const searchButton = document.getElementById('searchButton');
        searchButton.addEventListener('click', searchGuests);

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', (event) => {
            if (event.keyCode === 13) {
                searchGuests();
            }

            function toggleStatus(button) {
            const btnGroup = button.parentElement;
            const buttons = btnGroup.querySelectorAll('button');
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }

        const exportButton = document.getElementById('exportButton');
        exportButton.addEventListener('click', exportToExcel);

        const searchButton = document.getElementById('searchButton');
        searchButton.addEventListener('click', searchGuests);

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', (event) => {
            if (event.keyCode === 13) {
                searchGuests();
            }
        });
        });
    </script>
</body>
</html>
