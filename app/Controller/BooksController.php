<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BooksController
 *
 * @author Manash
 */
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Xml', 'Utility');


class BooksController extends AppController {
    public $name = 'Books';
    public $uses = array(Book);

    
    public function index($book_id='', $page=''){       
        //var_dump(WWW_ROOT);die();
        if(!$this->Session->check('username')){
            $this->redirect('/users');
            die();
        }
        
        $username = $this->Session->read('username');
        
        if($book_id!='' || $book_id > 0){  
            $book = $this->Book->find('first', array('conditions' => array('Book.id' => $book_id)));
         
            $file = WWW_ROOT."files/books/".$book['Book']['name']."/".$username."/".$book['Book']['name'].".xml";        
            $xmlArray = Xml::toArray(Xml::build($file));
//            var_dump($xmlArray);
//            die();
            
            $this->set('total_pages', count($xmlArray['book']['page']));
            
            if($page == '' || $page == 0){
                $page_content = $xmlArray['book']['page'][0];
                $page_id = 0;
            }else{
                $page_content = $xmlArray['book']['page'][$page];
                $page_id = $page;
            }
            //var_dump($page_content);
            $this->set('page_content', $page_content);
            $this->set('book_id', $book_id);
            $this->set('page_id', $page_id);
            $this->set('base_url',Configure::read('base_url'));
            $this->set('image_path',Configure::read('base_url')."/app/webroot/files/books/".$book['Book']['name']."/".$username."/");

        }else{
            $this->set('invalid','Book does not exist');
        }
    }
    public function edit(){    
        $this->layout = '';
        
        $value = $_POST['value'];
        $id_array = explode('_',$_POST['id']);
        $book_id = (int)$id_array[0];
        $page_id = (int)$id_array[1];
        $section_id = (int)$id_array[2];
        
        $image_text_id = '';
        if($id_array[3]){ $image_text_id = (int)$id_array[3]; }
        
        $book = $this->Book->find('first', array('conditions' => array('Book.id' => $book_id)));
        $username = $this->Session->read('username');
        $xmlpath = Configure::read('base_url')."/app/webroot/files/books/".$book['Book']['name']."/".$username."/".$book['Book']['name'].".xml";
        
        
        $xml2 = simplexml_load_file($xmlpath, 'SimpleXMLElement', LIBXML_NOCDATA);
        //$xml = new SimpleXMLElement($xml2->asXML());
//        var_dump($xml2); 
//        die();
        //var_dump($xml->page[$page_id]->section[$section_id-1]); 
        //die();
        if($image_text_id != ''){
            $xml2->page[$page_id]->section[$section_id-1]->text[$image_text_id-1] = html_entity_decode($value);
        }else{
            $xml2->page[$page_id]->section[$section_id-1] = html_entity_decode($value);
        }
        $xml2->asXML(WWW_ROOT."files/books/".$book['Book']['name']."/".$username."/".$book['Book']['name'].".xml");
               
        $this->set('value', $value);
    }
    
    public function pdf($book_id = ''){
        $username = $this->Session->read('username');
        
        $book = $this->Book->find('first', array('conditions' => array('Book.id' => (int)$book_id)));
        
        $file = WWW_ROOT."files/books/".$book['Book']['name']."/".$username."/".$book['Book']['name'].".xml";    
        $xmlArray = Xml::toArray(Xml::build($file));
        $this->set('pages', $xmlArray['book']['page']);
//        var_dump($xmlArray['book']['page']);
//        die();
        
        $this->set('image_path',"../../app/webroot/files/books/".$book['Book']['name']."/".$username."/");
        $this->layout = 'pdf';
        $this->render(); 
    }
    
    public function publish(){
        //var_dump(phpinfo()); die();
        $this->layout = '';
        App::import('Vendor','lulu/lulu');  
        
        $lulu = new lulu();
        $result = $lulu->authentication();
        
        var_dump(json_decode($result, true));
        die();
    }
}

?>
