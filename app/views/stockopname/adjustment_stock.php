<?php
$count = count($data['product']);
?>

<div class="tab-pane fade" id="adjusment_stock" role="tabpanel" aria-labelledby="adjusment_stock-tab">
    <div class="row mt-2">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-success text-light">
                    Status
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-primary rounded-1 px-2 py-2">
                                <div class="info-box-content">
                                    <span class="text-light ms-2">Total Daftar Stok</span>
                                    <h4 class="text-light fw-bold ms-2 my-2">
                                        <?= $count ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box rounded-1 px-2 py-2" style="background : #199ec3;">
                                <div class="info-box-content">
                                    <span class="text-light ms-2">Total Daftar Stok Di Isi</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="stokIsi">0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box bg-secondary rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Daftar Stok Belum Di
                                        Isi</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="stokNoIsi">
                                        <?= $count ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box bg-success rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Daftar Stok
                                        Sesuai</span>
                                    <h4 class="text-light fw-bold ms-2 my-2 " id="totalDaftarStokSesuai">0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="info-box bg-success rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Uang Sesuai</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="totalUangSesuai">Rp 0</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="info-box bg-warning rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class=" ms-2">Total Daftar Stok
                                        Kelebihan</span>
                                    <h4 class=" fw-bold ms-2 my-2" id="totalDaftarStokLebih">0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="info-box bg-warning rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class=" ms-2">Total Uang Kelebihan</span>
                                    <h4 class=" fw-bold ms-2 my-2" id="totalUangLebih">Rp 0</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="info-box bg-danger rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Daftar Stok
                                        Kurang</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="totalDaftarStokKurang">0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="info-box bg-danger rounded-1 px-2 py-2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Uang Kurang</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="totalUangKurang">Rp 0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box rounded-1 px-2 py-2" style="background : grey;" id="container1">
                                <div class="info-box-content"><span class="text-light ms-2">Persentase
                                        keseluruhan</span>
                                    <h4 class="text-light fw-bold ms-2 my-2" id="persentaseLabel">0%</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="info-box rounded-1 px-2 py-2" style="background : grey;" id="container2">
                                <div class="info-box-content"><span class="text-light ms-2">Total Uang Selisih</span>
                                    <h4 class="text-light fw-bold ms-2 my-2 " id="totalUangSelisih">Rp 0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-lg-4">
            <form action="<?= BASEURL ?>opname/saveOpname" method = "post">
            <input type="hidden" name="sesuai" id = "sesuai">
            <input type="hidden" name="lebih" id = "lebih">
            <input type="hidden" name="kurang" id = "kurang">
            <input type="hidden" name="persentase" id = "persentase">
            <input type="hidden" name="uang_selisih" id = "uangSelisih">
                <div class="card">
                    <div class="card-header bg-success text-light">
                        Keterangan
                    </div>

                    <div class="card-body">
                        <textarea class="form-control" rows="3" placeholder="Keterangan..." name = "description"></textarea>
                    </div>

                    <div class="card-footer">
                        <button type = "submit" class="form-control bg-success text-light fw-bold" onclick="confirm('Sudah sesuai?')">
                            <i class="bx bxs-save mx-2"></i>Simpan
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-light">
            <span class="card-title">List Stok</span>
        </div>

        <div class="card-body">

            <table class="table" id="table">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Satuan</th>
                        <th>Harga Jual + 25%</th>
                        <th>Qty Data</th>
                        <th>Qty Opname</th>
                        <th>Qty Selisih</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['product'] as $row):
                        $no++;
                        $tax = $row['small_price_tmp'] * 0.25;
                        $selling_price = $row['small_price_tmp'] + $tax;
                        ?>

                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $row['name_tmp'] ?>
                            </td>
                            <td>
                                <?= $row['name_tmun'] ?>
                            </td>
                            <input type="hidden" id="hargaJual<?= $no ?>" value="<?= $selling_price ?>">
                            <td>
                                <?= Util::format_rupiah(floor($selling_price)) ?>
                            </td>
                            <td>
                                <input type="hidden" id="stock<?= $no ?>" value="<?= $row['stock_tmp'] ?>">
                                <?= $row['stock_tmp'] ?>
                            </td>

                            <td width=8%><input class="form-control" type="number" name="" id="qtyOpname<?= $no ?>"
                                    oninput="hitungSelisih('qtyOpname<?= $no ?>','stock<?= $no ?>','selisih<?= $no ?>', 'badge<?= $no ?>' ,'<?= $no ?>')">
                            </td>
                            <td width=8%><input class="form-control" type="number" name="" id="selisih<?= $no ?>" readonly>
                            </td>
                            <td width=15%><span class="badge rounded-pill badge-status col-lg-7 mt-2"
                                    style="background : grey;" id="badge<?= $no ?>">-</span>
                            </td>
                            
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    var jumlahTerisi = 0;
    var arrayno = [];
    var stokSesuai = 0;
    var stokLebih = 0;

    function formatRupiah(number) {

        let amount = parseInt(number, 10);

        if (isNaN(amount)) {
            return "Invalid input";
        }

        return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }).slice(0, -3);
    }


    function hitungSelisih(idQtyOpname, idStock, idSelisih, idBadge, no) {
        
        var qtyOpname = parseFloat(document.getElementById(idQtyOpname).value) || 0;
        var stock = parseFloat(document.getElementById(idStock).value) || 0;
        var selisih =document.getElementById(idSelisih)
        var badge = document.getElementById(idBadge);
        var sesuai_input = document.getElementById('sesuai');
        var kurang_input = document.getElementById('kurang');
        var lebih_input = document.getElementById('lebih');
        var persentase_input =document.getElementById('persentase');
        var uangSelisih = document.getElementById('uangSelisih');
        
        selisih.value = Math.abs(qtyOpname - stock);        
        
        if (qtyOpname > stock) {
            badge.style.backgroundColor = "orange";
            badge.style.color = "black";
            badge.innerHTML = "Kelebihan";
        } else if (qtyOpname == stock) {
            badge.style.backgroundColor = "green";
            badge.style.color = "white";
            badge.innerHTML = "Sesuai";
        }else if(qtyOpname == ""| qtyOpname < 0) {
            badge.style.backgroundColor = "grey";
            selisih.value = "";
            badge.style.color = "white";
            badge.innerHTML = "-";
            
        } else {
            badge.style.backgroundColor = "red";
            badge.style.color = "white";
            badge.innerHTML = "Kurang";
        }
        
        
        var buffersesuai = 0;
        var bufferUangSesuai = 0;
        var bufferUangLebih = 0;
        var bufferUangKurang = 0;
        var bufferlebih = 0;
        var bufferkurang = 0;
        var bufferUangSelisih = 0;
        var totalStock = 0;
        var totalSelisih = 0;
        var totalIsi  = 0;
        for (var i = 1; i <= <?= $count ?>; i++) {
            str_badge = 'badge' + i.toString()
            str_hargaJual = 'hargaJual' + i.toString()
            str_selisih = 'selisih' + i.toString()
            str_stock = 'stock' + i.toString()
            
            var badges = document.getElementById(str_badge);
            var hargaJual = document.getElementById(str_hargaJual);
            var selisih = document.getElementById(str_selisih);
            var stock = document.getElementById(str_stock);
            var stokIsi = document.getElementById('stokIsi');
            var stokNoIsi = document.getElementById('stokNoIsi');
            var totalDaftarStokSesuai = document.getElementById('totalDaftarStokSesuai')
            var totalDaftarStokLebih = document.getElementById('totalDaftarStokLebih')
            var totalDaftarStokKurang = document.getElementById('totalDaftarStokKurang')
            var totalUangSesuai = document.getElementById('totalUangSesuai')
            var totalUangLebih = document.getElementById('totalUangLebih')
            var totalUangKurang = document.getElementById('totalUangKurang')
            var totalUangSelisih = document.getElementById('totalUangSelisih')
            var persentaselabel = document.getElementById('persentaseLabel');
            var container1 = document.getElementById('container1')
            var container2 = document.getElementById('container2')



            switch (badges.innerHTML) {
                case 'Sesuai': buffersesuai += 1;
                    harga = Math.floor(hargaJual.value) * stock.value;
                    bufferUangSesuai += harga
                    totalIsi +=1
                    break;
                case 'Kurang': bufferkurang += 1;
                    harga = Math.floor(hargaJual.value) * selisih.value;
                    bufferUangKurang += harga
                    totalIsi +=1
                    break;
                case 'Kelebihan': bufferlebih += 1;
                    harga = Math.floor(hargaJual.value) * selisih.value;
                    bufferUangLebih += harga
                    totalIsi +=1
                    break;
            }

            stokIsi.innerHTML =totalIsi;
            stokNoIsi.innerHTML = <?=$count?> -totalIsi;

            bufferUangSelisih = bufferUangLebih - bufferUangKurang;
            if (bufferUangSelisih > 0) {
                totalUangSelisih.innerHTML = formatRupiah(bufferUangSelisih);
                container1.style.background = "green"
                container2.style.background = "green"
            } else if (bufferUangSelisih == 0) {
                container1.style.background = "grey";
                container2.style.background = "grey";
                totalUangSelisih.innerHTML = formatRupiah(bufferUangSelisih);
            } else {
                totalUangSelisih.innerHTML = formatRupiah(bufferUangSelisih);
                container1.style.background = "red"
                container2.style.background = "red"

            }
            totalStock += parseInt(stock.value)
            bufferSelisih =selisih.value;
            if (selisih.value == "") bufferSelisih = 0;
            totalSelisih += parseInt(bufferSelisih)

            persentase = totalSelisih / totalStock
            persentase = persentase.toLocaleString('en-US', { style: 'percent', minimumFractionDigits: 2 });

            totalUangSesuai.innerHTML = formatRupiah(bufferUangSesuai);
            totalUangLebih.innerHTML = formatRupiah(bufferUangLebih);
            totalUangKurang.innerHTML = formatRupiah(bufferUangKurang);
            persentaselabel.innerHTML = persentase;
            totalDaftarStokSesuai.innerHTML = buffersesuai;
            totalDaftarStokKurang.innerHTML = bufferkurang;
            totalDaftarStokLebih.innerHTML = bufferlebih;
        }

        sesuai_input.value = totalDaftarStokSesuai.innerHTML;
        lebih_input.value = totalDaftarStokLebih.innerHTML;
        kurang_input.value = totalDaftarStokKurang.innerHTML;
        uangSelisih.value = totalUangSelisih.innerHTML;
        persentase_input.value = persentaselabel.innerHTML;
    }



</script>