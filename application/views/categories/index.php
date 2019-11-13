<section class="my-5 px-3" id="blogs">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-10">
            <h2><?= $title ?></h2>
        </div>
        <div class="col-12 col-sm-2 col-md-2">
            <a href="<?php echo base_url(); ?>categories/create" class="btn btn-success btn-block">Add New Category</a>
        </div>
    </div>
    <ul class="list-group">
        <?php foreach($categories as $category) : ?>
            <li class="list-group-item">
                <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>