<div style="width: 500px">
<?php echo $this->Form->create('Pages', array('type' => 'post')); ?>
    <table width="50%" height="50%">
        <tr>
            <td>Username :</td>
            <td><input type="text" name="data[Pages][username]" value="" /></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="data[Pages][password]" value="" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="data[Pages][sbadminform]" value="Login" /></td>
        </tr>
    </table>
<?php echo $this->Form->end(); ?>
</div>