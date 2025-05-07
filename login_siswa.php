<?php
session_start();  // Memulai sesi
include('C:/laragon/www/akademik/config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Username atau password salah.";
        }
    } else {
        $error = "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Jika pakai file eksternal -->
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

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
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

    <h1>Login Siswa</h1>

    <div class="form-container">
        <h2 style="text-align:center; color:#333;">Masuk ke Sistem</h2>
        <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>

        <form action="login_siswa.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>

</body>
</html>
