<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.php");
  exit();
}

include 'db.php';

$ram_weight = $_POST['ram_weight'] ?? 1;
$storage_weight = $_POST['storage_weight'] ?? 1;
$screen_size_weight = $_POST['screen_size_weight'] ?? 1;
$weight_weight = $_POST['weight_weight'] ?? 1;
$price_weight = $_POST['price_weight'] ?? 1;

$ram_type = $_POST['ram_type'] ?? 'benefit';
$storage_type = $_POST['storage_type'] ?? 'benefit';
$screen_size_type = $_POST['screen_size_type'] ?? 'benefit';
$weight_type = $_POST['weight_type'] ?? 'cost';
$price_type = $_POST['price_type'] ?? 'cost';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/calculation.css" />


  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <title>Matriks Nilai</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="header-container">
        <span class="title-txt">Berikut adalah <span class="rec-txt">perhitungannya</span>.</span>
        <span class="sub-title-txt">🤔 <span class="rec-txt">Matriks Nilai (01/03)</span>. Mewakili
          skor atau nilai relatif dari setiap alternatif terhadap setiap kriteria
          yang dievaluasi</span>
      </div>
      <div class="table-container">
        <table id="gradeTable">
          <thead>
            <tr>
              <th>⭐</th>
              <th>Laptop</th>
              <th>Ukuran Layar (K1)</th>
              <th>Berat (K2)</th>
              <th>Memori RAM (K3)</th>
              <th>Kapasitas Penyimpanan (k4)</th>
              <th>Harga (K5)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2   = "select * from laptop";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;
            while ($row = mysqli_fetch_array($q2)) {
            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td><?php echo $row['laptop_name'] ?></td>
                <td><?php echo $row['laptop_screen_inches'] ?></td>
                <td><?php echo $row['laptop_weight'] ?></td>
                <td><?php echo $row['laptop_ram'] ?></td>
                <td><?php echo $row['laptop_storage'] ?></td>
                <td><?php echo $row['laptop_price'] ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="button-container">
        <div class="left-btn">
          <form action="recommendation.php" method="POST">
            <input type="hidden" name="ram_weight" value="<?php echo htmlspecialchars($ram_weight); ?>">
            <input type="hidden" name="storage_weight" value="<?php echo htmlspecialchars($storage_weight); ?>">
            <input type="hidden" name="screen_size_weight" value="<?php echo htmlspecialchars($screen_size_weight); ?>">
            <input type="hidden" name="weight_weight" value="<?php echo htmlspecialchars($weight_weight); ?>">
            <input type="hidden" name="price_weight" value="<?php echo htmlspecialchars($price_weight); ?>">

            <input type="hidden" name="ram_type" value="<?php echo htmlspecialchars($ram_type); ?>">
            <input type="hidden" name="storage_type" value="<?php echo htmlspecialchars($storage_type); ?>">
            <input type="hidden" name="screen_size_type" value="<?php echo htmlspecialchars($screen_size_type); ?>">
            <input type="hidden" name="weight_type" value="<?php echo htmlspecialchars($weight_type); ?>">
            <input type="hidden" name="price_type" value="<?php echo htmlspecialchars($price_type); ?>">

            <button type="submit" class="back-btn">
              <p>Kembali ke rekomendasi</p>
            </button>
          </form>
        </div>
        <div class="right-btn">
          <form action="valuematrix.php" method="POST">
            <input type="hidden" name="ram_weight" value="<?php echo htmlspecialchars($ram_weight); ?>">
            <input type="hidden" name="storage_weight" value="<?php echo htmlspecialchars($storage_weight); ?>">
            <input type="hidden" name="screen_size_weight" value="<?php echo htmlspecialchars($screen_size_weight); ?>">
            <input type="hidden" name="weight_weight" value="<?php echo htmlspecialchars($weight_weight); ?>">
            <input type="hidden" name="price_weight" value="<?php echo htmlspecialchars($price_weight); ?>">

            <input type="hidden" name="ram_type" value="<?php echo htmlspecialchars($ram_type); ?>">
            <input type="hidden" name="storage_type" value="<?php echo htmlspecialchars($storage_type); ?>">
            <input type="hidden" name="screen_size_type" value="<?php echo htmlspecialchars($screen_size_type); ?>">
            <input type="hidden" name="weight_type" value="<?php echo htmlspecialchars($weight_type); ?>">
            <input type="hidden" name="price_type" value="<?php echo htmlspecialchars($price_type); ?>">

            <button type="submit" class="active">
              <p>Matriks nilai</p>
            </button>
          </form>
          <form action="normalization.php" method="POST">
            <input type="hidden" name="ram_weight" value="<?php echo htmlspecialchars($ram_weight); ?>">
            <input type="hidden" name="storage_weight" value="<?php echo htmlspecialchars($storage_weight); ?>">
            <input type="hidden" name="screen_size_weight" value="<?php echo htmlspecialchars($screen_size_weight); ?>">
            <input type="hidden" name="weight_weight" value="<?php echo htmlspecialchars($weight_weight); ?>">
            <input type="hidden" name="price_weight" value="<?php echo htmlspecialchars($price_weight); ?>">

            <input type="hidden" name="ram_type" value="<?php echo htmlspecialchars($ram_type); ?>">
            <input type="hidden" name="storage_type" value="<?php echo htmlspecialchars($storage_type); ?>">
            <input type="hidden" name="screen_size_type" value="<?php echo htmlspecialchars($screen_size_type); ?>">
            <input type="hidden" name="weight_type" value="<?php echo htmlspecialchars($weight_type); ?>">
            <input type="hidden" name="price_type" value="<?php echo htmlspecialchars($price_type); ?>">

            <button type="submit" class="nav-btn-a">
              <p>Normalisasi</p>
            </button>
          </form>
          <form action="preference.php" method="POST">
            <input type="hidden" name="ram_weight" value="<?php echo htmlspecialchars($ram_weight); ?>">
            <input type="hidden" name="storage_weight" value="<?php echo htmlspecialchars($storage_weight); ?>">
            <input type="hidden" name="screen_size_weight" value="<?php echo htmlspecialchars($screen_size_weight); ?>">
            <input type="hidden" name="weight_weight" value="<?php echo htmlspecialchars($weight_weight); ?>">
            <input type="hidden" name="price_weight" value="<?php echo htmlspecialchars($price_weight); ?>">

            <input type="hidden" name="ram_type" value="<?php echo htmlspecialchars($ram_type); ?>">
            <input type="hidden" name="storage_type" value="<?php echo htmlspecialchars($storage_type); ?>">
            <input type="hidden" name="screen_size_type" value="<?php echo htmlspecialchars($screen_size_type); ?>">
            <input type="hidden" name="weight_type" value="<?php echo htmlspecialchars($weight_type); ?>">
            <input type="hidden" name="price_type" value="<?php echo htmlspecialchars($price_type); ?>">

            <button type="submit" class="nav-btn-a">
              <p>Preferensi</p>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery and datatables js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <script src="js/calctable.js"></script>
</body>

</html>