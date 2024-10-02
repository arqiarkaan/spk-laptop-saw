<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.php");
  exit();
}

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

include 'db.php';

$sql_max_min = "SELECT 
                    MAX(laptop_screen_inches) AS max_screen_inches,
                    MIN(laptop_screen_inches) AS min_screen_inches,
                    MAX(laptop_weight) AS max_weight,
                    MIN(laptop_weight) AS min_weight,
                    MAX(laptop_ram) AS max_ram,
                    MIN(laptop_ram) AS min_ram,
                    MAX(laptop_storage) AS max_storage,
                    MIN(laptop_storage) AS min_storage,
                    MAX(laptop_price) AS max_price,
                    MIN(laptop_price) AS min_price
                FROM laptop";
$result_max_min = mysqli_query($koneksi, $sql_max_min);

if (!$result_max_min) {
  die("Gagal mendapatkan nilai maksimum dan minimum");
}

$row_max_min = mysqli_fetch_assoc($result_max_min);
$max_screen_inches = $row_max_min['max_screen_inches'];
$min_screen_inches = $row_max_min['min_screen_inches'];
$max_weight = $row_max_min['max_weight'];
$min_weight = $row_max_min['min_weight'];
$max_ram = $row_max_min['max_ram'];
$min_ram = $row_max_min['min_ram'];
$max_storage = $row_max_min['max_storage'];
$min_storage = $row_max_min['min_storage'];
$max_price = $row_max_min['max_price'];
$min_price = $row_max_min['min_price'];

// Kalkulasi ranking berdasarkan bobot
$sql = "SELECT 
    id, 
    laptop_name, 
    laptop_ram, 
    laptop_storage, 
    laptop_screen_inches, 
    laptop_weight, 
    laptop_price,
    
    -- Normalisasi untuk RAM
    (
        CASE 
            WHEN '$ram_type' = 'benefit' THEN
                $ram_weight * (laptop_ram / $max_ram)
            ELSE
                $ram_weight * ($min_ram / laptop_ram)
        END
    ) AS norm_ram,
    
    -- Normalisasi untuk Storage
    (
        CASE 
            WHEN '$storage_type' = 'benefit' THEN
                $storage_weight * (laptop_storage / $max_storage)
            ELSE
                $storage_weight * ($min_storage / laptop_storage)
        END
    ) AS norm_storage,
    
    -- Normalisasi untuk Screen Size
    (
        CASE 
            WHEN '$screen_size_type' = 'benefit' THEN
                $screen_size_weight * (laptop_screen_inches / $max_screen_inches)
            ELSE
                $screen_size_weight * ($min_screen_inches / laptop_screen_inches)
        END
    ) AS norm_screen_inches,
    
    -- Normalisasi untuk Weight
    (
        CASE 
            WHEN '$weight_type' = 'benefit' THEN
                $weight_weight * (laptop_weight / $max_weight)
            ELSE
                $weight_weight * ($min_weight / laptop_weight)
        END
    ) AS norm_weight,
    
    -- Normalisasi untuk Price
    (
        CASE 
            WHEN '$price_type' = 'benefit' THEN
                $price_weight * (laptop_price / $max_price)
            ELSE
                $price_weight * ($min_price / laptop_price)
        END
    ) AS norm_price,
    
    -- Perhitungan nilai ranking
    (
        -- Penjumlahan semua normalisasi
        (
            CASE 
                WHEN '$ram_type' = 'benefit' THEN
                    $ram_weight * (laptop_ram / $max_ram)
                ELSE
                    $ram_weight * ($min_ram / laptop_ram)
            END
        ) +
        (
            CASE 
                WHEN '$storage_type' = 'benefit' THEN
                    $storage_weight * (laptop_storage / $max_storage)
                ELSE
                    $storage_weight * ($min_storage / laptop_storage)
            END
        ) +
        (
            CASE 
                WHEN '$screen_size_type' = 'benefit' THEN
                    $screen_size_weight * (laptop_screen_inches / $max_screen_inches)
                ELSE
                    $screen_size_weight * ($min_screen_inches / laptop_screen_inches)
            END
        ) +
        (
            CASE 
                WHEN '$weight_type' = 'benefit' THEN
                    $weight_weight * (laptop_weight / $max_weight)
                ELSE
                    $weight_weight * ($min_weight / laptop_weight)
            END
        ) +
        (
            CASE 
                WHEN '$price_type' = 'benefit' THEN
                    $price_weight * (laptop_price / $max_price)
                ELSE
                    $price_weight * ($min_price / laptop_price)
            END
        )
    ) AS nilai_ranking

FROM 
    laptop

ORDER BY 
    nilai_ranking DESC;
";

$result = mysqli_query($koneksi, $sql);
if (!$result) {
  die("Gagal melakukan query");
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
  <link rel="stylesheet" href="css/calculation.css" />

  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <title>Preferensi</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="header-container">
        <span class="title-txt">Berikut adalah <span class="rec-txt">perhitungannya</span>.</span>
        <span class="sub-title-txt">😎 <span class="rec-txt">Preferensi (03/03)</span>. Perhitungan akhir
          untuk menentukan skor atau peringkat relatif dari setiap
          alternatif berdasarkan bobot kriteria yang telah ditentukan
          dalam proses SAW</span>
      </div>
      <div class="table-container">
        <table id="preferenceTable">
          <thead>
            <tr>
              <th>⭐</th>
              <th>Laptop</th>
              <th>Ukuran Layar (K1)</th>
              <th>Berat (K2)</th>
              <th>Memori RAM (K3)</th>
              <th>Kapasitas Penyimpanan (k4)</th>
              <th>Harga (K5)</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $urut = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td><?php echo $row['laptop_name'] ?></td>
                <td><?php echo number_format($row['norm_screen_inches'], 4) ?></td>
                <td><?php echo number_format($row['norm_weight'], 4) ?></td>
                <td><?php echo number_format($row['norm_ram'], 4) ?></td>
                <td><?php echo number_format($row['norm_storage'], 4) ?></td>
                <td><?php echo number_format($row['norm_price'], 4) ?></td>
                <td><?php echo number_format($row['nilai_ranking'], 4) ?></td>
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

            <button type="submit" class="nav-btn-a">
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

            <button type="submit" class="active">
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