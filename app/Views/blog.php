<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php foreach ($blog as $dataBlog) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dataBlog['blog_title'] ?></h5>
                        <p class="text-muted">Category : <?= $dataBlog['category'] ?></p>
                        <p class="card-text"><?= character_limiter($dataBlog['blog_content'], 300, '...') ?> <a href="/<?= $dataBlog['slug'] ?>">Baca Selengkapnya</a> </p>

                    </div>
                </div>
            <?php endforeach ?>
            <div class="d-flex justify-content-center">
                <?= $pager->links() ?>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card mb-2">
                <div class="card-body">
                    <form action="/search" method="post">
                        <label class="form-label" for="search">Search :</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Blog Here ..." aria-describedby="button-addon2">
                            <button type="submit" class="btn btn-danger" type="button" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endsection() ?>