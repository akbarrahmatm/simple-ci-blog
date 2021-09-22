<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">

            <a class="btn btn-primary mb-2" href="/admin/blog">Kembali Ke Data</a>
            <h1>Edit Data Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="/admin/blog/update" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $blog['blog_id'] ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control <?= $error->hasError('judul') ? "is-invalid" : false ?>" value="<?= $blog['blog_title'] ?>" id="judul">
                    <div id="judulValidation" class="invalid-feedback">
                        <?= $error->getError('judul') ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select <?= $error->hasError('category') ? "is-invalid" : false ?>" name="category">
                        <option value="kosong">Tidak Dipilih</option>
                        <?php foreach ($category as $dataCategory) : ?>
                            <option <?= $blog['category_id'] == $dataCategory['category_id'] ? "selected" : false ?> value="<?= $dataCategory['category_id'] ?>"><?= $dataCategory['category'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div id="judulValidation" class="invalid-feedback">
                        <?= $error->getError('category') ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control <?= $error->hasError('content') ? "is-invalid" : false ?>" name="content" id="content" rows="5"><?= $blog['blog_content'] ?></textarea>
                    <div id="judulValidation" class="invalid-feedback">
                        <?= $error->getError('content') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection() ?>