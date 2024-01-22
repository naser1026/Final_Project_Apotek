<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Master Suplier</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">

        <div class="card">
            <div class="card-header bg-success" style="height : 60px;">
                <h2 class="card-title py-2" style="font-size : 30px; color : white;">
                    <i class="bx bx-list-ul fa"></i> List Suplier
                </h2>
            </div>

            <div class="card body">
            <?php Util::flash(); ?>
                <div class='addproduct'>
                    <button type="button" class="btn btn-primary mt-3 ms-5 addProduct" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <b><i class="ri-add-fill "></i></b>Tambah Data Suplier</button>
                </div>

                <div class="col-lg-11 ms-5 ps-2 mt-3">
                    <div class="card-header">
                        <h5>Daftar Suplier</h5>
                    </div>
                    <table id="unit" class="table table-striped " border="2" style="width:100%">
                        <thead class="thead-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Suplier</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            
                            $no = 0;
                            foreach ($data['suplier'] as $row):
                                if($row['name_tms'] == '-'){
                                    continue;
                                }
                                $no += 1;
                                ?>
                                <tr>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        <?= $row['name_tms']; ?>
                                    </td>
                                    <td>
                                        <?= $row['email_tms']; ?>
                                    </td>
                                    <td>
                                        <?= $row['address_tms']; ?>
                                    </td>
                                    <td>

                                        <?= $row['phone_number_tms']; ?>
                                    </td>



                                    <td>
                                        <div class = "row">
                                        <a class="btn btn-warning suplierModalUpdate col-lg-4 d-flex justify-content-center" href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" role="button"
                                            data-id="<?= $row['id_suplier_tms']; ?>" data-url="<?= BASEURL; ?>"><i class="ri ri-edit-2-line"></i></a>
                                        <a class="btn btn-danger col-lg-4 ms-1  d-flex justify-content-center"
                                            href="<?= BASEURL ?>masterdata/mastersuplierDelete/<?= $row['id_suplier_tms'] ?>"
                                            role="button"
                                            onclick="return confirm('Hapus <?= $row['name_tms'] ?>')"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </section>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Suplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>masterdata/mastersuplierAdd" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label>Nama Suplier</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="name" id="name" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="email" id="email" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="address" id="address" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="contact" id="contact" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Website</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="website" id="website" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="information" id="information" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name='submit' class="btn btn-primary "
                                            id="modalSubmit">Tambah</button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>