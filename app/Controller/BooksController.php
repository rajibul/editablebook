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
        $value = $_POST['value'];
        $id_array = explode('_',$_POST['id']);
        $book_id = $id_array[0];
        $page_id = $id_array[1];
        $section_id = $id_array[2];
        
        var_dump($id_array); die();
    }
}

?>
