<section class="my-5 px-3" id="blogs">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-10">
            <h2><?= $title ?></h2>
        </div>
        <?php if($this->session->userdata('loggedin')) : ?>
            <div class="col-12 col-sm-2 col-md-2">
                <a href="<?php echo base_url(); ?>categories/create" class="btn btn-success btn-block">Add New Category</a>
            </div>
        <?php endif; ?>
    </div>
    <ul class="list-group">
        <?php foreach($categories as $category) : ?>
            <li class="list-group-item">
                <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
                <?php if($this->session->userdata('user_id') == $category['user_id']): ?>
                    <form action="categories/delete/<?php echo $category['id']; ?>" method="POST" class="delete-category">
                        <input type="submit" value="&times;" class="close delete-category">
                    </form>
                    <!-- <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->

                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>