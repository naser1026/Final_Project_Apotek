<div class="tab-pane fade" id="opname_history" role="tabpanel" aria-labelledby="adjusment_stock-tab">

    <div class="card mt-2">
        <div class="card-header bg-success text-light">
            <span class="card-title">Riwayat Penyesuaian Stok</span>
        </div>

        <div class="card-body">
            <table id="unit" class="table table-striped table-bordered" border="2" style="width:100%">
                <thead class="thead-primary">
                    <tr>
                        <th rowspan="2">
                            #
                        </th>
                        <th rowspan="2"> Keterangan</th>
                        <th colspan="3" rowspan="1" class="text-center">
                            Qty
                        </th>
                        <th rowspan="2"> Tanggal</th>
                        <th rowspan="2"> Dibuat oleh</th>
                        <th rowspan="2 ">Persentase selisih</th>
                        <th rowspan="2 ">Total Uang Selisih</th>
                        <th rowspan="2 "><i class="bx bxs-cog"></i></th>
                    </tr>
                    <tr>
                        <th>Sesuai</th>
                        <th>Kelebihan</th>
                        <th>Kurang</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0;
                    foreach ($data['opname'] as $row):
                        $no++;
                        ?>
                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $row['description_tmo'] ?>
                            </td>
                            <td>
                                <div class="px-2 text-center" style="background : #b8e3cc;">
                                    <?= $row['qty_ok_tmo'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 text-center" style="background : #eed39a;">
                                    <?= $row['qty_up_tmo'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 text-center" style="background : #e6a2a2;">
                                    <?= $row['qty_down_tmo'] ?>
                                </div>
                            </td>
                            <td>
                                <?= $row['created_date_tmo'] ?>
                            </td>
                            <td>
                                <?= $row['created_by_tmo'] ?>
                            </td>
                            <td>
                                <?= $row['percentase_tmo'] ?>
                            </td>
                            <td>
                                <?= Util::format_rupiah($row['total_difference_price_tmo']) ?>
                            </td>
                            <td><a href="<?=BASEURL?>opname/deleteHistory/<?=$row['id_opname_tmo']?>" class = "btn btn-danger" onclick="confirm('Hapus')"><i class="bx bxs-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>