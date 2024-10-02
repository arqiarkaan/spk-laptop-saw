<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/criteria.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- Sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Criteria</title>
</head>

<body>
  <button class="logout-button">
    <i class="fas fa-sign-out-alt"></i>&nbsp;
    <span class="logout-text">Logout</span>
  </button>
  <form class="container" action="recommendation.php" method="POST">
    <div class="sub-container">
      <div class="left-box">
        <div class="title">
          <span>Pilih prioritas<span class="criteria-txt"> kriteria</span>
            Anda.</span>
        </div>
        <div class="choosing-wrapper">
          <div class="criteria-wrap">
            <div class="sub-title"><span>Kriteria</span></div>
            <div class="option-container">
              <div class="option-box">
                <span class="select-label">Ukuran Layar (K1)</span>
                <select class="form-select" id="screen_size_weight" name="screen_size_weight" required>
                  <option value="">- Pilih disini -</option>
                  <option value="0.40">Sangat tinggi</option>
                  <option value="0.25">Tinggi</option>
                  <option value="0.20">Sedang</option>
                  <option value="0.10">Rendah</option>
                  <option value="0.05">Sangat rendah</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Berat (K2)</span>
                <select class="form-select" id="weight_weight" name="weight_weight" required>
                  <option value="">- Pilih disini -</option>
                  <option value="0.40">Sangat tinggi</option>
                  <option value="0.25">Tinggi</option>
                  <option value="0.20">Sedang</option>
                  <option value="0.10">Rendah</option>
                  <option value="0.05">Sangat rendah</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Memori RAM (K3)</span>
                <select class="form-select" id="ram_weight" name="ram_weight" required>
                  <option value="">- Pilih disini -</option>
                  <option value="0.40">Sangat tinggi</option>
                  <option value="0.25">Tinggi</option>
                  <option value="0.20">Sedang</option>
                  <option value="0.10">Rendah</option>
                  <option value="0.05">Sangat rendah</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Kapasitas Penyimpanan (K4)</span>
                <select class="form-select" id="storage_weight" name="storage_weight" required>
                  <option value="">- Pilih disini -</option>
                  <option value="0.40">Sangat tinggi</option>
                  <option value="0.25">Tinggi</option>
                  <option value="0.20">Sedang</option>
                  <option value="0.10">Rendah</option>
                  <option value="0.05">Sangat rendah</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Harga (K5)</span>
                <select class="form-select" id="price_weight" name="price_weight" required>
                  <option value="">- Pilih disini -</option>
                  <option value="0.40">Sangat tinggi</option>
                  <option value="0.25">Tinggi</option>
                  <option value="0.20">Sedang</option>
                  <option value="0.10">Rendah</option>
                  <option value="0.05">Sangat rendah</option>
                </select>
              </div>
            </div>
          </div>
          <div class="attribute-wrap">
            <div class="sub-title"><span>Atribut</span></div>
            <div class="option-container">
              <div class="option-box">
                <span class="select-label">Cost/Benefit <span class="show">(Ukuran Layar)</span></span>
                <select class="form-select-type" id="screen_size_type" name="screen_size_type">
                  <option value="benefit" selected>Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Cost/Benefit <span class="show">(Berat)</span></span>
                <select class="form-select-type" id="weight_type" name="weight_type">
                  <option value="benefit">Benefit</option>
                  <option value="cost" selected>Cost</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Cost/Benefit <span class="show">(Memori RAM)</span></span>
                <select class="form-select-type" id="ram_type" name="ram_type">
                  <option value="benefit" selected>Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Cost/Benefit <span class="show">(Kapasitas Penyimpanan)</span></span>
                <select class="form-select-type" id="storage_type" name="storage_type">
                  <option value="benefit" selected>Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </div>
              <div class="option-box">
                <span class="select-label">Cost/Benefit <span class="show">(Harga)</span></span>
                <select class="form-select-type" id="price_type" name="price_type">
                  <option value="benefit">Benefit</option>
                  <option value="cost" selected>Cost</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-box">
        <div class="text-container">
          <div class="text-title">
            <span class="title-txt">Hei aku bingung, istilah-istilah ini sebenernya apasih?</span>
          </div>
          <div class="paragraphs-container">
            <p>
              Halo <?php echo $username; ?>, izinkan saya membantu Anda! Bayangkan sistem pendukung keputusan ini sebagai teman yang membantu Anda dalam proses menemukan laptop yang sempurna untuk studi Teknik Informatika Anda.
            </p>
            <p>
              Berikan bobot pada setiap kriteria (ukuran layar, berat, memori RAM, kapasitas penyimpanan, dan harga) untuk mengindikasikan prioritas Anda. Pilih dari opsi (sangat rendah, rendah, sedang, tinggi, sangat tinggi) untuk menggambarkan preferensi Anda terhadap setiap kriteria.
            </p>
            <p>
              Sistem juga melihat setiap kriteria dan memberikan peringkat "cost" atau "benefit" pada mereka. Jika anda menganggap bahwa suatu kriteria akan lebih bagus jika nilainya semakin kecil maka pilih "cost". Namun, jika anda menganggap jika semakin besar nilainya akan semakin bagus maka pilih "benefit".
            </p>
            <p>
              Apakah layar besar merupakan keharusan, atau Anda lebih mengutamakan memori RAM? Apakah Anda memerlukan banyak penyimpanan untuk perangkat lunak teknik Anda? Sistem menggunakan metode yang disebut Simple Additive Weighting untuk menganalisis semua opsi dan memberikan skor berdasarkan kebutuhan Anda.
            </p>
            <p>
              Ini seperti memiliki daftar periksa pribadi. Sistem akan menganalisis spesifikasi setiap laptop dan mempertimbangkan bobot prioritas yang Anda tetapkan. Berdasarkan informasi ini, sistem kemudian menyusun dan menyajikan daftar peringkat opsi terbaik yang sesuai dengan kebutuhan dan preferensi Anda.
            </p>
          </div>
        </div>
        <input type="submit" value="Lihat Hasil Rekomendasi" />
      </div>
    </div>
  </form>
  <button class="logout-button" id="logoutButton">
    <i class="fas fa-sign-out-alt"></i>
    <span class="logout-text">Logout</span>
  </button>

  <script>
    document.getElementById('logoutButton').addEventListener('click', function() {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Kamu akan dialihkan ke halaman login.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, logout!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'logout.php';
        }
      })
    });

    document.addEventListener('DOMContentLoaded', function() {
      const weightSelects = document.querySelectorAll('select.form-select');
      const options = Array.from(weightSelects[0].options).map(option => option.value);

      weightSelects.forEach(select => {
        select.addEventListener('change', function() {
          const selectedValues = Array.from(weightSelects).map(select => select.value);
          weightSelects.forEach(innerSelect => {
            Array.from(innerSelect.options).forEach(option => {
              if (selectedValues.includes(option.value) && option.value !== innerSelect.value) {
                option.disabled = true;
              } else {
                option.disabled = false;
              }
            });
          });
        });
      });
    });
  </script>
</body>

</html>