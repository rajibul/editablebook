<p>
<?php echo $user."'s Home page"; ?>
</p>

<br />

Book List: <br /><br />
<?php
    
    if(count($books) > 0){
        for($i=0; $i<count($books); $i++){
?>
            <?=$i+1?>. <?php echo $this->Html->link($books[0]['Book']['name'], '/books/index/'.$books[0]['Book']['id']); ?>
<?php
        }
    }

?>
