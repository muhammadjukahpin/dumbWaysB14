<!-- Main Content -->
<div class="container">
    <h1 class="mt-5"><?= $title; ?></h1>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="row">
            <div class="col-5">
                <div class="alert alert-danger"><?= $this->session->flashdata('message') ?></div>
            </div>
        </div>
    <?php endif; ?>
    <!-- end Flash Message -->

    <!-- Form Add Category -->
    <div class="row">
        <div class="col-7">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name Category</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <a href="<?= base_url(); ?>" class="btn btn-primary">Back</a>
                <button type="submit" name="submit" class="btn btn-primary float-right">Add Category</button>
            </form>
        </div>
    </div>
    <!-- end Form Add Category -->


</div>
<!-- end Main Content -->