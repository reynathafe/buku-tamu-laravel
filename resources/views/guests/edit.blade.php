<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Tamu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('components.navbar')

    <div class="container">
        <h1 class="mt-5">Edit Data Tamu</h1>

        <form id="editForm" action="{{ route('guests.update', $guest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $guest->nama }}"
                    required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $guest->tanggal }}"
                    required>
            </div>

            <div class="form-group">
                <label for="asal_instansi">Asal Instansi:</label>
                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi"
                    value="{{ $guest->asal_instansi }}" required>
            </div>

            <div class="form-group">
                <label for="plat_kendaraan">Plat Kendaraan:</label>
                <input type="text" class="form-control" id="plat_kendaraan" name="plat_kendaraan"
                    value="{{ $guest->plat_kendaraan }}" required>
            </div>

            <div class="form-group">
                <label for="kebutuhan">Kebutuhan:</label>
                <textarea class="form-control" id="kebutuhan" name="kebutuhan">{{ $guest->kebutuhan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>

        <a href="{{ route('guests.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to show Sweet Alert on successful form submission
            function showSuccessAlert() {
                swal("Sukses!", "Data berhasil disimpan", "success")
                .then((value) => {
                    // Redirect to the guests index page
                    window.location.href = "{{ route('guests.index') }}";
                });
            }

            // Function to handle form submission via AJAX
            $(document).on('submit', '#editForm', function(event) {
                event.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        showSuccessAlert();
                    },
                    error: function(xhr) {
                        // Handle errors if any
                        console.log(xhr.responseText);
                        swal("Oops...", "Terjadi kesalahan. Silakan coba lagi.", "error");
                    }
                });
            });
        });
    </script>
</body>
</html>