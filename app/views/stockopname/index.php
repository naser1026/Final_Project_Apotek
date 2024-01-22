<main id="main" class="main">
    <div class="pagetitle">
        <h1>Stok Opname</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Stock opname</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="row">
            <!-- Start Ngoding Disini -->
            <div class="col-lg-6">
                <?php Util::flash(); ?>
            </div>
            <div class="card-body">

                <!-- Default Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="manajemen_stock-tab" data-bs-toggle="tab"
                            data-bs-target="#manajemen_stock" type="button" role="tab" aria-controls="manajemen_stock"
                            aria-selected="true">List Stok Produk</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="adjusment_stock-tab" data-bs-toggle="tab"
                            data-bs-target="#adjusment_stock" type="button" role="tab" aria-controls="adjusment_stock"
                            aria-selected="false" tabindex="-1">Proses Penyesuaian Stok</button>
                    </li>
                    <li>
                    <button class="nav-link" id="adjusment_stock-tab" data-bs-toggle="tab"
                            data-bs-target="#opname_history" type="button" role="tab" aria-controls="adjusment_stock"
                            aria-selected="false" tabindex="-1">Riwayat Penyesuaian Stok</button>
                    </li>
                    

                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                    <?php include 'management_stock.php' ?>
                    <?php include 'adjustment_stock.php'?>
                    <?php include 'opname_history.php'?>
                </div><!-- End Default Tabs -->
            </div>

    








            <!-- End Ngoding Disini -->

        </div>
    </section>