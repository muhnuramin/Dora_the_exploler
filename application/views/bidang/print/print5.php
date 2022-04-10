<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Lembar Disposisi</title>
</head>

<body>
    <div class="container mt-5"><br><br><br><br>
        <?php foreach ($surat_masuk as $s) : ?>
            <table class="table table-bordered">
                <tr>
                    <td style="width: 50%;">
                        Surat dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $s->asal_surat ?>
                    </td>
                    <td style="width: 50%;">Diterima Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $s->tanggal_diterima ?></td>
                </tr>
                <tr>
                    <td>Tanggal Surat &nbsp;&nbsp;: <?= $s->tanggal_surat ?></td>
                    <td>Nomor Agenda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $s->nomor_agenda ?></td>
                </tr>
                <tr>
                    <td>Diteruskan Oleh &nbsp;&nbsp;: <?= $s->diteruskan_oleh ?></td>
                    <td>Tanggal Disposisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $s->tanggal_dikirim ?></td>
                </tr>
                <tr>
                    <td>Nomor Surat &nbsp;&nbsp;: <?= $s->nomor_surat ?></td>
                    <td>Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Penting</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Perihal :</p>
                        <div><?= $s->perihal ?></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Diteruskan Kepada :</p>
                        <div><?= $s->diteruskan_kepada ?></div>
                    </td>
                    <td>
                        <p>Dengan Hormat Harap :</p>
                        <div><?= $s->tindak_lanjut ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Catatan :</p>
                        <?php if (file_exists('./' . $s->catatan)) { ?>
                            <div><img src="<?= base_url() ?><?= $s->catatan ?>" width="900" height="200"></div>
                        <?php } else { ?>
                            <p><?= $s->catatan ?></p>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Catatan Kepala Bidang:</p>
                        <?php if (file_exists('./' . $s->catatan_bidang)) { ?>
                            <div><img src="<?= base_url() ?><?= $s->catatan_bidang ?>" width="900" height="200"></div>
                        <?php } else { ?>
                            <p><?= $s->catatan_bidang ?></p>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <div class="float-right">
                <center>
                    <div class="paraf">
                        Paraf
                    </div>
                    <img src="<?= base_url() ?><?= $s->tanda_tangan ?>" width="200" height="200">
                </center>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        window.print();
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>