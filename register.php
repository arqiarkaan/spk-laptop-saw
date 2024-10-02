<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);
  $repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);

  // Check if passwords match
  if ($password !== $repassword) {
    $message = "Swal.fire('Error', 'Passwords do not match', 'error');";
  } else {
    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($result) > 0) {
      $message = "Swal.fire('Registrasi gagal', 'Username sudah digunakan, harap membuat username yang lain', 'error');";
    } else {
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insert new user
      $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
      if (mysqli_query($koneksi, $query)) {
        $message = "Swal.fire('Registrasi berhasil', 'Silahkan login dengan username dan password yang dibuat', 'success').then(() => { window.location.href = 'login.php'; });";
      } else {
        $message = "Swal.fire('Registrasi gagal', 'Koneksi database error', 'error');";
      }
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/account.css" />
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Register</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="laptop-image" data-aos="fade-right" data-aos-duration="2000">
        <img src="img/laptop.png" class="side-img" alt="laptop img" />
      </div>
      <form class="register-container" id="register-form" method="POST" action="register.php" data-aos="fade-left" data-aos-duration="2000">
        <div class="form-header">
          <img src="img/logo.png" alt="laptop logo" class="logo-img" />
          <span class="welcome-txt">Selamat datang! 👋</span>
          <span class="sub-header-txt">Siap untuk memilih laptop yang Anda inginkan?</span>
        </div>
        <div class="login-form">
          <div class="input-container">
            <label for="signup-username">Username <span class="important-txt">*</span></label>
            <input type="text" name="username" id="signup-username" required />
          </div>
          <div class="input-container">
            <label for="signup-password">Password <span class="important-txt">*</span></label>
            <input type="password" name="password" id="signup-password" required />
          </div>
          <div class="input-container">
            <label for="signup-repassword">Konfirmasi Password <span class="important-txt">*</span></label>
            <input type="password" name="repassword" id="signup-repassword" required />
          </div>
          <div class="login-form-bottom">
            <div class="show-password">
              <input type="checkbox" onclick="showPasswordAndConfirmPassword()" />
              <span>Lihat Password</span>
            </div>
            <span class="nav-txt nav-txt-2" id="forgot">Lupa Password?</span>
          </div>
        </div>
        <div class="bottom-form">
          <input type="submit" class="submit-btn" value="Register" />
          <div class="bottom-header">
            <span>Sudah mempunyai akun?</span>
            <a href="login.php" class="nav-txt">Login Disini</a>
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