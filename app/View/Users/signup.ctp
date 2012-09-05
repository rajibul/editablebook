<div>
<?php echo $this->Form->create('Users', array('type' => 'post')); ?>
    <table width="50%" height="50%">
        <tr>
            <td>Username :</td>
            <td><input type="text" name="data[User][username]" id="UserUsername" value="" /></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="data[User][password]" id="UserPassword" value="" /></td>
        </tr>
        <tr>
            <td>Re-type Password :</td>
            <td><input type="password" name="data[User][repassword]" id="UserRepassword" value="" /></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="email" name="data[User][email]" id="UserEmail" value="" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="data[User][sbsignupform]" value="Signup" /></td>
        </tr>
    </table>
<?php echo $this->Form->end(); ?>
</div>