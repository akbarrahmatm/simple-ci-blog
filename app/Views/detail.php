<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <a class="btn btn-danger mb-2" href="/">Kembali</a>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h3><?= $blog['blog_title'] ?></h3>
                    <p class="text-muted">Category : <?= $blog['category'] ?></p>
                    <p class="content"><?= $blog['blog_content'] ?></p>

                </div>
            </div>
        </div>
    </div>
    <p class="text-muted text-center my-4">Page loaded : {elapsed_time} second</p>
</div>

<?= $this->endsection() ?>