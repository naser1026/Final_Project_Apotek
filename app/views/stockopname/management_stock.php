<div class="tab-pane fade active show" id="manajemen_stock" role="tabpanel" aria-labelledby="manajemen_stock-tab">

    <div class="card mt-2">
        <div class="card-header bg-success text-light">
            <h6 class="fw-bold fs-9">Stok Produk</h6>
        </div>

        <div class="card-body">
            <div class="row mb-3">

                <button class="btn btn-primary col-lg-2 mx-3  " data-bs-toggle="modal" data-bs-target="#add_stock"><i
                        class="ri-add-fill fw-bold fs-6 px-2"></i>Tambah
                    Stok</button>

                <button class="btn btn-danger col-lg-2 " data-bs-toggle="modal" data-bs-target="#min_stock">
                    <i class="bx  bx-minus fw-bold fs-6 px-2"></i>Pengurangan
                    Stok</button>

            </div>
            <table id="unit" class="table table-striped " border="2" style="width:100%">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Kecil</th>
                        <th>Unit</th>
                        <th>Harga Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['product'] as $row):
                        $no++;

                        ?>
                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $row['small_barcode_tmp'] ?>
                            </td>
                            <td>
                                <?= $row['name_tmp'] ?>
                            </td>
                            <td>
                                <?= $row['stock_tmp'] ?>
                            </td>
                            <td>
                                <?= $row['name_tmun'] ?>
                            </td>
                            <td>
                                <?= Util::format_rupiah(floor($row['small_price_tmp'])) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>



    <hr>




</div>


<!-- Modal -->


<div class="modal fade" id="add_stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= BASEURL ?>opname/updateStock" method="post">
            <input type="hidden" name="type" value="add">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah stok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="col-lg-11 mx-3 my-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <select class="form-control" name="id" id="">
                                <option selected disabled>Pilih produk</option>
                                <?php foreach ($data['product'] as $product):
                                    ?>
                                    <option value="<?= $product['id_product_tmp'] ?>">
                                        <?= $product['name_tmp'] ?>
                                    </option>

                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-5 mx-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="unit" id="unit1" value="0">
                                <label class="form-check-label" for="unit1">
                                    Satuan besar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="unit" id="unit2" value="1" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Satuan kecil
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-11 mx-3 my-3">
                            <label class="form-label fw-bold">Jumlah stok yang dimasukan</label>
                            <input type="number" class="form-control" name="qty" id="">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah stok</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="min_stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= BASEURL ?>opname/updateStock" method="post">
            <input type="hidden" name="type" value="delete">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pengurangan stok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="col-lg-11 mx-3 my-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <select class="form-control" name="id" id="">
                                <option selected disabled>Pilih produk</option>
                                <?php foreach ($data['product'] as $product):
                                    ?>
                                    <option value="<?= $product['id_product_tmp'] ?>">
                                        <?= $product['name_tmp'] ?>
                                    </option>

                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-5 mx-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="unit" id="unit1" value="0">
                                <label class="form-check-label" for="unit1">
                                    Satuan besar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="unit" id="unit2" value="1" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Satuan kecil
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-11 mx-3 my-3">
                            <label class="form-label fw-bold">Jumlah stok yang dimasukan</label>
                            <input type="number" class="form-control" name="qty" id="">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Kurangi stok</button>
                </div>
            </div>
        </form>
    </div>
</div>