<?php
    if(isset($invalid)){
?>
        <div class="invalid"><?=$invalid?></div>
<?php 
    }else{
?>

<div class="publsih_link">
    <span>
        <?php //echo $this->Html->link('Publish', '/books/pdf/'.$book_id); ?>
        <?php echo $this->Html->link('Publish', '/books/publish'); ?>
    </span>
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
        <span><input type="hidden" id="base_url" value="<?=$base_url?>" /></span>
<div class="page_content">
    <?php //var_dump($page_content); ?>
    <?php
        if($page_content['@id'] == 0 && $page_content['@editable'] == 0){
?>
    <div class="title" style="<?=$page_content['title']['@font']?>"><?=htmlentities($page_content['title']['@'])?></div>
            <div class="subtitle" style="<?=$page_content['subtitle']['@font']?>"><?=htmlentities($page_content['subtitle']['@'])?></div>
            <div class="author" style="<?=$page_content['author']['@font']?>"><?=htmlentities($page_content['author']['@'])?></div>
<?php    
        }elseif($page_content['@id'] == 1){
?>
            <div style="font-size: 24px; text-align: center;padding: 5px 0 15px 0;">Preface</div>
            <div>
                <p>The implementation of the Disability Discrimination Act, and its requirement that employers must make reasonable adjustments to enable disabled employees to attain to their full potential in the workplace, has made a major impact in recent years. Many employers now have a good understanding of the needs of a wide range of disabled people, and what they need to do to meet those needs.</p>
                <p>However, understanding of the needs of people on the autistic spectrum, including those with Asperger syndrome (AS), is far less widespread. The fact is that people on the spectrum are hard-wired to interact differently in social situations, and problems can arise if the people around them - purely through ignorance or unfamiliarity - react badly to their non-standard behaviours.</p>
                <p>Now, a short book has been written which helps to avoid this. The clear and simple illustrations show colleagues how the world can appear to the employee with AS, and demonstrate how small changes in approach can transform workplace relationships. The book gives colleagues a range of strategies to bridge the gap between the two perspectives; and in doing so, it will make the workplace a richer and more productive environment for everybody.</p>
                <table width="100%">
                    <tr>
                        <td align="left" valign="middle">
                            David Perkins <br/>
                            Director,<br/>
                            Prospects (London)
                        </td>
                        <td align="right" valign="top">
                            <img src="<?=$image_path?>img/preface.jpg" width="120"  />
                        </td>
                    </tr>
                </table>
            </div>
<?php          
        }elseif($page_content['@editable'] == 0){
    ?>
            <div class="noneditable"><?=html_entity_decode(htmlentities($page_content['section']['@']))?></div>
<?php
        }else{
            for($i=0; $i<count($page_content['section']); $i++){
                if($page_content['section'][$i]['@editable'] == '1' && $page_content['section'][$i]['@type'] == 'text'){ 
?>                    
                    <div class="book_section_text editable_text" id="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>"><?=html_entity_decode(htmlentities($page_content['section'][$i]['@']))?></div>
<?php                    
                }
                else if($page_content['section'][$i]['@editable'] == '1' && $page_content['section'][$i]['@type'] == 'image'){ 
?>                    
                    <div class="book_section_image editable_image">
                        <?php
                            //var_dump(isset($page_content['section'][$i]['text'][0]));
                            if(isset($page_content['section'][$i]['text'][0]) && count($page_content['section'][$i]['text']) > 0){
                                for($j = 0; $j < count($page_content['section'][$i]['text']); $j++){
                        ?>
                                    <span id="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>_<?=$page_content['section'][$i]['text'][$j]['@id']?>" class="image_text editable_text" style="<?=$page_content['section'][$i]['text'][$j]['@style']?>"><?=html_entity_decode(htmlentities($page_content['section'][$i]['text'][$j]['@']))?></span>
                        <?php
                                }
                            }else if(isset($page_content['section'][$i]['text'])){
                        ?>
                                    <span id="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>_<?=$page_content['section'][$i]['text']['@id']?>" class="image_text editable_text" style="<?=$page_content['section'][$i]['text']['@style']?>"><?=html_entity_decode(htmlentities($page_content['section'][$i]['text']['@']))?></span>
                        <?php         
                            }
                        ?>
                        <img class="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>" id="editable_image" src="<?=$image_path.$page_content['section'][$i]['path']?>" height="380"  />
                        <div id="btn_img_edit" >
                            <input type="button" name="img_edit" id="<?=$book_id?>_<?=$page_id?>_<?=$page_content['section'][$i]['@id']?>" value="Change Image" class="button" />
                        </div>
                    </div>
<?php                        
                }
                else if($page_content['section'][$i]['@type'] == 'text'){ 
?>
                    <div class="book_section_text"><?=html_entity_decode(htmlentities($page_content['section'][$i]['@']))?></div>
<?php                   
                }else if($page_content['section'][$i]['@type'] == 'image'){
?>    
                    <div class="book_section_image"> 
                        <img src="<?=$image_path.$page_content['section'][$i]['path']?>" height="380%"  />
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