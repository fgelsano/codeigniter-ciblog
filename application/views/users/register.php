<section class="my-5 blog">
    <div class="row">
        <div class="col-12 col-sm-4 offset-sm-4 col-md-4 offset-md-4 card px-5 py-3">
            <h2><?= $title ?></h2>
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?> 
            <?php echo form_open('users/register'); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" name="zipcode" id="" class="form-control" placeholder="Zip Code">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Register User" class="form-control btn btn-success">
                </div>
            </form>
        </div>
    </div>
</section>