<section class="my-5 blog">
    <h2><?= $title; ?></h2>

    <?php
        echo validation_errors();
    ?>
    <?php echo form_open_multipart('posts/create'); ?>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Add Title">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" id="editor" cols="30" rows="10" class="form-control" placeholder="Add Body"></textarea>
        </div>
        <div class="form-row">
            <div class="col-12 col-sm-3 col-md-3">
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        <option value="" selected disabled>Categories</option>
                        <?php foreach($categories as $category) : ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-5 col-md-5">
                <input type="file" name="userfile" id="post-image" class="form-control">
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <input type="submit" value="Create Post" class="form-control btn btn-success">
                </div>
            </div>
        </div>
    </form>
</section>