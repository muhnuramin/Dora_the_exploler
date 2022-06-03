<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Disposisi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Surat dari</th>
                            <th>No. Surat</th>
                            <th>No. Agenda</th>
                            <th>Diteruskan Oleh</th>
                            <th>Tanggal Disposisi</th>
                            <th>Diteruskan Kepada</th>
                            <th>Tanggal Dibaca</th>
                            <th>Tindak Lanjut</th>
                            <th>Catatan</th>
                            <th>Catatan Bidang</th>
                            <th>Print</th>
                            <th>Disposisi Ulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($riwayat_surat as $rs) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlentities($rs->asal_surat) ?></td>
                                <td><?= htmlentities($rs->nomor_surat) ?></td>
                                <td><?= htmlentities($rs->nomor_agenda) ?></td>
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
                                    <td><img src="<?= base_url() ?><?= $rs->catatan ?>" width="300px" height="150px"></td>
                                <?php } else { ?>
                                    <td><?= $rs->catatan ?></td>
                                <?php } ?>

                                <?php if (file_exists('./' . $rs->catatan_bidang)) { ?>
                                    <td><img src="<?= base_url() ?><?= $rs->catatan_bidang ?>" width="300" height="150"></td>
                                <?php } else { ?>
                                    <td><?= htmlentities($rs->catatan_bidang) ?></td>
                                <?php } ?>
                                <td class="align-middle">
                                    <a href="<?= base_url('sekertaris/print/'); ?><?= $rs->id_disposisi ?>" target="_BLANK" type="button" class="btn btn-success"><i class="fas fa-print"></i> Print Lembar Disposisi</a><br><br>
                                </td>
                                <td class="align-middle">
                                    <center>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </center>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin disposisi ulang surat ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            jika anda ingin mendisposisikan ulang surat, maka disposisi sebelumnya akan <b>terhapus</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <a href="<?= base_url("sekertaris/disposisiulang/") ?><?= $rs->id_surat_masuk ?>" type="button" class="btn btn-primary">Lanjutkan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>