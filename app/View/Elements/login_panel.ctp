<div id="login">    
    <?php echo $this->Form->create(null, array('url' => '/users/login', 'type' => 'post')); ?>
    <?php echo $this->Html->link('Signup', '/users/signup'); ?>
    &nbsp;|&nbsp;
    <a href="#">Forgot password</a> &nbsp;|&nbsp;     
    Username: <input name="data[User][username]" class="txt_username" type="text" value=""> &nbsp;
    Password: <input name="data[User][password]" class="txt_password" type="password" value=""> &nbsp;
<!--    Remember me: <input name="auto" type="checkbox"> &nbsp; -->
    <input value="Login" class="btn_login" type="submit" />
    <?php echo $this->Form->end(); ?>
</div>