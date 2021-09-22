<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <a class="btn btn-primary mb-2" href="/admin/blog/create">Tambah Data</a>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover" id="blog_table">
                <thead>
                    <tr>
                        <th class="no" scope="col">#</th>
                        <th scope="col">Blog Title</th>
                        <th class="action" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($blog as $dataBlog) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $dataBlog['blog_title'] ?></td>
                            <td class="action">
                                <a class="btn btn-sm btn-success" target="_blank" href="/<?= $dataBlog['slug'] ?>">View</a>
                                <a class="btn btn-sm btn-warning" href="/admin/blog/edit/<?= $dataBlog['blog_id'] ?>">Edit</a>
                                <form action="/admin/blog/delete" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $dataBlog['blog_id'] ?>">
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