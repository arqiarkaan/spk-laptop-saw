<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon-32x32.png" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/about.css" />

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Tentang Kami</title>
</head>

<body>
  <div class="container">
    <div class="sub-container">
      <div class="left-containerr">
        <div class="left">
          <div class="header" data-aos="fade-down" data-aos-duration="2000">
            <span class="title">Mengenal <span class="rec-txt">tim pengembang dan tujuan pembuatan</span> sistem pendukung keputusan pemilihan laptop kami 🎓</span>
          </div>
          <div class="paragraph">
            <div class="textt" data-aos="fade-left" data-aos-duration="2000">
              <p>
                Website ini dibuat sebagai bagian dari <span class="rec-txt">projek akhir mata kuliah Sistem Pendukung Keputusan</span>. Tujuan kami adalah membantu mahasiswa Teknik Informatika dalam memilih laptop yang paling sesuai dengan kebutuhan akademis dan kegiatan sehari-hari mereka berdasarkan preferensi mereka terhadap kriteria-kriteria laptop yang kami sediakan.
              </p>
              <div class="paragraph">
                <p>
                  Projek ini dikembangkan oleh tim yang terdiri dari tiga mahasiswa Teknik Informatika Politeknik Negeri Jakarta dari kelas TI-CCIT-4A, yang dibimbing oleh Ibu Iklima Ermis Ismail, S.Kom., M.Kom:
                </p>
                <div class="list">
                  <span>1. Darren Arqiarkaan Dyazfajri Teddy (2207412011)</span>
                  <span>2. Muhammad Farras Yasyfa (2207412015)</span>
                  <span>3. Muhammad Fajrul Falah (2207412019)</span>
                </div>
              </div>
              <p>
                Kami mengundang Anda untuk membuat akun dan mencoba sistem pendukung keputusan ini. Dengan membuat akun, Anda akan dapat memasukkan preferensi dan kebutuhan spesifik Anda berdasarkan kriteria-kriteria laptop yang disediakan, sehingga sistem dapat memberikan rekomendasi laptop yang paling sesuai untuk Anda. <span class="rec-txt">Jangan ragu untuk mencoba dan menemukan laptop terbaik untuk mendukung studi dan aktivitas Anda!</span>
              </p>
            </div>
          </div>
        </div>
        <div class="side-img" data-aos="fade-up" data-aos-duration="2000">
          <img src="img/laptop-guy.png" alt="laptop" id="referenceImage" />
        </div>
      </div>
      <div class="right-container">
        <div class="left-btn">
          <a href="alternative.php" class="back-btn">Kembali</a>
        </div>
        <div class="right-btn">
          <a href="register.php" class="nav-btn">Buat akun sekarang</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("referenceImage").addEventListener("click", function() {
      Swal.fire({
        title: 'Illustration Credits',
        text: 'Illustration by Icons 8 from Ouch!',
        html: '<p>Illustration by <a href="https://icons8.com/illustrations/author/zD2oqC8lLBBA" target="_blank">Icons 8</a> from <a href="https://icons8.com/illustrations" target="_blank">Ouch!</a></p>',
        icon: 'info',
        confirmButtonText: 'Tutup'
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