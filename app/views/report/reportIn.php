<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Laporan Pembelian</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
            <!-- Start Ngoding Disini -->
            <div class = "card">
                <div class = "card-header  bg-success text-white">
                    <span class="card-title"> <i class=" bx bx-list-ul "></i>Laporan Pembelian</span>
                </div>
                <div class="card-body">
                    <h4 class="mt-3">Periode Tanggal s/d</h4>
                    <form action="<?= BASEURL ?>report/productIn" method="post">
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <input type="date" class="form-control" name="start_date" id="startDate" required>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" class="form-control" name="end_date" id="endDate" required>
                            </div>
                            <div class = "col-lg-2">
                                
                                <button type="submit" class="btn btn-warning col-lg-4"><i class = "b bi-search"></i></button>
                                <a type="submit" href = "<?=BASEURL?>report/productIn" class="btn btn-primary col-lg-4"><i class="bx bx-sync"></i></a>
                            </div>
                        </div>
                    </form>
                    <table id="product" class="table table-striped" border="2" style="width:100%">
                        <thead class="thead-primary">
                            <tr>
                                <th>#</th>
                                <th>No.Faktur</th>
                                <th>Suplier</th>
                                <th>Tgl Faktur</th>
                                <th>Tgl Pembayaran</th>
                                <th>Harga Pembelian</th>
                                <th>Status</th>
                                <th>Dibuat Oleh</th>
                                <th>Tgl Dibuat</th>
                                <th><i class="bx bxs-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $chart_data = [];
                            $retur = 0;
                            $total_rp = 0;
                           
                            foreach ($data['purchase'] as $row):
                                $no++;
                                $date = date("Y-m-d", strtotime($row['created_date_ttp']));
                                $price = $row['total_payment_ttp'];
                                if($row['status_ttp'] == 'Retur') $retur += 1;
                                $total_rp += $price;

                                if (array_key_exists($date, $chart_data)) {
                                    $chart_data[$date]['price'] += $price;
                                } else {
                                    $list_data = [
                                        'date' => $date,
                                        'price' => $price
                                    ];
                                    $chart_data[$date] = $list_data;
                                }
                                ?>
                                <tr>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        <?= $row['invoice_number_ttp'] ?>
                                    </td>
                                    <td>
                                        <?= $row['name_tms'] ?>
                                    </td>
                                    <td>
                                        <?= $row['invoice_date_ttp'] ?>
                                    </td>
                                    <td>
                                        <?= $row['payment_date_ttp'] ?>
                                    </td>
                                    <td>
                                        <?= Util::format_rupiah($row['total_payment_ttp']) ?>
                                    </td>
                                    <td>
                                        <?= $row['status_ttp'] ?>
                                    </td>
                                    <td>
                                        <?= $row['created_by_ttp'] ?>
                                    </td>
                                    <td>
                                        <?= $row['created_date_ttp'] ?>
                                    </td>
                                    <td><a href="<?= BASEURL ?>purchase/detail/<?= $row['id_purchase_ttp'] ?>"
                                            class="btn btn-primary"><i class="bx  bx-detail"></i></a></td>

                                <?php endforeach ;
                                $chart_data = array_values($chart_data); 
                                usort($chart_data, 'Util::compareDates');
                                $repot_json = json_encode($chart_data);
                                ?>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            
             <div class="card">
                <div class="card-body">
                    <div class="row ms-5">
                        <div class="col-lg-3 mx-4 text-white bg-secondary fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Faktur</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= $no ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-4 text-white bg-success fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pembelian</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= Util::format_rupiah($total_rp) ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-4 text-white bg-info fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Transaksi Retur</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= $retur ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <canvas id="barChart" width="400" height="200"></canvas>
                </div>
            </div>
                
            <!-- End Ngoding Disini -->

    </section>
</main>

<script>
       if(<?=$data['start_date']?>)
    {
        startDate =document.getElementById('startDate')
        endDate =document.getElementById('endDate')
        startDate.value = "<?=$data['start_date']?>";
        endDate.value = "<?=$data['end_date']?>";
    }
</script>

<script>

    // Data dari PHP
    var report = <?=$repot_json?>

    // Ekstrak tanggal dan harga dari data PHP
    var labels = Object.values(report).map(item => item.date);
    var prices = Object.values(report).map(item => item.price);

    // Buat elemen canvas dan tentukan konteksnya
    var ctx = document.getElementById('barChart').getContext('2d');

    // Buat diagram batang
    var barChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Laporan Pembelian',
          data: prices,
          backgroundColor: 'rgba(75, 200, 150, 0.2)', // Warna latar belakang batang
          borderColor: 'rgba(75, 200, 150, 1)',     // Warna garis batas batang
          borderWidth: 1                            // Lebar garis batas
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>