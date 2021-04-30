<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="content-frame mb-4 shadow">
        <div class="row content-frame pt-0 pb-0 pl-0 justify-content-between">
            <div class="col-3">
                <p class="font-weight-bold text-wild-watermelon m-0">Notifications</p>
            </div>
            <div class="col-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="select-all">
                    <label class="custom-control-label" for="select-all">&nbsp;</label>
                </div>
            </div>
            <div class="col-2">
                <p class="text-center m-0">Action</p>
            </div>
        </div>
    </div>
    <!-- frame notifications -->
    <div class="content-frame mb-4 shadow">
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>

        <?php foreach($notification as $notif) : ?>
            <div class="col-12 content-frame mb-3 shadow">
            <a href="<?= $notif['link']; ?>" class="d-block">
                <span class='text-primary'><?= date("d F Y (g:i a)", strtotime($notif['created_at'])); ?></span>
                <div class="row justify-content-between align-items-center">
                    <div class="col-10">
                        <p class="text-wrap text-black-50"><?= $notif['message']; ?></p>
                    </div>
                    <div class="col-1">
                        <form action="/notification/<?= $notif['id']; ?>" method="POST" class="d-inline form-delete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="fa fa-times text-danger"></span></button>
                        </form>
                    </div>
                </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    getItemInUserCart();
</script>
<?= $this->endSection(); ?>
    