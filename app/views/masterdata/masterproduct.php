<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=BASEURL?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Master Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
 

        <!-- Start Ngoding Disini -->
            <div class="card">
                <div class="card-header bg-success mx-0" style="height : 60px;">
                    <h2 class="card-title py-2" style="font-size : 30px; color : white;">
                        <i class="bx bx-list-ul fa"></i> List Produk
                    </h2>
                </div>
    
                <div class="card-body">
                <?php Util::flash(); ?>
    
                    <div class='addproduct'>
                        <button type="button" class="btn btn-primary mt-3 ms-5 addProduct" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <b><i class="ri-add-fill "></i></b>Tambah Produk</button>
                    </div>
    
                    <div class="mt-3">
                        <div class="card-header">
                            <h5>Daftar Produk</h5>
                        </div>
                        <table id="product" class="table table-striped " border="2" style="width:100%">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Pabrik</th>
                                    <th>Suplier</th>
                                    <th>Sat.Besar</th>
                                    <th>Hrg Sat.Besar</th>
                                    <th>PPN</th>
                                    <th>Sat.Kecil</th>
                                    <th>Isi</th>
                                    <th>Hrg. Sat.Kecil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
    
                                $products = $data['product'];
                                $ppn = 11;
                                $no = 0;
                                foreach ($products as $row):
                                    $no++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $row['name_tmp']; ?>
                                        </td>
                                        <td>
                                            <?= $row['name_tmf']; ?>
                                        </td>
                                        <td>
                                            <?= $row['name_tms'] ?>
                                        </td>
                                        <td>
                                            <?= $row['name_tmun'] ?>
                                        </td>
                                        <td>
                                            <?= Util::format_rupiah($row['large_price_tmp']) ?>
                                        </td>
                                        <td>
                                            <?= $ppn ?>%
                                        </td>
                                        <td>
                                            <?= $row['name_tmun'] ?>
                                        </td>
                                        <td>
                                            <?= $row['fill_tmp'] ?>
                                        </td>
                                        <td>
                                        <?= Util::format_rupiah($row['small_price_tmp']) ?>
                                        </td>
                                        <td>
                                            <div class = "row">
                                                <a class="btn btn-warning changeModal col-lg-4 d-flex justify-content-center" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop" role="button"
                                                    data-id="<?= $row['id_product_tmp']; ?>" data-url="<?= BASEURL; ?>"><i class=" ri-edit-2-line"></i></a>
                                                <a class="btn btn-danger col-lg-4 ms-1  d-flex justify-content-center"
                                                    href="<?= BASEURL ?>masterdata/masterproductDelete/<?= $row['id_product_tmp'] ?>"
                                                    role="button"
                                                    onclick="return confirm('Hapus <?= $row['name_tmp'] ?>')"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!-- End Ngoding Disini -->

    </section>
</main>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Unit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>masterdata/masterproductAdd" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="name" id="name" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Pabrik</label>
                                                <div class="input-group">

                                                    <select class=form-control id='factory' name="factory" id="">
                                                        <option value="" disabled="" selected="">Pilih pabrik</option>
                                                        <?php
                                                        foreach ($data['factory'] as $row):
                                                            ?>
                                                            <option value="<?= $row['id_factory_tmf'] ?>">
                                                                <?= $row['name_tmf'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <div class="input-group">

                                                    <select style="width:180px;" name="suplier" id="suplier"
                                                        class="form-control" required="">
                                                        <option value="" disabled="" selected="">Pilih Suplier</option>

                                                        <?php
                                                        foreach ($data['suplier'] as $row):
                                                            ?>
                                                            <option value="<?= $row['id_suplier_tms'] ?>">
                                                                <?= $row['name_tms'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>PPN</label>
                                                <div class="input-group">

                                                    <select name="ppn" id="ppn" class="form-control" readonly=""
                                                        required="">
                                                        <option selected value="11">11 %</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <h6 class="card-header">
                                        <label for="">Satuan Besar</label>
                                    </h6>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="barcode">Barcode satuan besar</label>
                                            <div class="input-group">

                                                <input name="large_barcode" id="large_barcode" type="text"
                                                    placeholder="Jika belum memiliki maka kosongkan"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="large_unit">Satuan besar</label>
                                            <div class="input-group">

                                                <select style="width:180px;" name="large_unit" id="large_unit"
                                                    class="form-control" required="">
                                                    <option selected value="">Pilih Satuan</option>
                                                    <?php
                                                    foreach ($data['unit'] as $row):
                                                        ?>
                                                        <option value="<?= $row['id_unit_tmun'] ?>">
                                                            <?= $row['name_tmun'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>Harga satuan besar</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input name="large_price" id="large_price" type="text"
                                                            class="form-control" id="large_price"s required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Total isi barang</label>
                                                    <div class="input-group">
                                                        <input name="fill" id="fill" type="number" class="form-control"
                                                            id="content_mp" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <h6 class="card-header">
                                        <label for="">Satuan Kecil</label>
                                    </h6>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="barcode">Barcode satuan kecil</label>
                                            <div class="input-group">

                                                <input name="small_barcode" id="small_barcode" type="text"
                                                    placeholder="Jika belum memiliki maka kosongkan"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Satuan Kecil</label>
                                            <div class="input-group">

                                                <select style="width:180px;" name="small_unit" id="small_unit"
                                                    class="form-control" required="">
                                                    <option value="" disabled="" selected="">Pilih Satuan</option>
                                                    <?php
                                                    foreach ($data['unit'] as $row):
                                                        ?>
                                                        <option value="<?= $row['id_unit_tmun'] ?>">
                                                            <?= $row['name_tmun'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga satuan kecil</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input name="small_price" type="text" class="form-control"
                                                    id="small_price" readonly required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name='submit' class="btn btn-primary "
                                id="modalSubmit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>


    // Menangkap elemen-elemen input
var large_price = document.getElementById("large_price");
var ppn = document.getElementById("ppn");
var fill = document.getElementById("fill");
var small_price = document.getElementById("small_price");

// Menambahkan event listener untuk input
large_price.addEventListener("input", calculateSmallPrice);
ppn.addEventListener("input", calculateSmallPrice);
fill.addEventListener("input", calculateSmallPrice);

function calculateSmallPrice() {
  // Mendapatkan nilai dari input
  var large_price_value = parseFloat(large_price.value) || 0;
  var ppn_value = parseFloat(ppn.value) || 0;
  var fill_value = parseFloat(fill.value) || 0;

  // Menghitung harga satuan kecil
  var result = (large_price_value / fill_value) * (1 + ppn_value / 100);

  // Menetapkan nilai pada input harga_satuan_kecil
  small_price.value = parseInt(result);
}

</script>  

