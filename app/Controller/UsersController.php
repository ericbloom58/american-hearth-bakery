<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {



    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('admin_login', 'admin_logout');
    }

    public function admin_login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function admin_logout() {
        $this->Auth->logout();
        return $this->redirect('/admin');
    }

    public function admin_index($userId=null) {
        
        if(isset($userId) && $this->Auth->user('role') !== 'admin')
            exit('You are not authorized to view this page');
        
        if(!isset($userId))
            $userId = $this->Auth->user('id');
        
        if($this->Auth->user('role') === 'admin')
            $user = $this->User->find('all');
        else
            $user = $this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user('id'))));
        
        
      //  $user = $this->User->findById($userId);
        $this->set('users', $user);
//       pr($user);
        
//        $this->User->recursive = 0;
//        $this->set('users', $this->paginate());
       
       
       /*     
        if(isset($userId) && $this->Auth->user('role') !== 'admin')
        {
        $user = $this->User->findById($userId);
        $this->set('users', $user);
        pr($user);
        }
//            exit('You are not authorized to view this page');
        
        if(isset($userId) && $this->Auth->user('role') == 'admin')
        {
            $userId = $this->Auth->user('id');
            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
        }
        */
    }

    public function admin_view($id = null) {
        
        
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
        
    }

    public function admin_add() {
        if($this->Auth->user('role') !== 'admin')
        {
            $this->redirect('/admin');
            die();
        }
        //pr($this->Auth->user());
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        
		$this->User->id = $id;
		$user = $this->User->read();
		if ($this->User->delete($id)){
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash-error(__('The user could not be deleted, please try again'));
		}
		return $this->redirect(array('action' => 'index'));
    
       /* $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
        */
    }
    
    public function admin_favorites(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    public function forceLogout()
    {
        $this->Auth->logout();
        exit();
    }
    public function admin_view_favorites($userId = null){
        
        if(isset($userId) && $this->Auth->user('role') !== 'admin')
            exit('You are not authorized to view this page');
        
        if(!isset($userId))
            $userId = $this->Auth->user('id');
        
        $user = $this->User->findById($userId);
       // pr($user);
       
        
         $this->loadModel('Product');
        $this->loadModel('Flavor');
        $this->loadModel('Package');
        $this->loadModel('Option');
        
      
        foreach($user['Product'] as $index => $userProduct)
        {
            $user['Product'][$index]['ProductInfo'] = $this->Product->findById($userProduct['id']);
            
        }
        
        
          pr($user['Product']);
         $this->set('user', $user);
        //For Viewing of data
       
//        $this->set('products', $this->Flavor->find('list', array('fields' => array('id', 'name'))));
//        $this->set('flavors', $this->Flavor->find('list', array('fields' => array('id', 'name'))));
//        $this->set('packages', $this->Package->find('list', array('fields' => array('id', 'name'))));
//        $this->set('options', $this->Option->find('list', array('fields' => array('id', 'name'))));
    }
         
    //Adds and Edits Favorites
    public function admin_add_favorites($userId = null){
        
        
        if ($this->request->is('post')) {
            
            $error = false;
            $this->loadModel('UserProduct');
            if(!isset($userId))
                $userId = $this->Auth->user('id');
            foreach($this->request->data['Product'] as $product)
            {
                $this->UserProduct->create();
                
                if(!$this->UserProduct->save(array('product_id' => $product, 'user_id' => $userId)))
                        $error = true;
            }
             if (!$error) {
                $this->Session->setFlash("Favorites have been successfully added.", 'flash_success');
                return $this->redirect('/admin/users/favorites');
            }
            else {
                   $this->Session->setFlash("One or more errors occurred. Please try again.", 'flash_error');
            }
        }
        if(isset($userId))
            $this->set('userId', $userId);
        $this->loadModel('Product');
        $this->set('products', $this->Product->find('list', array('fields' => array('id', 'name'))));
        
    }
    
        public function admin_favorites_delete($userId = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        
//		$this->UserProduct->id = $id;
//		$user = $this->UserProduct->read();
//		if ($this->UserProduct->delete($id)){
//			$this->Flash->success(__('The user has been deleted.'));
//		} else {
//			$this->Flash-error(__('The user could not be deleted, please try again'));
//		}
//		return $this->redirect(array('action' => 'index'));
                
            $this->loadModel('UserProduct');
                if(!isset($userId))
                    $userId = $this->Auth->user('id');
                
                $user = $this->User->findById($userId);
                
                $this->set('user', $user);
                
                if ($this->User->delete($user['Product'])) {
                    $this->Flash->success(
                        __('The favorite has been deleted')
                    );
                } else {
                    $this->Flash->error(
                        __('The favorite could not be deleted.')
                    );
                }
        }
    
    /*
    public function admin_edit_favorites($userId = null){
        
        if ($this->request->is('post')) {
            
            $error = false;
            $this->loadModel('UserProduct');
            if(!isset($userId))
                $userId = $this->Auth->user('id');
            foreach($this->request->data['Product'] as $product)
            {
                $this->UserProduct->create();
                
                if(!$this->UserProduct->save(array('product_id' => $product, 'user_id' => $userId)))
                        $error = true;
            }
             if (!$error) {
                $this->Session->setFlash("Favorites have been successfully edited.", 'flash_success');
                return $this->redirect('/admin/users/favorites');
            }
            else {
                   $this->Session->setFlash("One or more errors occurred. Please try again.", 'flash_error');
            }
        }
        else{
            if (!$userId) {
                throw new NotFoundException(_('Invalid favorite'));
            }
        }
        
        $user = $this->User->findById($userId);
        $this->set('user', $user);
        //pr($user['Product']);
        
        if(isset($userId))
            $this->set('userId', $userId);
        $this->loadModel('Product');
        $this->set('products', $this->Product->find('list', array('fields' => array('id', 'name'))));
        
    } */
}