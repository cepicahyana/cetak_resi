<?= $this->extend('temp_back/main') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="container">

        <div id="content">

            <?php if(isset($content)){echo view($content); }else{ echo "Content File Missing";  }; ?>

        </div>

    </div>
    <?= $this->include("temp_back/footer");?>
</div>



<?= $this->endSection() ?>