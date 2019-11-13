<section class="my-5 px-3" id="blogs">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-10">
            <h2><?= $title ?></h2>
        </div>
        <div class="col-12 col-sm-2 col-md-2">
            <a href="<?php echo base_url(); ?>posts/create" class="btn btn-success btn-block">Add New Post</a>
        </div>
    </div>
    <?php foreach($posts as $post) : ?>
        <div class="row my-3 p-3">
            <div class="col-12 col-sm-3 col-md-3 card">
                <figure class="m-2">
                    <img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="<?php $post['post_image']; ?>" class="img-responsive" width="100%">
                </figure>
            </div>
            <div class="col-12 col-sm-9 col-md-9 card">
                <div class="row py-3">
                    <div class="col-12 col-sm-10 col-md-10">
                        <a href="<?php echo site_url('/posts/'.$post['slug']); ?>">
                            <h3><?php echo $post['title']; ?></h3>
                        </a>
                    </div>
                    <div class="col-12 col-sm-2 col-md-2">
                        <?php echo form_open('posts/delete/'.$post['id']); ?>
                            <div class="form-group">
                                <input type="submit" value="Delete" class="form-control btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
                <p><?php echo word_limiter($post['body'], 75); ?></p>
                <small class="post-date px-3">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?> Category</strong></small></br>
            </div>
        </div>
    <?php endforeach; ?>
</section>