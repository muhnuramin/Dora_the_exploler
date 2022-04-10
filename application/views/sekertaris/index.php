<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Surat <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Surat</th>
                            <th>No.Surat</th>
                            <th>Asal Surat</th>
                            <th>Sifat</th>
                            <th>Tindak Lanjut</th>
                            <th>Disposisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $s) : ?>
                            <tr>
                                <td><?= htmlentities($s['tanggal_surat']) ?></td>
                                <td><?= htmlentities($s['nomor_agenda']) ?></td>
                                <td><?= htmlentities($s['asal_surat']) ?></td>
                                <td><?= htmlentities($s['sifat']) ?></td>
                                <?php if ($s['didisposisi'] == '?') { ?>
                                    <td>Belum Diproses</td>
                                <?php } ?>
                                <td>
                                    <center>
                                        <a href="<?= base_url("sekertaris/detail2/"); ?><?= $s['id']; ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="auto" title="Disposisi Surat"><i class="far fa-paper-plane"></i></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($surat_masuk2 as $s) : ?>
                            <tr>
                                <td><?= htmlentities($s->tanggal_surat) ?></td>
                                <td><?= htmlentities($s->nomor_agenda) ?></td>
                                <td><?= htmlentities($s->asal_surat) ?></td>
                                <td><?= htmlentities($s->sifat) ?></td>
                                <td><?= htmlentities($s->tindak_lanjut) ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url("sekertaris/detail/") ?><?= $s->id_disposisi ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="auto" title="Disposisi Surat"><i class="far fa-paper-plane"></i></a>
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