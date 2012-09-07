<div id="login" class="user_header">
    <i>Logged in as</i>&nbsp; <?php echo $this->Html->link($username, '/users/index'); ?>     
    &nbsp;|&nbsp;
    <?php echo $this->Html->link('Logout', '/users/logout'); ?>
</div>