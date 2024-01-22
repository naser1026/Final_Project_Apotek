<main id="main" class="main">
    <div class="pagetitle">
        <h1>Retur Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Retur Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="col-lg-6">
            <?php Util::flash(); ?>
        </div>

        <div class="card">

            <div class="card-header bg-success text-light">
                <span class="card-title"><i class="ri-exchange-box-line mx-2"></i>Retur Penerimaan Produk</span>
            </div>

            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title"><i class="ri-exchange-box-line mx-2"></i>Retur Penerimaan Produk</span>
                    </div>
                    <div class="card-body">

                        <div class="col-lg-4 ms-3">
                            <label for="" class="form-label fw-bold">No.Faktur</label>

                            <form action="<?= BASEURL ?>retur/product_retur" method="post">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select name="id_purchase" id="faktur" class="form-control">
                                            <option selected disabled>Pilih No.faktur</option>
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
                                        <button class="btn btn-primary" type="submit"><i
                                                class="bi bi-search"></i></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 mt-4">

                        </div>
                    </div>
                </div>

            </div>

        </div>


    </section>