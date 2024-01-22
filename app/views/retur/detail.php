<main id="main" class="main">
    <div class="pagetitle">
        <h1>Retur Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>retur/index">Retur Produk</a></li>
                <li class="breadcrumb-item active"><?=$data['purchase_detail']['invoice_number_ttp']?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">

        <div class="card">

            <div class="card-header bg-success text-light">
                <span class="card-title"><i class="ri-exchange-box-line mx-2"></i>Retur Penerimaan Produk</span>
            </div>

            <div class="card-body">
                <div class="card">
                    <div class="card-header ">
                        <span class="card-title"><i class="ri-exchange-box-line mx-2"></i>Retur Penerimaan Produk</span>
                    </div>
                    <div class="card-body">

                        <div class="col-lg-4 ms-3">
                            <label for="" class="form-label fw-bold">No.Faktur</label>

                            <form action="<?= BASEURL ?>retur/product_retur" method="post">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select name="id_purchase" id="faktur" class="form-control">
                                            <option selected><?=$data['purchase_detail']['invoice_number_ttp']?> </option>
                                            <?php
                                            foreach ($data['purchase'] as $row):
                                                ?>
                                                <option value="<?= $row['id_purchase_ttp'] ?>">
                                                    <?= $row['invoice_number_ttp'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-primary tes" onclick="tampil('detail')"
                                            data-url="<?= BASEURL; ?>"><i class="bi bi-search"></i></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 mt-4">

                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-header ">
                        <span class="card-title"><i class="bx bx-detail"></i>Detail</span>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">No. Faktur</label>
                                            <h2 id="invoice">
                                                <?= $data['purchase_detail']['invoice_number_ttp'] ?>
                                            </h2>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-bold">Suplier</label>
                                            <input type="text" name=""
                                                value="<?= $data['purchase_detail']['name_tms'] ?>" readonly disabled
                                                class="form-control">
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label fw-bold">Tanggal Faktur</label>
                                                <input type="text" name=""
                                                    value="<?= $data['purchase_detail']['invoice_date_ttp'] ?>" readonly
                                                    disabled class="form-control">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label fw-bold">Tanggal Bayar</label>
                                                <input type="text" name=""
                                                    value="<?= $data['purchase_detail']['invoice_date_ttp'] ?>" readonly
                                                    disabled class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header ">
                                        <span class="card-title">Daftar barang yang diretur.</span>

                                    </div>
                                    <div class="card-body">
                                        <table id="tabelB" class="table">
                                            <thead class="thead-primary">
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>PPN</th>
                                                    <th width=10%>Jumlah</th>
                                                    <th>Total Harga</th>
                                                    <th><i class="bx bx-cog"></i></th>
                                                    <th class="d-none"></th>

                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <!-- Tabel B awalnya kosong -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?=BASEURL?>retur/addRetur" method = "post">
                                        <input type="hidden" name="id_purchase" value = "<?=$data['purchase_detail']['id_purchase_ttp'] ?>">
                                        <label for="" class="form-label fw-bold">Total Bayar</label>
                                        <input type="text" disabled  id="totalPayment"
                                            value="<?= Util::format_rupiah($data['purchase_detail']['total_payment_ttp']) ?>"
                                            readonly class="form-control">
                                        <hr>
                                        <label for="" class="form-label fw-bold">Uang yang dikembalikan</label>
                                        <input type="text" name="retur_price" readonly id="returPrice"  
                                            class="form-control">
                                        <input type="hidden" name="list_product" id = "listProduct">
                                        <input type="hidden" name="list_qty" id = "listQty">
                                        <div class="form-group mt-3">
                                            <button class="form-control btn btn-primary" type="submit">Retur Produk</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header ">
                                        <span class="card-title">Keterangan</span>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <button disabled class="btn btn-primary bx bx-sync">
                                                </button>
                                            </div>
                                            <div class="col-lg-4 mt-2 ms-3">
                                                <label class="form-label " for="">Retur item</label>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-lg-1">
                                                <button disabled class="btn btn-danger bx bx-revision">
                                                </button>
                                            </div>
                                            <div class="col-lg-6 mt-2 ms-3">
                                                <label class="form-label " for="">Tidak jadi retur</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <span class="card-title">Daftar Barang</span>
                            </div>
                            <div class="card-body">

                                <table id="tabelA" class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>PPN</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th><i class="bx bx-cog"></i></th>
                                            <th class = "d-none">id</th>
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
                                                <td width=12%>
                                                    <button onclick="pindahData(this)"
                                                        class="btn btn-primary bx bx-sync"></button>
                                                </td>
                                                <td class = "d-none"><?=$row['id']?></td>

                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        
                        
                    </div>

                </div>

            </div>
        </div>


    </section>


    <script>
        var invoice = document.getElementById('faktur');
        var list_id_product = [];
        var list_qty = [];
        var totalRetur = 0;
        var listProduct =document.getElementById('listProduct');
        var listQty =document.getElementById('listQty');
        returPrice = document.getElementById('returPrice');
        totalPayment = document.getElementById('totalPayment');
        function pindahData(button) {
            // Mendapatkan baris yang berisi tombol yang ditekan
            var row = button.parentNode.parentNode;

            // Mendapatkan nilai dari setiap kolom
            var no = row.cells[0].innerHTML;
            var barcode = row.cells[1].innerHTML;
            var name = row.cells[2].innerHTML;
            var price = row.cells[3].innerHTML;
            var ppn = row.cells[4].innerHTML;
            var qty = row.cells[5].innerHTML;
            var total_price = row.cells[6].innerHTML;
            var id = row.cells[8].innerHTML;
            
            // Mengambil nilai inputan qty baru
            var inputQty = prompt("Masukkan jumlah produk yang akan diretur:", qty);
            var newQty = parseInt(inputQty);

            
            // Validasi input qty
            if (isNaN(newQty) || newQty < 0) {
                alert("Input tidak valid. Masukkan jumlah dengan benar.");
                return;
            }
            
            // Mengurangkan qty yang dipindahkan dari qty awal
            var remainingQty = parseInt(qty) - newQty;
            
            // Validasi sisa qty di Tabel A
            if (remainingQty < 0) {
                alert("Jumlah yang diretur melebihi jumlah stok yang tersedia.");
                return;
            }
            if (remainingQty == 0) {
                row.parentNode.removeChild(row);
                
            }
            
            // Update total_price
            price = parseInt(total_price.replace(/[^\d]/g, '')) / parseInt(qty)
            remainingprice = price * remainingQty
            itemReturPrice = parseInt(total_price.replace(/[^\d]/g, '')) - remainingprice;
            
            totalRetur += itemReturPrice;
            totalPayment.value = ((parseInt(totalPayment.value.replace(/\D/g, '')) - itemReturPrice).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            })).slice(0, -3)
            totalReturStr = totalRetur.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            returPrice.value = totalReturStr.slice(0, -3);
            
            itemReturPrice = itemReturPrice.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            remainingprice = remainingprice.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            price = price.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            row.cells[6].innerHTML = remainingprice.slice(0, -3);
            
            // Update qty di Tabel A
            row.cells[5].innerHTML = remainingQty;
            
            if (!list_id_product.includes(id)) {
                list_id_product.push(id);
                list_qty.push(newQty*-1);
                listQty.value =list_qty;
                listProduct.value =list_id_product;
            }
            
            
            // Menambahkan baris baru ke Tabel B
            var tabelB = document.getElementById('tabelB').getElementsByTagName('tbody')[0];
            var newRow = tabelB.insertRow();
            var cellNo = newRow.insertCell(0);
            var cellBarcode = newRow.insertCell(1);
            var cellName = newRow.insertCell(2);
            var cellPrice = newRow.insertCell(3);
            var cellPpn = newRow.insertCell(4);
            var cellQty = newRow.insertCell(5);
            var cellTotalPrice = newRow.insertCell(6);
            var cellAksi = newRow.insertCell(7);
            var cellId =newRow.insertCell(8);



            cellNo.innerHTML = no;
            cellBarcode.innerHTML = barcode;
            cellName.innerHTML = name;
            cellPrice.innerHTML = price.slice(0, -3);
            cellPpn.innerHTML = ppn;
            cellQty.innerHTML = newQty;
            cellTotalPrice.innerHTML = itemReturPrice.slice(0, -3);
            cellAksi.innerHTML = '<button onclick="kembaliData(this)" class="btn btn-danger bx bx-revision"></button>';
            cellId.style.display = 'none';
            cellId.innerHTML = id;
        }


        function kembaliData(button) {
            // Mendapatkan baris yang berisi tombol yang ditekan di Tabel B
            var row = button.parentNode.parentNode;

            // Mendapatkan nilai dari setiap kolom
            var no = row.cells[0].innerHTML;
            var barcode = row.cells[1].innerHTML;
            var name = row.cells[2].innerHTML;
            var price = row.cells[3].innerHTML;
            var ppn = row.cells[4].innerHTML;
            var qty = row.cells[5].innerHTML;
            var total_price = row.cells[6].innerHTML;
            var id = row.cells[8].innerHTML;


            total_price_str = parseInt(total_price.replace(/\D/g, ''));
            totalRetur -= total_price_str
            totalPayment.value = ((parseInt(totalPayment.value.replace(/\D/g, '')) + total_price_str).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            })).slice(0, -3)
            totalReturStr = totalRetur.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            returPrice.value = totalReturStr.slice(0, -3);



            // Menambahkan baris baru ke Tabel B
            var tabelA = document.getElementById('tabelA').getElementsByTagName('tbody')[0];
            var newRow = tabelA.insertRow();
            var cellNo = newRow.insertCell(0);
            var cellBarcode = newRow.insertCell(1);
            var cellName = newRow.insertCell(2);
            var cellPrice = newRow.insertCell(3);
            var cellPpn = newRow.insertCell(4);
            var cellQty = newRow.insertCell(5);
            var cellTotalPrice = newRow.insertCell(6);
            var cellAksi = newRow.insertCell(7);
            var cellId =newRow.insertCell(8);

            var index = list_id_product.indexOf(id);
            list_id_product.splice(index, 1);
            list_qty.splice(index, 1);
            listQty.value =list_qty;
            listProduct.value =list_id_product;

            cellNo.innerHTML = no;
            cellBarcode.innerHTML = barcode;
            cellName.innerHTML = name;
            cellPrice.innerHTML = price;
            cellPpn.innerHTML = ppn;
            cellQty.innerHTML = qty;
            cellTotalPrice.innerHTML = total_price;
            cellAksi.innerHTML = '<button onclick="pindahData(this)" class="btn btn-primary bx bx-sync"></button>';
            cellId.style.display = 'none';

            cellId.innerHTML = id;


            row.parentNode.removeChild(row);

        }

    </script>