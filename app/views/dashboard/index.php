<?php
$today_income = 0;
$today_qty = $data['todaySales']['count'];
$today_retur = 0;
$today_qty_retur = $data['todayRetur']['count'] ;
foreach ($data['todaySales']['sales'] as $sales) {
  $today_income += $sales;
}
foreach ($data['todayRetur']['retur'] as $retur) {
  $today_retur += $retur;
}
$emptyStock = count($data['emptyStock']);

$jsonTransaksi = json_encode($data['todaySales']['sales']);
$jsonRetur = json_encode($data['todayRetur']['retur']);


?>



<main id="main" class="main">

  <div class="pagetitle">
    <div class="col-sm-6">
      <h1><i class="bi bi-speedometer"></i>Dashboard</h1>

    </div>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">

      <!-- Sales Card -->
      <div class="col-lg-4 col-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Transaksi Penjualan <span>| Hari ini</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= $today_qty ?>
                </h6>

              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->

      <!-- Revenue Card -->
      <div class="col-lg-4 col-6">
        <div class="card info-card revenue-card">


          <div class="card-body">
            <h5 class="card-title">Omset <span>| Hari ini</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= Util::format_rupiah($today_income) ?>
                </h6>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Revenue Card -->

      <!-- Customers Card -->
      <div class="col-lg-4 col-6">
        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Retur <span>| Hari ini</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= $today_qty_retur ?>
                </h6>
              </div>
            </div>
          </div>
        </div>

      </div><!-- End Customers Card -->
      <!-- End Customers Card -->


      <div class="col-lg-4 col-6">
        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Total Uang Retur <span>| Hari ini</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= Util::format_rupiah($today_retur) ?>
                </h6>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-4 col-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Penerimaan Produk <span>| Hari ini</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart-plus"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= $data['total_purchase'] ?>
                </h6>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-4 col-6">
        <div class="card info-card stock-card">
          <div class="card-body">
            <h5 class="card-title">Stok Habis <span>| Hari ini</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center"
                style="background : pink; color : red;">
                <i class="bi bi-ban"></i>
              </div>
              <div class="ps-3">
                <h6>
                  <?= $emptyStock ?>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Reports -->
    <div class="col-12">
      <div class="card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Laporan penjualan dan retur <span>/Hari ini</span></h5>

          <!-- Line Chart -->
          <div id="reportsChart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              // Data uang transaksi dan uang retur
              var transaksi = <?= $jsonTransaksi ?>;
              var retur = <?= $jsonRetur ?>;
              var manipulateTransaksi = {};
              console.log(retur)

               for (var key in transaksi) {
                if (transaksi.hasOwnProperty(key)) {
                  // Mendapatkan jam dan menit dari kunci
                  var [hour, minute] = key.split(':');

                  // Menentukan kunci baru
                  var newKey = (minute < 30) ? hour + ':00' : (parseInt(hour) + 1) + ':00';
                  if (newKey.length < 5) {
                    newKey = '0' + newKey
                  }
                  // Menambahkan nilai ke kunci baru di objek manipulateTransaksi
                  if (!manipulateTransaksi[newKey]) {
                    manipulateTransaksi[newKey] = 0;
                  }
                  manipulateTransaksi[newKey] += parseInt(transaksi[key]);
                }
              }
              var manipulateRetur = {};
              for (var key in retur) {
                if (retur.hasOwnProperty(key)) {
                  // Mendapatkan jam dan menit dari kunci
                  var [hour, minute] = key.split(':');

                  var newKey = (minute < 30) ? + hour + ':00' : (parseInt(hour) + 1) + ':00';
                  if (newKey.length < 5) {
                    newKey = '0' + newKey
                  }


                  // Menambahkan nilai ke kunci baru di objek manipulateRetur
                  if (!manipulateRetur[newKey]) {
                    manipulateRetur[newKey] = 0;
                  }
                  manipulateRetur[newKey] += retur[key];
                }
              }
              transaksi = manipulateTransaksi;
              retur = manipulateRetur;

              // Buat array untuk jam dari 08:00 sampai 20:00
              const jamArray = Array.from({ length: 13 }, (_, i) => (i + 8).toString().padStart(2, '0') + ':00');

              // Gabungkan data dan atur nilai nol jika tidak ada transaksi
              let combinedData = jamArray.map((jam) => ({
                x: jam,
                yTransaksi: transaksi[jam] || 0,
                yRetur: retur[jam] || 0
              }));

              // Render chart
              new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                  name: 'Penjualan',
                  data: combinedData.map(item => item.yTransaksi)
                }, {
                  name: 'Retur',
                  data: combinedData.map(item => item.yRetur)
                }],
                chart: {
                  height: 350,
                  type: 'bar', // Mengubah tipe chart menjadi bar
                  toolbar: {
                    show: false
                  },
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                  },
                },
                colors: ['#2eca6a', '#ff771d'],
                fill: {
                  type: "gradient",
                  gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                  }
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
                },
                xaxis: {
                  type: 'category',
                  categories: combinedData.map(item => item.x),
                },
                yaxis: {
                  title: {
                    text: 'Jumlah Uang'
                  }
                },
                tooltip: {
                  x: {
                    format: 'HH:mm'
                  },
                }
              }).render();
            });
          </script>
          <!-- End Line Chart -->
        </div>
      </div>
    </div><!-- End Reports -->

  </section>

</main><!-- End #main -->