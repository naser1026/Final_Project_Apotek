<main id="main" class="main">
    <div class="pagetitle">
        <h1>Penerimaan Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item "><a href="<?= BASEURL ?>report/productIn">Laporan Pembelian</a></li>
                <li class="breadcrumb-item active">Detail Pembelian</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="row">
            <!-- Start Ngoding Disini -->

            <div class="card">
                <div class="card-header ">
                    <span class="card-title"><i class="bx bx-detail"></i>Detail</span>
                </div>
                <div class="card-body">



                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label fw-bold">No. Faktur</label>
                                <h2 id="invoice">
                                    <?= $data['purchase']['invoice_number_ttp'] ?>
                                </h2>
                            </div>

                            <div class="form-group">
                                <label class="form-label fw-bold">Suplier</label>
                                <input type="text" name="" value="<?= $data['purchase']['name_tms'] ?>" readonly
                                    disabled class="form-control">
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-lg-4">
                                    <label class="form-label fw-bold">Tanggal Faktur</label>
                                    <input type="text" name="" value="<?= $data['purchase']['invoice_date_ttp'] ?>"
                                        readonly disabled class="form-control">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-label fw-bold">Tanggal Bayar</label>
                                    <input type="text" name="" value="<?= $data['purchase']['invoice_date_ttp'] ?>"
                                        readonly disabled class="form-control">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-label fw-bold">Tanggal Retur</label>
                                    <?php 
                                    $retur_date = "-";
                                    $retur_price = "-";
                                    if (!empty($data['retur'])){
                                       $retur_date =  date('Y-m-d', strtotime($data['retur']['created_date_ttr']));
                                       $retur_price = Util::format_rupiaH($data['retur']['retur_price_ttr']);
                                    } 
                                    
                                        ?>
                                    <input type="text" name="" value="<?=$retur_date?>"
                                        readonly disabled class="form-control">
                                </div>

                            </div>
                            <div class="row mt-3">

                                <div class="form-group col-lg-4">
                                    <label for="" class="form-label fw-bold">Total Bayar</label>
                                    <input type="text" disabled name="" id="totalPayment"
                                        value="<?= Util::format_rupiah($data['purchase']['total_payment_ttp']) ?>"
                                        readonly class="form-control">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="" class="form-label fw-bold">Status</label>
                                    <input type="text" disabled
                                        value="<?=$data['purchase']['status_ttp']?>"
                                        readonly class="form-control">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="" class="form-label fw-bold">Total Uang Retur</label>
                                    <input type="text" disabled
                                        value="<?=$retur_price?>"
                                        readonly class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Daftar Produk Diterima</span>
                        </div>
                        <div class="card-body">

                            <table id="tabelA" class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Barcode</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>PPN</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $no = 0;
                                    foreach ($data['list_product'] as $row):
                                        $no++;
                                        $total_price = $row['price'] * $row['qty'];
                                        $tax = $total_price * 0.11;
                                        $total_price = $total_price + $tax;

                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no ?>
                                            </td>
                                            <td>
                                                <?= $row['barcode'] ?>
                                            </td>
                                            <td>
                                                <?= $row['name'] ?>
                                            </td>
                                            <td>
                                                <?= Util::format_rupiah($row['price']) ?>
                                            </td>
                                            <td>11%</td>
                                            <td width=10%><?= $row['qty'] ?></td>
                                            <td>
                                                <?= Util::format_rupiah($total_price) ?>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">Daftar Produk Diretur</span>
                        </div>
                        <div class="card-body">

                            <table id="tabelA" class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Barcode</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>PPN</th>
                                        <th>Jumlah yang dikembalikan</th>
                                        <th>Uang yang dikembalikan</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $no = 0;
                                    $total_retur_price = 0;
                                    foreach ($data['list_product_retur'] as $row):
                                        $no++;
                                        $total_price = $row['price'] * $row['qty'];
                                        $tax = $total_price * 0.11;
                                        $total_price = $total_price + $tax;
                                        
                                        
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no ?>
                                            </td>
                                            <td>
                                                <?= $row['barcode'] ?>
                                            </td>
                                            <td>
                                                <?= $row['name'] ?>
                                            </td>
                                            <td>
                                                <?= Util::format_rupiah($row['price']) ?>
                                            </td>
                                            <td>11%</td>
                                            <td width=10%><?= $row['qty']*-1 ?></td>
                                            <td>
                                                <?= Util::format_rupiah($total_price*-1) ?>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
                <!-- End Ngoding Disini -->
        </div>
    </section>

