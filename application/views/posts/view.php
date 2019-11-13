<section class="my-5 blog">
    <h2><?php echo $post['title']; ?></h2>
    <div class="post-body">
        <img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
        <p><?php echo $post['body']; ?></p>
        <small class="post-date px-3">Posted on: <?php echo $post['created_at']; ?></small>
    </div>
    <div class="row my-5">
        <div class="col-12 col-sm-4 col-md-2">
            <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-warning btn-block">Edit</a>
        </div>
        <div class="col-12 col-sm-4 col-md-2">
            <?php echo form_open('posts/delete/'.$post['id']); ?>
                <div class="form-group">
                    <input type="submit" value="Delete" class="form-control btn btn-danger">
                </div>
            </form>
        </div>
    </div>    
</section>