<?php
include 'db.php';

session_start(); // Mulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) { // Verifikasi password
            $_SESSION['username'] = $user['username']; // Simpan username ke session
            $message = "Swal.fire('Login berhasil!', 'Selamat datang, Anda akan dialihkan ke menu kriteria', 'success').then(() => { window.location.href = 'criteria.php'; });";
        } else {
            $message = "Swal.fire('Login gagal!', 'Password yang anda masukkan salah, silahkan coba lagi', 'error');";
        }
    } else {
        $message = "Swal.fire('Login gagal!', 'User tidak ditemukan, mohon buat akun terlebih dahulu', 'error');";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/favicon-32x32.png" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/account.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="sub-container">
            <div class="laptop-image" data-aos="fade-right" data-aos-duration="2000">
                <img src="img/laptop.png" class="side-img" alt="laptop img" />
            </div>
            <form class="login-container" id="login-form" method="POST" action="login.php" data-aos="fade-left" data-aos-duration="2000">
                <div class="form-header">
                    <img src="img/logo.png" alt="laptop logo" class="logo-img" />
                    <span class="welcome-txt">Halo! 👋</span>
                    <span class="sub-header-txt">Siap untuk memilih laptop yang Anda inginkan?</span>
                </div>
                <div class="login-form">
                    <div class="input-container">
                        <label for="login-username">Username <span class="important-txt">*</span></label>
                        <input type="text" id="login-username" name="username" required />
                    </div>
                    <div class="input-container">
                        <label for="login-password">Password <span class="important-txt">*</span></label>
                        <input type="password" id="login-password" name="password" required />
                    </div>
                    <div class="login-form-bottom">
                        <div class="show-password">
                            <input type="checkbox" onclick="showPassword()" />
                            <span>Lihat Password</span>
                        </div>
                        <span class="nav-txt nav-txt-2" id="forgot">Lupa Password?</span>
                    </div>
                </div>
                <div class="bottom-form">
                    <input type="submit" class="submit-btn" value="Login" />
                    <div class="bottom-header">
                        <span>Belum mempunyai akun?</span>
                        <a href="register.php" class="nav-txt">Daftar Disini</a>
                        <span> atau pelajari dahulu </span><a href="welcome.php" class="nav-txt">Disini</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($message)) : ?>
        <script>
            <?php echo $message; ?>
        </script>
    <?php endif; ?>

    <script src="js/script.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
</body>

</html>