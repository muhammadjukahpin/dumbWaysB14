<!-- Main Content -->
<div class="container">
    <h1 class="mt-5"><?= $title; ?></h1>

    <!-- Flash Message -->
    <div class="row">
        <div class="col-5">
            <div class="text-danger"><?= $this->session->flashdata('message') ?></div>
        </div>
    </div>
    <!-- end Flash Message -->

    <!-- Form Add Book -->
    <div class="row">
        <div class="col-7">
            <?php echo form_open_multipart(); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
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
                <input type="number" class="form-control" name="publication_year" id="publication_year">
                <small class="text-danger"><?php echo form_error('publication_year'); ?></small>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img">
                <small class="text-danger"><?php echo $this->session->flashdata('message'); ?></small>
            </div>
            <a href="<?= base_url(); ?>" class="btn btn-primary">Back</a>
            <button type="submit" name="submit" class="btn btn-primary float-right">Add Book</button>
            </form>
        </div>
    </div>
    <!-- end Form Add Book -->

</div>
<!-- end Main Content -->