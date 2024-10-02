<?php
include 'db.php'; // Pastikan koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/alternative.css" />

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <title>Alternatif</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="header-container" data-aos="fade-right" data-aos-duration="2000">
        <span class="title-txt">Data-data <span class="rec-txt">alternatif</span>.</span>
        <span class="sub-title-txt">Dibawah ini merupakan tabel berisi laptop-laptop yang ada di
          dalam database kami ⭐</span>
      </div>
      <div class="table-container" data-aos="fade-left" data-aos-duration="2000">
        <table id="laptopTable">
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
            $sql2 = "SELECT * FROM laptop";
            $q2 = mysqli_query($koneksi, $sql2);
            $urut = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
              $id = $r2['id'];
              $laptop_name = $r2['laptop_name'];
              $laptop_screen_inches = $r2['laptop_screen_inches'];
              $laptop_weight = $r2['laptop_weight'] . " Kg";
              $laptop_ram = $r2['laptop_ram'] . " GB";
              $laptop_storage = "SSD " . $r2['laptop_storage'] . " GB";
              $laptop_price = "Rp " . number_format($r2['laptop_price'], 0, ',', '.');
            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td><?php echo $laptop_name ?></td>
                <td><?php echo $laptop_screen_inches . " inches" ?></td>
                <td><?php echo $laptop_weight ?></td>
                <td><?php echo $laptop_ram ?></td>
                <td><?php echo $laptop_storage ?></td>
                <td><?php echo $laptop_price ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="button-container">
        <div class="left-btn">
          <a href="welcome.php" class="back-btn"> Kembali </a>
        </div>
        <div class="right-btn">
          <a href="about.php" class="nav-btn">Selanjutnya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery and datatables js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <script>
    $(document).ready(function() {
      $("#laptopTable").DataTable({
        scrollX: true,
      });
    });
  </script>
  <script>
    AOS.init({
      once: true,
    });
  </script>
</body>

</html>