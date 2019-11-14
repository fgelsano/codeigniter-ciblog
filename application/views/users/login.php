<section class="my-5 blog">
    <?php echo form_open('users/login') ?>
        <div class="row">
            <div class="col-12 col-sm-4 offset-sm-4 col-md-4 offset-md-4 card px-5 py-3">
                <h3 class="mb-3 text-center"><?= $title ?></h3>
                <?php if($this->session->flashdata('login_failed')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('login_failed'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <input type="text" name="username" id="" class="form-control" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-success form-control">
                </div>
                <?php if($this->session->flashdata('user_loggedout')) : ?>
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('user_loggedout'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>
</section>