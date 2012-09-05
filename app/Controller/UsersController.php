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


class UsersController extends AppController {
    public $name = 'Users';
    public $uses = array("User");
    
    var $helpers = array('Xml');
    
    public function signup(){
        if(!empty($this->data)){
            $data = $this->data;
            $data['User']['isActivated'] = 1;
            $data['User']['password'] = md5($data['User']['password']);
//            var_dump($data);
//            die();
            if($this->User->save($data)) {
                //$newdir = new Folder(ROOT.'/books/asper/'.$data['User']['username'].'/', true, 0755);
                $originaldir = new Folder(ROOT.'/books/asper/original', true, 0755);
                $originaldir->copy(ROOT.'/books/asper/'.$data['User']['username'].'/');
                
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

        //App::import('Xml'); 
        //App::import('Xml');
        $file = ROOT."/books/asper/".$username."/asper.xml"; 
        $parsed_xml =& new XML($file); 
        $parsed_xml = Set::reverse($parsed_xml);
        debug($parsed_xml);
        
        //var_dump($parsed_xml);
        //die();
    }
}

?>
