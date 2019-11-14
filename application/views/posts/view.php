<section class="my-5 blog">
    <h2><?php echo $post['title']; ?></h2>
    <div class="post-body">
        <img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
        <p><?php echo $post['body']; ?></p>
        <small class="post-date px-3">Posted on: <?php echo $post['created_at']; ?></small>
    </div>
    <!-- Check if logged in -->
    <?php if($this->session->userdata('loggedin')) : ?>
        <!-- <?php 
            print_r($this->session->userdata('user_id'));
            echo $post['user_id'];
        ?> -->
        <?php if($this->session->userdata('user_id') == $post['user_id']): ?>
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
        <?php endif; ?>
    <?php endif; ?>

    <div class="row mt-5">
        <div class="col-12 col-sm-12 col-md-12">
            <h3>Comments:</h3>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <?php if($comments): ?>
                <?php foreach($comments as $comment): ?>
                    <div class="card p-3 my-3">
                        <?php echo $comment['body']; ?>
                        <small>By: <strong><?php echo $comment['name']; ?></strong></small>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="alert alert-info">
                    No comments yet.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h3>Add a Comment</h3>
            <?php if(validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h3 class="mb-3">Error: </h3> 
                <?php echo validation_errors(); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif ?>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <?php echo form_open('comments/create/'.$post['id']); ?>
                <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="Email" name="email" id="" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="name">Comment</label>
                    <textarea name="body" id="editor" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Post Comment" class="form-control btn btn-success">
                </div>
            </form>
        </div>
    </div>
</section>