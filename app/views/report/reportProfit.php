<?php
$total_profit = 0;
$total_gross_income = 0; // Tambahkan variabel untuk total gross_income
$total_transaction = 0;
$total_omset = 0;
$chart_data = [];
$n = 0;
if (isset($data['start_date']))
{
    $n = 1;
}

foreach ($data['sales'] as $row) {
    $total_omset += $row['gross_income_tts'];
    $total_profit += $row['profit_tts'];
    $total_gross_income += $row['gross_income_tts']; // Tambahkan ini
    $total_transaction += 1;
    $date = date("Y-m-d", strtotime($row['transaction_date_tts']));
    $income = $row['profit_tts'];
    $grossIncome = $row['gross_income_tts']; // Tambahkan ini
    if (array_key_exists($date, $chart_data)) {
        $chart_data[$date]['profit'] += $income;
        $chart_data[$date]['gross_income'] += $grossIncome; // Tambahkan ini
    } else {
        $list_data = [
            'date' => $date,
            'profit' => $income,
            'gross_income' => $grossIncome // Tambahkan ini
        ];
        $chart_data[$date] = $list_data;
    }
}

$chart_data = array_values($chart_data);
usort($chart_data, 'Util::compareDates');
$report_json = json_encode($chart_data);
?>

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

                <div class="card-header bg-success text-white">
                    <span class="card-title"> <i class=" bx bx-list-ul"></i>Laporan Penjualan</span>
                </div>
                <div class="card-body">
                <h4 class="mt-3">Periode Tanggal s/d</h4>
                        <form action="<?= BASEURL ?>report/profit" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <input type="date" class="form-control" name="start_date" id="startDate" required>
                                </div>
                                <div class="col-lg-2">
                                    <input type="date" class="form-control" name="end_date" id="endDate" required>
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-warning">Tampilkan</button>
                                </div>
                                <div class="col-lg-1">
                                    <a type="submit" href = "<?=BASEURL?>report/profit" class="btn btn-primary"><i class="bx bx-sync"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row ms-5">
                        <div class="col-lg-3 mx-4 text-white bg-secondary fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Omset</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= Util::format_rupiah($total_omset) ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-4 text-white bg-success fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Profit</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= Util::format_rupiah($total_profit) ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-4 text-white bg-info fw-bold rounded-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Transaksi Penjualan</span>
                                </div>
                                <br>
                                <div class="info-box-content">
                                    <h4 class="info-box-text fw-bold">
                                        <?= $total_transaction ?>
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
    if (<?=$n?> == 1) {
        startDate = document.getElementById('startDate')
        endDate = document.getElementById('endDate')
        startDate.value = "<?= $data['start_date'] ?>";
        endDate.value = "<?= $data['end_date'] ?>";
    }
</script>
<!-- ... (Bagian HTML tetap sama) ... -->

<script>

    // Data dari PHP
    var report = <?= $report_json ?>;

    // Ekstrak tanggal, profit, dan gross_income dari data PHP
    var labels = Object.values(report).map(item => item.date);
    var profits = Object.values(report).map(item => item.profit); // Ubah dari item.price menjadi item.profit
    var omset = Object.values(report).map(item => item.gross_income);

    // Buat elemen canvas dan tentukan konteksnya
    var ctx = document.getElementById('barChart').getContext('2d');

    // Buat diagram batang
    // Buat diagram garis
    var lineChart = new Chart(ctx, {
        type: 'bar',  // Ganti type menjadi 'line'
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Profit',
                    data: profits,
                    borderColor: 'rgba(75, 200, 150, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Omset',
                    data: omset,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                }
            ]
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

