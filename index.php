<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Akademik</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        /* Styling untuk link Login dan Daftar di pojok kanan atas */
        .login-register-links {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            z-index: 1000; /* Menjaga link tetap terlihat di atas elemen lain */
        }

        .login-register-links a {
            text-decoration: none;
            color: #fff;  /* Warna putih agar terlihat di latar belakang gelap */
            margin-left: 15px;
        }

        .login-register-links a:hover {
            text-decoration: underline;
            color: #FFD700;  /* Mengubah warna saat hover agar lebih menonjol */
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Sistem Akademik Gabriel</h1>

    <marquee behavior="scroll" direction="left" scrollamount="6" style="color: #007BFF; font-weight: bold; margin-top: 10px;">
        👋 Sistem Akademik - Kelola Data Mahasiswa, Mata Kuliah, Nilai, Jadwal Kuliah & Transkrip Nilai dengan Mudah dan Cepat!
    </marquee>

    <!-- Menambahkan kode login/daftar atau logout berdasarkan status login -->
    <?php
    session_start();  // Mulai session

    // Cek apakah pengguna sudah login
    if (isset($_SESSION['user_id'])) {
        $username = $_SESSION['username'];
        // Menampilkan tombol Logout
        echo "<div class='login-register-links'>
                <a href='logout.php'>Logout</a>
                <span>Welcome, $username</span>
              </div>";
    } else {
        // Menampilkan link Login dan Daftar
        echo "<div class='login-register-links'>
                <a href='login_siswa.php'>Login</a>
                <a href='register_siswa.php'>Daftar</a>
              </div>";
    }
    ?>

    <div class="menu-container">
        <a href="mahasiswa/index.php" class="menu-box">📘 Data Mahasiswa</a>
        <a href="mata_kuliah/index.php" class="menu-box">📗 Mata Kuliah</a>
        <a href="nilai/index.php" class="menu-box">📙 Nilai</a>
        <a href="jadwal/index.php" class="menu-box">📕 Jadwal Kuliah</a>
        <a href="transkrip/index.php" class="menu-box">📓 Transkrip Nilai</a>
    </div>

    <div class="header-bar">
        <div class="logo-container">
            <img src="https://png.pngtree.com/png-clipart/20240901/original/pngtree-jesus-logo-vector-png-image_15907205.png" alt="Logo Sekolah" class="logo">
        </div>
    </div>

</body>
<footer class="watermark">
    &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
</footer>

</html>
