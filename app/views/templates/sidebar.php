<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=BASEURL?>dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bookmark-fill"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= BASEURL ?>masterdata/masterproduct">
            <i class="bi bi-circle"></i><span>Master Produk</span>
          </a>
        </li>
        <li>
          <a href="<?= BASEURL ?>masterdata/masterunit">
            <i class="bi bi-circle"></i><span>Master Unit</span>
          </a>
        </li>

        <li>
          <a href="<?= BASEURL ?>masterdata/masterfactory">
            <i class="bi bi-circle"></i><span>Master Pabrik</span>
          </a>
        </li>

        <li>
          <a href="<?= BASEURL ?>masterdata/mastersuplier">
            <i class="bi bi-circle"></i><span>Master Suplier</span>
          </a>
        </li>

      </ul>

    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav-product" data-bs-toggle="collapse" href="#">
        <i class="ri-send-plane-fill"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav-product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= BASEURL ?>retur">
            <i class="bi bi-circle"></i><span>Retur Produk</span>
          </a>
        </li>
        <li>
          <a href="<?= BASEURL ?>opname">
            <i class="bi bi-circle"></i><span>Stok Opname</span>
          </a>
        </li>

        <li>
          <a href="<?= BASEURL ?>purchase">
            <i class="bi bi-circle"></i><span>Penerimaan Produk</span>
          </a>
        </li>

      </ul>

    </li>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=BASEURL?>cashier">
        <i class="bi bi-cart-fill"></i>
        <span>Kasir</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-archive-fill"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= BASEURL ?>report/productIn">
            <i class="bi bi-circle"></i><span>Laporan Pembelian</span>
          </a>
          <a href="<?= BASEURL ?>report/productOut">
            <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
          </a>
          <a href="<?= BASEURL ?>report/profit">
            <i class="bi bi-circle"></i><span>Laporan Profit</span>
          </a>
        </li>
      </ul>
    </li>
        <!-- End Profile Page Nav -->

    <li class="nav-item" id = "masterUser">
      <a class="nav-link collapsed" href="<?=BASEURL?>user">
        <i class="bi bi-people"></i>
        <span>Master User</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=BASEURL?>home/logout">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>

  </ul>

</aside><!-- End Sidebar-->

<script>
  role = '<?=$_SESSION['role']?>';
  if (role != 'OWNER')
  {
    var masterUser = document.getElementById('masterUser');
    masterUser.style.display = 'none'
  }

</script>