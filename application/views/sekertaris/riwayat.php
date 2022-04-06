<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Asal Surat</th>
                            <th>Diteruskan Oleh</th>
                            <th>Tanggal Disposisi</th>
                            <th>Diteruskan Kepada</th>
                            <th>Tanggal Dibaca</th>
                            <th>Tindak Lanjut</th>
                            <th>Catatan</th>
                            <th>Catatan Bidang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($riwayat_surat as $rs) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlentities($rs->asal_surat) ?></td>
                                <td><?= htmlentities($rs->diteruskan_oleh) ?></td>
                                <td><?= htmlentities($rs->tanggal_dikirim) ?></td>
                                <td><?= htmlentities($rs->diteruskan_kepada) ?></td>
                                <?php if ($rs->tanggal_dibaca == '0000-00-00') : ?>
                                    <td class="text-danger"><b>Belum Dibaca</b></td>
                                <?php else : ?>
                                    <td class="text-success"><?= htmlentities($rs->tanggal_dibaca) ?></td>
                                <?php endif; ?>
                                <td><?= htmlentities($rs->tindak_lanjut) ?></td>
                                <?php if (file_exists('./' . $rs->catatan)) { ?>
                                    <td><img src="<?= base_url() ?><?= $rs->catatan ?>" alt=""></td>
                                <?php } else { ?>
                                    <td><?= $rs->catatan ?></td>
                                <?php } ?>
                                <td><?= htmlentities($rs->catatan_bidang) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>