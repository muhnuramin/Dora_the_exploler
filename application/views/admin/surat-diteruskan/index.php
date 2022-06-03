<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Surat Diteruskan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Surat dari</th>
                            <th>No. Surat</th>
                            <th>No. Agenda</th>
                            <th>Diteruskan Oleh</th>
                            <th>Tanggal Disposisi</th>
                            <th>Diteruskan Kepada</th>
                            <th>Tanggal Dibaca</th>
                            <th>Catatan</th>
                            <th>Catatan Bidang</th>
                            <th>TTD</th>
                            <th>Detail</th>
                            <th>Print</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_diteruskan as $sd) : ?>
                            <tr>
                                <td class="align-middle text-align" scope="row"><?= $i++; ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->asal_surat) ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->nomor_surat) ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->nomor_agenda) ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->diteruskan_oleh) ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->tanggal_dikirim) ?></td>
                                <td class="align-middle" scope="row"><?= htmlentities($sd->diteruskan_kepada) ?></td>
                                <?php if ($sd->tanggal_dibaca == '0000-00-00') : ?>
                                    <td class="text-danger"><b>Belum Dibaca</b></td>
                                <?php else : ?>
                                    <td class="text-success"><?= htmlentities($sd->tanggal_dibaca) ?></td>
                                <?php endif; ?>
                                <?php if (file_exists('./' . $sd->catatan)) { ?>
                                    <td><img src="<?= base_url() ?><?= $sd->catatan ?>" width="300px" height="150px"></td>
                                <?php } else { ?>
                                    <td><?= $sd->catatan ?></td>
                                <?php } ?>

                                <?php if (file_exists('./' . $sd->catatan_bidang)) { ?>
                                    <td><img src="<?= base_url() ?><?= $sd->catatan_bidang ?>" width="300" height="150"></td>
                                <?php } else { ?>
                                    <td><?= htmlentities($sd->catatan_bidang) ?></td>
                                <?php } ?>
                                <td class="align-middle" scope="row"><img src="<?= base_url() ?><?= $sd->tanda_tangan ?>" width="100" height="100"></td>
                                <td class="align-middle">
                                    <center>
                                        <a href="<?= base_url('surat_diteruskan/detail/'); ?><?= $sd->id_disposisi ?>" class="btn btn-success btn-sm">Detail</a>
                                    </center>
                                </td>
                                <td class="align-middle">
                                    <a href="<?= base_url('surat_diteruskan/print/'); ?><?= $sd->id_disposisi ?>" target="_BLANK" type="button" class="btn btn-success"><i class="fas fa-print"></i> Print Lembar Disposisi</a><br><br>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>