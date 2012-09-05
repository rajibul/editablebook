<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Manash
 */
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('Xml', 'Utility');


class UsersController extends AppController {
    public $name = 'Users';
    public $uses = array(User,Book);

    
    public function signup(){
        if(!empty($this->data)){
            $data = $this->data;
            $data['User']['isActivated'] = 1;
            $data['User']['password'] = md5($data['User']['password']);
//            var_dump($data);
//            die();
            if($this->User->save($data)) {
                //$newdir = new Folder(ROOT.'/books/asper/'.$data['User']['username'].'/', true, 0755);
                $originaldir = new Folder(WWW_ROOT.'files/books/asper/original', true, 0755);
                $originaldir->copy(WWW_ROOT.'files/books/asper/'.$data['User']['username'].'/');
                
                $this->Session->write('username', $data['User']['username']);
                
                $this->Session->setFlash("User Saved!");
                $this->redirect('/users');
            }            
        }
        $this->set('title_for_layout', 'User Signup');

        $this->render("signup");
    }
    
    public function login(){
        if(!empty ($this->data)){
            $user = $this->User->find('first', array('conditions' => array('User.username' => $this->data['User']['username'], 'User.password' => md5($this->data['User']['password']))));
//            var_dump($user['User']['id']);
//            die();
            if(empty($user)){
                $this->Session->setFlash("Login Error. Check your username and password");
                $this->redirect('/pages');
                die();
            }else{
                $this->Session->write('username', $user['User']['username']);
                $this->Session->write('userid', $user['User']['id']);
                $this->redirect('/users');
                die();
            }
            
        }
    }
    
    public function index(){        
        if(!$this->Session->check('username')){
            $this->redirect('/users');
            die();
        }
        
        $username = $this->Session->read('username');
        
        $books = $this->Book->find('all');
        //var_dump($books); die();
        
        $this->set('user', $username);
        $this->set('books', $books);
    }
}

?>
