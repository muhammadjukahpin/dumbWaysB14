<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-5"><?= $title; ?></h3>
        </div>
    </div>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="row">
            <div class="col-5">
                <div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
            </div>
        </div>
    <?php endif; ?>
    <!-- end Flash Message -->

    <!-- Button Edit and Delete -->
    <div class="row mb-2">
        <div class="col">
            <li class="float-right mr-5 nav-link">
                <a href="<?= base_url('book/deleteBook/') . $this->uri->segment(3); ?>" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger text-decoration-none">Delete</a>
                <a href="<?= base_url('book/editBook/') . $this->uri->segment(3); ?>" data-id="<?= $this->uri->segment(3); ?>" class="btn-sm btn-success text-decoration-none" id="edit">Edit</a>
            </li>
        </div>
    </div>
    <!-- end Button Edit and Delete -->

    <!-- Card -->
    <div class="card mb-3" style="max-width: 1040px;">
        <div class="row no-gutters mt-2">
            <div class="col-md-4">
                <img src="<?= base_url('asset/img/') . $book['img']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $book['name']; ?></h5>
                    <ul class="list-group">
                        <li class="list-group-item">Writer : <?= $writer['name']; ?></li>
                        <li class="list-group-item">Category : <?= $category['name']; ?></li>
                        <li class="list-group-item">Publication Year : <?= $book['publication_year']; ?></li>
                    </ul>
                    <p class="mt-3"><a href="<?= base_url(); ?>" class="btn-sm btn-primary text-decoration-none">Back</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end Card -->

</div>
<!-- Main Content -->