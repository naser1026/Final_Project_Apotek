<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Laporan Penjualan</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
            <!-- Start Ngoding Disini -->
            <div class = "card">
    
                <div class="card-header  bg-success text-white">
                <span class="card-title rounded-3"> <i
                        class=" bx bx-list-ul "></i>Laporan Penjualan</span>
                </div>
                    <div class="card-body">
                         <h4 class="mt-3">Periode Tanggal s/d</h4>
                        <form action="<?= BASEURL ?>report/productOut" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <input type="date" class="form-control" name="start_date" id="startDate" required>
                                </div>
                                <div class="col-lg-2">
                                    <input type="date" class="form-control" name="end_date" id="endDate" required>
                                </div>
                                <div class = "col-lg-2">
                                    
                                    <button type="submit" class="btn btn-warning col-lg-4"><i class = "b bi-search"></i></button>
                                    <a type="submit" href = "<?=BASEURL?>report/productOut" class="btn btn-primary col-lg-4"><i class="bx bx-sync"></i></a>
                                </div>
                            </div>
                        </form>
                        <table id="product" class="table table-striped no-print" border="2" style="width:100%">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>No.Faktur</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Omset</th>
                                    <th>Profit</th>
                                    <th>Nama Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php
                                $no = 0;
                                $chart_data = [];
    
                                foreach ($data['sales'] as $row):
                                    $no++;
                                    $date = date("Y-m-d", strtotime($row['transaction_date_tts']));
                                    $income = $row['gross_income_tts'];
    
                                    if (array_key_exists($date, $chart_data)) {
                                        $chart_data[$date]['price'] += $income;
                                    } else {
                                        $list_data = [
                                            'date' => $date,
                                            'price' => $income
                                        ];
                                        $chart_data[$date] = $list_data;
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $row['invoice_number_tts'] ?>
                                        </td>
                                        <td>
                                            <?=date("Y-m-d", strtotime($row['transaction_date_tts']))  ?>
                                        </td>
                                        <td>
                                            <?= Util::format_rupiah($row['gross_income_tts']) ?>
                                        </td>
                                        <td>
                                            <?= Util::format_rupiah($row['profit_tts']) ?>
                                        </td>
                                        <td>
                                            <?= $row['cashier_name_tts'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach;
    
                                // Convert chart_data to indexed array
                                $chart_data = array_values($chart_data); 
                                usort($chart_data, 'Util::compareDates');
                                $report_json = json_encode($chart_data);
                                ?>
                            </tbody>
                        </table>
    
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
    if (<?= $data['start_date'] ?>) {
        startDate = document.getElementById('startDate')
        endDate = document.getElementById('endDate')
        startDate.value = "<?= $data['start_date'] ?>";
        endDate.value = "<?= $data['end_date'] ?>";
    }
</script>

<script>

    // Data dari PHP
    var report = <?= $report_json ?>

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
                label: 'Laporan Penjualan',
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