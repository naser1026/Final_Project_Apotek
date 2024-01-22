<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Master Unit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">

        <div class="card">
            <div class="card-header bg-success" style="height : 60px;">
                <h2 class="card-title py-2" style="font-size : 30px; color : white;">
                    <i class="bx bx-list-ul fa"></i> List Unit
                </h2>
            </div>

            <div class="card body">
                
                    
                        <?php Util::flash(); ?>
                    
                <div style="margin-left : 11%; padding-top : 2rem" ;>
                    <a type="button" class="btn btn-primary unitModalAdd" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <b><i class="ri-add-fill "></i></b>Tambah Unit</a>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-2">
                    </div>
                    <div class="col-lg-9 col-10 col-md-8 ms-5 ps-2 mt-3">
                        <div class="card-header">
                            <h5>Daftar Unit</h5>
                        </div>

                        <table class="table table-striped " border="2" style="width:100%">
                            <thead class="thead-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Unit</th>
                                    <th>Keterangan</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $unit = $data['unit'];
                                $no = 0;
                                foreach ($unit as $row):
                                    $no += 1;
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $row['name_tmun']; ?>
                                        </td>
                                        <td>
                                            <?= $row['information_tmun']; ?>
                                        </td>

                                        <td>
                                            <a class="btn btn-warning unitModalUpdate" href="#" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop" role="button"
                                                data-id="<?= $row['id_unit_tmun']; ?>" data-url="<?= BASEURL; ?>"><i
                                                    class="ri ri-edit-2-line"></i></a>
                                            <a class="btn btn-danger"
                                                href="<?= BASEURL ?>masterdata/masterunitDelete/<?= $row['id_unit_tmun'] ?>"
                                                role="button" onclick="return confirm('Hapus <?= $row['name_tmun'] ?>')"><i
                                                    class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pabrik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>masterdata/masterunitAdd" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label>Nama Unit</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input name="name" id="name" type="text" class="form-control">
                                        </div>
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


    