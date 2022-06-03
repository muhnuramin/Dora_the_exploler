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
            <a href="<?= base_url('home/form'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> Tambah Surat</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-align">NO.</th>
                            <th>Surat dari</th>
                            <th>Nomor Surat</th>
                            <th>Nomor Agenda</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Diterima</th>
                            <th>Sifat</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $s) : ?>
                            <tr>
                                <th class="align-middle text-align" scope="row"><?= $i++; ?></th>
                                <td class="align-middle"><?= htmlentities($s['asal_surat']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['nomor_surat']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['nomor_agenda']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['tanggal_surat']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['tanggal_diterima']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['sifat']) ?></td>
                                <td class="align-middle"><?= htmlentities($s['perihal']) ?></td>
                                <!-- <td class="align-middle"><?= $s['surat']; ?></td> -->
                                <td>
                                    <center>
                                        <div class="btn-group-vertical">
                                            <a href="<?= base_url('home/delete/'); ?><?= $s['id']; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"></i></a>
                                            <a href="<?= base_url('home/edit/'); ?><?= $s['id']; ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="auto" title="Edit Surat"><i class="far fa-edit"></i></a>
                                            <a href="<?= base_url('home/show/'); ?><?= $s['id']; ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="auto" title="Detail Surat"><i class="fas fa-info"></i></a>
                                        </div>
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