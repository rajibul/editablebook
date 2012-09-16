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
                echo $this->Html->script('jquery.ocupload-1.1.2');
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

<?php
    if($this->Session->check('username')){
        echo $this->element('user_header',array('username' => $this->Session->read('username')));
    }else{
        echo $this->element('login_panel');
    }
?>
<?php //echo $this->element('login_panel'); ?> 

<div class="flash flash_success">
    <?php if(isset($message)){ echo $message; } ?>
</div>

<div id="content">    
    <?php echo $this->fetch('content'); ?>
</div>
<div id="footer">
    <?php echo $this->element('footer'); ?> 
</div>

</div>
    
</body>
</html>
