<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>




<div class="container">
    <a class="btn btn-primary mb-2" href="/admin/category">Kembali Ke Data</a>
    <h1>Tambah Data Category</h1>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="/admin/category/save" method="POST">
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" value="<?= old('category') ?>" class="form-control <?= $error->hasError('category') ? "is-invalid" : false ?>" id="category">
                    <div class="invalid-feedback">
                        <?= $error->getError('category') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection() ?>