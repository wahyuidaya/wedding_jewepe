<style>
  .wj-mobile-bar {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 54px;
    background: #2c3e50;
    color: #fff;
    align-items: center;
    gap: 12px;
    padding: 0 14px;
    z-index: 1001;
    box-shadow: 0 2px 8px rgba(0,0,0,0.18);
  }
  .wj-hamburger {
    background: rgba(255,255,255,0.14);
    border: 1px solid rgba(255,255,255,0.25);
    color: #fff;
    width: 36px;
    height: 36px;
    border-radius: 7px;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
  .wj-mobile-title {
    font-size: 16px;
    font-weight: 700;
    margin: 0;
  }
  .wj-backdrop {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1002;
  }
  .wj-backdrop.open { display: block; }
  .wj-table-wrap {
    width: 100%;
    max-width: 100%;
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch;
    display: block;
  }
  @media (max-width: 768px) {
    html, body {
      overflow-x: hidden !important;
      max-width: 100vw !important;
      display: block !important;
    }
    .wj-mobile-bar { display: flex !important; }
    .sidebar {
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      width: 240px !important;
      height: 100dvh !important;
      max-height: 100dvh !important;
      overflow-y: auto !important;
      z-index: 1003 !important;
      transform: translateX(-100%) !important;
      transition: transform 0.25s ease !important;
      padding-bottom: max(28px, env(safe-area-inset-bottom)) !important;
    }
    .sidebar.open { transform: translateX(0) !important; }
    .main, .content, .main-content {
      margin-left: 0 !important;
      width: 100% !important;
      max-width: 100vw !important;
      min-width: 0 !important;
      padding: 68px 14px 24px !important;
      box-sizing: border-box !important;
    }
    .cards, .stats, .stat-grid {
      grid-template-columns: 1fr !important;
      flex-direction: column !important;
    }
    .wj-table-wrap table {
      width: 100%;
      min-width: max-content;
      white-space: nowrap;
    }
  }
</style>

<div class="wj-mobile-bar">
  <button type="button" class="wj-hamburger" onclick="toggleWjSidebar()" aria-label="Buka Menu">&#9776;</button>
  <span class="wj-mobile-title">Admin Panel</span>
</div>
<div class="wj-backdrop" id="wjBackdrop" onclick="toggleWjSidebar()"></div>

<div class="sidebar" id="wjSidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="package.php">Manajemen Paket</a></li>
    <li><a href="orders.php">Manajemen Pesanan</a></li>
    <li><a href="laporan.php">Laporan Pesanan</a></li>
    <li><a href="settings.php">Manajemen Profil Web</a></li>
    <li><a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a></li>
  </ul>
</div>

<script>
  function toggleWjSidebar() {
    document.getElementById('wjSidebar').classList.toggle('open');
    document.getElementById('wjBackdrop').classList.toggle('open');
  }
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('table').forEach(function(t) {
      if (!t.parentElement || t.parentElement.classList.contains('wj-table-wrap')) return;
      var w = document.createElement('div');
      w.className = 'wj-table-wrap';
      t.parentNode.insertBefore(w, t);
      w.appendChild(t);
    });
  });
</script>
