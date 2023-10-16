<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9">
</head>

<body>
    @include('components.navbaruser')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="mt-5">Website Kunjungan Tamu </h3>
    
                <form id="guestForm" action="{{ route('guests.store') }}" method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
    
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Pilih tanggal" required>
                    </div>
    
                    <div class="form-group">
                        <label for="asal_instansi">Asal Instansi:</label>
                        <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Masukkan asal instansi" required>
                    </div>
    
                    <div class="form-group">
                        <label for="plat_kendaraan">Plat Kendaraan:</label>
                        <input type="text" class="form-control" id="plat_kendaraan" name="plat_kendaraan" placeholder="Masukkan plat kendaraan" required>
                    </div>
    
                    <div class="form-group">
                        <label for="kebutuhan">Kebutuhan:</label>
                        <textarea class="form-control" id="kebutuhan" name="kebutuhan" placeholder="Masukkan kebutuhan"></textarea>
                    </div>
    
                    <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Submit the form via AJAX
            $.ajax({
                url: $('#guestForm').attr('action'),
                type: 'POST',
                data: $('#guestForm').serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Redirect to the welcome page after the alert is closed
                        window.location.href = "{{ route('guests.welcome') }}";
                    });
                },
                error: function(xhr) {
                    // Handle errors if any
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan. Silakan coba lagi.'
                    });
                }
            });
        });
    </script>
</body>

</html>
