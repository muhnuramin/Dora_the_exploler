<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            User <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('user/register'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> Tambah Pengguna</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $i++; ?></th>
                                <td class="align-middle"><?= htmlentities($u->name) ?></td>
                                <td class="align-middle"><?= htmlentities($u->username) ?></td>
                                <td class="align-middle"><?= htmlentities($u->nama_role) ?></td>
                                <td>
                                    <center>
                                        <div class="btn-group-vertical align-middle">
                                            <a href="<?= base_url('user/delete/'); ?><?= $u->user_id; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="fas fa-trash-alt"></i></i></a>
                                            <a href="<?= base_url('user/edit/'); ?><?= $u->user_id; ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="auto" title="Edit Surat"><i class="fas fa-edit"></i></i></a>
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