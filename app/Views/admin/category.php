<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>



<div class="container">
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <a class="btn btn-primary mb-2" href="/admin/category/create">Tambah Data</a>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover" id="category_table">
                <thead>
                    <tr>
                        <th class="no" scope="col">#</th>
                        <th scope="col">Category</th>
                        <th class="action" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($category as $dataCategory) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $dataCategory['category'] ?></td>
                            <td class="action">
                                <a class="btn btn-sm btn-warning" href="/admin/category/edit/<?= $dataCategory['category_id'] ?>">Edit</a>
                                <form action="/admin/category/delete" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $dataCategory['category_id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endsection() ?>