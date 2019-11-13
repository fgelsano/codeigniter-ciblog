<section class="my-5 blog">
    <h2><?= $title; ?></h2>

    <?php
        echo validation_errors();
    ?>
    <?php echo form_open('posts/update'); ?>
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Add Title" value="<?php echo $post['title']; ?>">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" id="editor" cols="30" rows="10" class="form-control" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
        </div>
        <div class="form-row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        <option value="" selected disabled>Categories</option>
                        <?php foreach($categories as $category) : ?>
                            <?php if($category['id'] === $post['category_id']) { ?>
                                <option value="<?php echo $category['id']; ?>" selected><?php echo $category['name']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="submit" value="Update Post" class="form-control btn btn-success">
                </div>
            </div>
        </div>
        
    </form>
</section>