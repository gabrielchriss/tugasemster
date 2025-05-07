<?php
include('C:/laragon/www/akademik/config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<div class='success-message'>Pendaftaran berhasil! <a href='login_siswa.php'>Login</a></div>";
    } else {
        echo "<div class='error-message'>Error: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 30px;
            background-color: #007BFF;
            color: white;
            margin: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .form-container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 60px auto;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        .success-message, .error-message {
            text-align: center;
            margin: 20px auto;
            width: 400px;
            font-weight: bold;
            padding: 10px;
            border-radius: 4px;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .watermark {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: rgba(0, 0, 0, 0.3);
            font-size: 14px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h1>Daftar Akun Baru</h1>

    <div class="form-container">
        <h2 style="text-align:center; color:#333;">Buat Akun</h2>
        <form action="register_siswa.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Daftar</button>
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>

</body>
</html>
