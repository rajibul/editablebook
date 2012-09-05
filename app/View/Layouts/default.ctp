<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
                echo $this->Html->css('book');
                
                echo $this->Html->script('jquery-1.8.0');
                echo $this->Html->script('jquery.jeditable');
                echo $this->Html->script('editimage');
                echo $this->Html->script('common');
		
	?>
</head>
<body>
<div id="wrapper">

<div id="header">
<span class="pagetitle">ChangeableBooks</span>
<span class="strapline">Customise and Print Online Books and Documents</span>
</div>

<hr/>

<div id="login">    
    <?php echo $this->Html->link('Signup', '/users/signup'); ?>
    &nbsp;|&nbsp;
    <a href="index.php?forgotpw=1">Forgot password</a> &nbsp;|&nbsp; 
    <?php echo $this->Form->create(null, array('url' => '/users/login', 'type' => 'post')); ?>
    Username: <input name="data[User][username]" class="txt_username" type="text" value=""> &nbsp;
    Password: <input name="data[User][password]" class="txt_password" type="password" value=""> &nbsp;
    Remember me: <input name="auto" type="checkbox"> &nbsp; 
    <input value="Login" class="btn_login" type="submit" />
    <?php echo $this->Form->end(); ?>
</div>

<div class="flash flash_success">
    <?php if(isset($message)){ echo $message; } ?>
</div>

<div id="content">    
    <?php echo $this->fetch('content'); ?>
</div>
<div id="footer">
<a href="index.php">Home</a> &nbsp;|&nbsp; 
<a href="index.php?q=about">About</a> &nbsp;|&nbsp; 
<a href="index.php?q=contact">Contact</a> &nbsp;|&nbsp;
<a href="index.php?q=help">Help / FAQ</a> &nbsp;|&nbsp;
<a href="index.php?q=privacy">Privacy Policy</a> &nbsp;|&nbsp;
<a href="index.php?q=tos">Terms of Service</a> &nbsp;|&nbsp;
<a href="index.php?q=tou">Terms of Use</a> 
</div>

</div>
    
</body>
</html>
