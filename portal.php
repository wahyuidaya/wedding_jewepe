<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Sistem Informasi — Wedding Jewepe</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #FAF8F5;
      color: #332722;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    header {
      background-color: #1F1917;
      border-bottom: 1px solid rgba(212, 175, 55, 0.25);
      padding: 14px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .header-brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .brand-icon {
      width: 38px;
      height: 38px;
      border-radius: 9px;
      background-color: rgba(212, 175, 55, 0.15);
      color: #E6CA65;
      border: 1px solid rgba(212, 175, 55, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }
    .brand-text h1 {
      color: #FFFDF8;
      font-family: 'Playfair Display', serif;
      font-size: 17px;
      font-weight: 700;
      letter-spacing: 0.5px;
      line-height: 1.1;
    }
    .brand-text span {
      color: #D3C4B6;
      font-size: 11px;
      display: block;
      margin-top: 3px;
    }
    .btn-portfolio {
      color: #E6CA65;
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(212, 175, 55, 0.3);
      font-size: 12px;
      padding: 7px 14px;
      border-radius: 9999px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s;
    }
    .btn-portfolio:hover {
      background-color: rgba(255, 255, 255, 0.12);
      color: #FFFFFF;
    }
    .main-container {
      max-width: 960px;
      margin: 0 auto;
      padding: 48px 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
    }
    .hero-intro {
      text-align: center;
      max-width: 620px;
      margin: 0 auto 36px;
    }
    .badge-pill {
      display: inline-block;
      font-size: 12px;
      font-weight: 600;
      padding: 4px 14px;
      border-radius: 9999px;
      background-color: rgba(184, 134, 11, 0.1);
      color: #A0740B;
      border: 1px solid #E8D5A3;
      margin-bottom: 12px;
      letter-spacing: 0.5px;
    }
    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: 30px;
      color: #241A15;
      margin-bottom: 12px;
      font-weight: 700;
    }
    .hero-subtitle {
      font-size: 14.5px;
      color: #6B5B53;
      line-height: 1.6;
    }
    .portal-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 22px;
      margin-bottom: 24px;
    }
    .portal-card {
      background: #FFFFFF;
      border: 1px solid #ECE2D8;
      border-radius: 14px;
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 4px 16px rgba(36, 26, 21, 0.04);
      transition: all 0.2s ease;
    }
    .portal-card:hover {
      border-color: #B8860B;
      box-shadow: 0 8px 24px rgba(184, 134, 11, 0.12);
      transform: translateY(-2px);
    }
    .card-icon {
      width: 44px;
      height: 44px;
      border-radius: 10px;
      background: #FDF9F0;
      color: #B8860B;
      border: 1px solid #EADBCC;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      margin-bottom: 16px;
    }
    .card-title {
      font-family: 'Playfair Display', serif;
      font-size: 19px;
      font-weight: 700;
      color: #241A15;
      margin-bottom: 8px;
    }
    .card-desc {
      font-size: 13px;
      color: #6B5B53;
      line-height: 1.5;
      margin-bottom: 16px;
    }
    .card-features {
      list-style: none;
      margin-bottom: 20px;
    }
    .card-features li {
      font-size: 12px;
      color: #4A3A32;
      margin-bottom: 7px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .card-features li i {
      color: #B8860B;
      font-size: 11px;
    }
    .demo-box {
      background: #FAF8F5;
      border: 1px dashed #DFC9A8;
      border-radius: 8px;
      padding: 10px 12px;
      margin-bottom: 16px;
      font-size: 12px;
    }
    .demo-box-title {
      font-weight: 700;
      font-size: 11px;
      color: #B8860B;
      text-transform: uppercase;
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .demo-cred {
      font-family: monospace;
      color: #241A15;
      font-size: 11.5px;
    }
    .btn-enter {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 11px;
      border-radius: 8px;
      background: #27ae60;
      color: #FFFFFF;
      font-weight: 600;
      font-size: 13px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-enter:hover {
      background: #219150;
    }
    .footer {
      border-top: 1px solid #ECE2D8;
      padding: 18px 24px;
      text-align: center;
      font-size: 12px;
      color: #8C786E;
      background: #FFFFFF;
    }
  </style>
</head>
<body>

  <header>
    <div class="header-brand">
      <div class="brand-icon">
        <i class="fa-solid fa-ring"></i>
      </div>
      <div class="brand-text">
        <h1>Wedding Jewepe</h1>
        <span>Sistem Katalog &amp; Reservasi Wedding Organizer</span>
      </div>
    </div>
    <a href="https://wahyuidaya.github.io" target="_blank" rel="noopener noreferrer" class="btn-portfolio">
      <span>&larr; Portofolio Wahyu Idaya</span>
      <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 10px;"></i>
    </a>
  </header>

  <div class="main-container">
    <div class="hero-intro">
      <span class="badge-pill">💍 Wedding Organizer Portfolio</span>
      <h2 class="hero-title">Portal Wedding Jewepe</h2>
      <p class="hero-subtitle">
        Pilih portal di bawah ini untuk melihat katalog paket pernikahan bagi calon pengantin atau manajemen pesanan reservasi oleh admin:
      </p>
    </div>

    <div class="portal-grid">
      <!-- 1. Katalog Klien -->
      <div class="portal-card">
        <div>
          <div class="card-icon">
            <i class="fa-solid fa-gem"></i>
          </div>
          <h3 class="card-title">Katalog Calon Pengantin</h3>
          <p class="card-desc">
            Eksplorasi paket wedding lengkap, cek rincian harga &amp; fasilitas, serta kirim reservasi tanggal pernikahan secara instan.
          </p>
          <ul class="card-features">
            <li><i class="fa-solid fa-check"></i> Jelajahi paket Silver, Gold, Platinum</li>
            <li><i class="fa-solid fa-check"></i> Rincian dekorasi, dokumentasi, catering</li>
            <li><i class="fa-solid fa-check"></i> Form booking reservasi pernikahan online</li>
            <li><i class="fa-solid fa-check"></i> Informasi kontak langsung &amp; lokasi</li>
          </ul>
        </div>
        <div>
          <div class="demo-box">
            <div class="demo-box-title">
              <i class="fa-solid fa-compass"></i> Akses Klien
            </div>
            <div class="demo-cred">
              Tanpa login &mdash; langsung jelajahi katalog &amp; booking paket.
            </div>
          </div>
          <a href="index.php" class="btn-enter">
            <span>Buka Katalog Wedding</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- 2. Admin Panel -->
      <div class="portal-card">
        <div>
          <div class="card-icon" style="color: #2c3e50; background: #ECEFF1; border-color: #CFD8DC;">
            <i class="fa-solid fa-user-gear"></i>
          </div>
          <h3 class="card-title">Panel Administrator</h3>
          <p class="card-desc">
            Pengelolaan manajemen paket pernikahan, konfirmasi status reservasi pemesanan klien, dan laporan omset bulanan.
          </p>
          <ul class="card-features">
            <li><i class="fa-solid fa-check"></i> Manajemen paket wedding (tambah/edit/hapus)</li>
            <li><i class="fa-solid fa-check"></i> Approve / reject pemesanan klien yang masuk</li>
            <li><i class="fa-solid fa-check"></i> Rekapitulasi laporan keuangan &amp; invoice</li>
            <li><i class="fa-solid fa-check"></i> Pengaturan kontak dan banner website</li>
          </ul>
        </div>
        <div>
          <div class="demo-box">
            <div class="demo-box-title" style="color: #2c3e50;">
              <i class="fa-solid fa-key"></i> Kredensial Demo Admin
            </div>
            <div class="demo-cred">
              Username: <strong>admin</strong><br>
              Password: <strong>admin123</strong>
            </div>
          </div>
          <a href="admin/login.php?demo=admin" class="btn-enter" style="background: #2c3e50;">
            <span>Masuk sebagai Admin</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    &copy; 2025&ndash;2026 Wedding Jewepe &mdash; Portofolio Sistem Informasi Wedding Organizer oleh <strong>Wahyu Idaya</strong>.
  </footer>

</body>
</html>