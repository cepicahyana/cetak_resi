<?= $this->extend('temp_login/main') ?>


<?= $this->section('content') ?>
<div class="wrapper wrapper-login wrapper-login-full p-0">
        <?php if (isset($content)) {
                echo view($content);
        } else {
                echo "File Konten Tidak Ada";
        } ?>
</div>
<?= $this->endSection() ?>

