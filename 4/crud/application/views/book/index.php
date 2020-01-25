<!-- Main Content -->
<div class="container">
    <h1 class="mt-5"><?= $title; ?></h1>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="row">
            <div class="col-5">
                <div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
            </div>
        </div>
    <?php endif; ?>
    <!-- end Flash Message -->

    <!-- Button Add -->
    <div class="row mb-2">
        <div class="col">
            <nav class="nav float-right">
                <a href="<?= base_url('book/addBook'); ?>" class="nav-link btn-sm btn-primary text-decoration-none m-2">Add Book</a>
                <a href="<?= base_url('book/addCategory'); ?>" class="nav-link btn-sm btn-primary text-decoration-none m-2">Add Category</a>
                <a href="<?= base_url('book/addWriter'); ?>" class="nav-link btn-sm btn-primary text-decoration-none m-2">Add Writer</a>
            </nav>
        </div>
    </div>
    <!-- end Button Add -->

    <!-- Card -->
    <div class="row">
        <?php foreach ($books as $book) : ?>
            <div class="col-md-3">
                <div class="card text-center" style="width: 13rem;">
                    <img src="<?= base_url('asset/img/') . $book['img']; ?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['name']; ?></h5>
                        <a href="<?= base_url('book/detail/') . $book['id']; ?>" class="btn-sm btn-primary text-decoration-none">View Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- end Card -->


</div>
<!-- end Main Content -->