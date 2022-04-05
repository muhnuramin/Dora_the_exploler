<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Surat Belum Dibaca</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Diteruskan</th>
                            <th>Diteruskan Oleh</th>
                            <th>Asal Surat</th>
                            <th>Sifat</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $s) : ?>
                            <tr class="hide-<?= $s->id_disposisi ?>">
                                <td><?= htmlentities($s->tanggal_dikirim) ?></td>
                                <td><?= htmlentities($s->diteruskan_oleh) ?></td>
                                <td><?= htmlentities($s->asal_surat) ?></td>
                                <td><?= htmlentities($s->sifat) ?></td>
                                <td><?= htmlentities($s->perihal) ?></td>
                                <td>
                                    <center>
                                        <form method="POST" action="<?= base_url('Bidang5/editbaca'); ?>">
                                            <input type="hidden" name="id" value="<?= $s->id_disposisi ?>">
                                            <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="auto" title="Baca Surat">Baca</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>