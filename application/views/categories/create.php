<section class="my-5 blog">
    <h2><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('categories/create'); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <input type="submit" value="Save New Category" class="btn btn-success">
        </div>
    </form>
</section>