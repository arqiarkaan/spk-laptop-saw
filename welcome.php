<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/intro.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Pengantar</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="left-container">
        <div class="header" data-aos="fade-down" data-aos-duration="2000">
          <span class="title">Sistem Pendukung Keputusan
            <span class="rec-txt">Untuk Memilih Laptop Terbaik</span> Bagi
            Mahasiswa Teknik Informatika 💻</span>
        </div>
        <div class="paragraph">
          <div class="sub-title" data-aos="fade-right" data-aos-duration="2000">
            Metode Simple Additive Weighting (SAW)
          </div>
          <div class="text" data-aos="fade-left" data-aos-duration="2000">
            Metode yang kami gunakan untuk membuat sistem pendukung keputusan
            ini yaitu metode SAW. Metode ini merupakan salah satu metode
            pengambilan keputusan multikriteria yang sederhana dan banyak
            digunakan. Metode ini didasarkan pada konsep penjumlahan terbobot
            dari rating kinerja setiap alternatif pada semua kriteria. Keunggulan dari metode SAW adalah kesederhanaannya dalam perhitungan dan kemampuannya untuk menangani berbagai jenis data kriteria. Metode ini juga transparan dan mudah dipahami, sehingga memudahkan pengguna dalam proses pengambilan keputusan.


          </div>
        </div>
        <div class="paragraph">
          <div class="sub-title" data-aos="fade-right" data-aos-duration="2000">
            Tahapan Pengerjaan
          </div>
          <div class="steps">
            <div class="step" data-aos="fade-up" data-aos-duration="2000">
              <span class="step-title">1. Membuat Matriks Nilai
                <i class="fa-solid fa-circle-info" id="nilai"></i></span><span class="step-explain">Menyusun matriks yang berisi nilai-nilai setiap alternatif
                laptop untuk masing-masing kriteria yang sudah ditentukan
                bobotnya oleh pembuat keputusan.</span>
            </div>
            <div class="step" data-aos="fade-up" data-aos-duration="2000">
              <span class="step-title">2. Normalisasi Matriks
                <i class="fa-solid fa-circle-info" id="normalisasi"></i></span><span class="step-explain">Proses untuk mengubah matriks nilai menjadi skala relatif
                antar alternatif agar dapat dibandingkan secara objektif dan
                adil.</span>
            </div>
            <div class="step" data-aos="fade-up" data-aos-duration="2000">
              <span class="step-title">3. Menghitung Preferensi
                <i class="fa-solid fa-circle-info" id="preferensi"></i></span><span class="step-explain">Preferensi melibatkan perhitungan akhir untuk menentukan skor
                atau peringkat relatif dari setiap alternatif berdasarkan
                bobot kriteria yang telah ditentukan sebelumnya dalam proses
                SAW.</span>
            </div>
          </div>
        </div>
        <div class="paragraph">
          <div class="sub-title" data-aos="fade-right" data-aos-duration="2000">
            Studi Kasus
          </div>
          <div class="text" data-aos="fade-left" data-aos-duration="2000">
            Pada kasus ini terdapat 5 kriteria untuk sistem pendukung
            keputusan untuk memilih laptop terbaik bagi mahasiswa teknik
            informatika, kriteria-kriteria tersebut yaitu
            <span class="rec-txt">Ukuran Layar (K1), Berat (K2), Memori RAM (K3),
              Kapasitas Penyimpanan (K4), dan Harga (K5)</span>. Semua kriteria bersifat kuantitatif. Memori RAM diukur dalam
            GB, Kapasitas Penyimpanan dalam GB, Ukuran Layar dalam inci, Berat
            dalam kg, dan Harga dalam rupiah.
          </div>
        </div>
      </div>
      <div class="right-container">
        <div class="left-btn">
          <a href="index.php" class="back-btn">Kembali</a>
        </div>
        <div class="right-btn">
          <a href="alternative.php" class="nav-btn">Selanjutnya</a>
        </div>
      </div>
    </div>
  </div>

  <script src="js/intro.js"></script>
  <script>
    AOS.init({
      once: true,
    });
  </script>
</body>

</html>