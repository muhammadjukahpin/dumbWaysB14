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

    <!-- Form Edit Book -->
    <div class="row">
        <div class="col-7">
            <?php echo form_open_multipart(); ?>
            <input type="hidden" name="id" id="id" value="<?= $book['id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $book['name']; ?>">
                <small class="text-danger"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">--Choose--</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger"><?php echo form_error('category_id'); ?></small>
            </div>
            <div class="form-group">
                <label for="writer_id">Writer</label>
                <select class="form-control" name="writer_id" id="writer_id">
                    <option value="">--Choose--</option>
                    <?php foreach ($writers as $writer) : ?>
                        <option value="<?= $writer['id']; ?>"><?= $writer['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger"><?php echo form_error('writer_id'); ?></small>
            </div>
            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="number" class="form-control" name="publication_year" id="publication_year" value="<?= $book['publication_year']; ?>">
                <small class="text-danger"><?php echo form_error('publication_year'); ?></small>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img" value="<?= $book['img']; ?>">
                <small class="text-danger"><?php echo $this->session->flashdata('message'); ?></small>
            </div>
            <a href="<?= base_url('book/detail/') . $book['id']; ?>" class="btn btn-primary">Back</a>
            <button type="submit" name="submit" class="btn btn-primary float-right">Edit Book</button>
            </form>
        </div>
    </div>
    <!-- end Form Edit Book -->

</div>
<!-- end Main Content -->