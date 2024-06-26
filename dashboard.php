<?php
// Memulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["namapetugas"])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit; // Pastikan kode berhenti di sini
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan link CSS sesuai kebutuhan -->
    <link rel="stylesheet" href="path_to_your_css_file.css">
    <!-- Tambahkan SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Tambahkan script JavaScript untuk SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // Fungsi untuk menampilkan notifikasi selamat datang
        function showWelcomeNotification(username) {
            Swal.fire({
                icon: 'success',
                title: 'Selamat Datang!',
                text: 'Halo, ' + username + '! Selamat datang di dashboard.',
                showConfirmButton: false,
                timer: 2000, // Durasi notifikasi (ms)
                timerProgressBar: true, // Tampilkan progress bar timer
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("path_to_your_background_image.jpg")
                    left top
                    no-repeat
                ` // Latar belakang notifikasi
            });
        }

        // Panggil fungsi showWelcomeNotification saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil nama petugas dari session PHP
            let namaPetugas = "<?php echo isset($_SESSION['namapetugas']) ? $_SESSION['namapetugas'] : ''; ?>";
            // Jika nama petugas ada (login berhasil), tampilkan notifikasi
            if (namaPetugas) {
                showWelcomeNotification(namaPetugas);
            }
        });
    </script>
    <script>
    // Fungsi untuk menampilkan notifikasi selamat datang
    function showWelcomeNotification(username) {
        Swal.fire({
            title: 'Selamat Datang!',
            text: 'Halo, ' + username + '! Selamat datang di App Perpus.',
            showConfirmButton: false,
            timer: 3000, // Durasi notifikasi (ms)
            timerProgressBar: true, // Tampilkan progress bar timer
            backdrop: `
                rgb(0,0,255);opacity:0.6;)
                url("path_to_your_background_image.jpg")
                left top
                no-repeat
            `, // Latar belakang notifikasi
            imageUrl: 'img/images.png', // Tambahkan URL gambar/logo
            imageWidth: 180, // Lebar gambar dalam piksel
            imageHeight: 180, // Tinggi gambar dalam piksel
            imageAlt: 'Logo' // Deskripsi alternatif untuk gambar/logo
        });
    }

    // Panggil fungsi showWelcomeNotification saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil nama petugas dari session PHP
        let namaPetugas = "<?php echo isset($_SESSION['namapetugas']) ? $_SESSION['namapetugas'] : ''; ?>";
        // Jika nama petugas ada (login berhasil), tampilkan notifikasi
        if (namaPetugas) {
            showWelcomeNotification(namaPetugas);
        }
    });
</script>

</head>

<body>
    <?php include 'config/layout.php'; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 sm:mt-14 text-2xl font-bold dark:text-gray">
            <?php
            if (isset($_SESSION["namapetugas"])) {
                echo '<h2> Selamat Datang, ' . $_SESSION["namapetugas"] . '</h2>';
            }
            ?>
        </div>
    </div>
</body>

</html>
