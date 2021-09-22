<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>




<div class="container">
    <a class="btn btn-primary mb-2" href="/admin/category">Kembali Ke Data</a>
    <h1>Edit Data Category</h1>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="/admin/category/update" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $category['category_id'] ?>">
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" value="<?= $category['category'] ?>" name="category" id="category">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection() ?>