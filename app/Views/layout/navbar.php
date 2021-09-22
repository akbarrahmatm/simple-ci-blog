<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-2">
    <div class="container">
        <a class="navbar-brand" href="/">ARM Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-end ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($category as $dataCategory) : ?>
                            <li><a class="dropdown-item" href="/category/<?= $dataCategory['category_id'] ?>"><?= $dataCategory['category'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>