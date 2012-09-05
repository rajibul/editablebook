<?php 
    if(isset($invalid)){
?>
        <div class="invalid"><?=$invalid?></div>
<?php 
    }else{
?>

<div class="book_pagination">
    <?php
        for($i=0; $i<$total_pages; $i++){
    ?>
            <?php echo $this->Html->link($i, '/books/index/'.$book_id.'/'.$i); ?>
    <?php
        }
    ?>
</div>
        <span><input type="hidden" id="base_url" value="<?=$base_url?>" /></span>
<div class="page_content">
    <?php //var_dump($page_content); ?>
    <?php
        if($page_content['@id'] == 0 && $page_content['@editable'] == 0){
?>
            <div class="title" style="<?=$page_content['title']['@font']?>"><?=$page_content['title']['@']?></div>
            <div class="subtitle" style="<?=$page_content['subtitle']['@font']?>"><?=$page_content['subtitle']['@']?></div>
            <div class="author" style="<?=$page_content['author']['@font']?>"><?=$page_content['author']['@']?></div>
<?php    
        }elseif($page_content['@editable'] == 0){
    ?>
            <div class="noneditable"><?=$page_content['section']['@']?></div>
<?php
        }else{
            for($i=0; $i<count($page_content['section']); $i++){
                if($page_content['section'][$i]['@editable'] == '1' && $page_content['section'][$i]['@type'] == 'text'){ 
?>                    
                    <div class="book_section_text editable_text" id="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>"><?=$page_content['section'][$i]['@']?></div>
<?php                    
                }
                else if($page_content['section'][$i]['@editable'] == '1' && $page_content['section'][$i]['@type'] == 'image'){ 
?>                    
                    <div class="book_section_image editable_image">
                        <img class="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>" id="editable_image" src="<?=$image_path.$page_content['section'][$i]['@']?>" width="65%"  />
                    </div>
<?php                        
                }
                else if($page_content['section'][$i]['@type'] == 'text'){ 
?>
                    <div class="book_section_text"><?=$page_content['section'][$i]['@']?></div>
<?php                   
                }else if($page_content['section'][$i]['@type'] == 'image'){
?>    
                    <div class="book_section_image">
                        <?php echo $this->Html->image($image_path.$page_content['section'][$i]['@'])?> 
                    </div>
<?php
                }
?>
            
<?php
            }
        }
?>
</div>

<div class="book_pagination">
    <?php
        for($i=0; $i<$total_pages; $i++){
    ?>
            <?php echo $this->Html->link($i, '/books/index/'.$book_id.'/'.$i); ?>
    <?php
        }
    ?>
</div>
<?php    
    }
?>