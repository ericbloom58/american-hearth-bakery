<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

// File: /app/Controller/ProductsController.php
class ProductsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

     public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
    }
    
    //For Products page of the site.
    function index($id = null) {
            $this->loadModel('Category'); //loads Category's Model then using the if below sets the PR to sort via Category THEN Product
           if(!isset($id))
                $products = $this->Category->find('all', array('recursive' => 3, 'order' => 'Category.name ASC'));
            else
                $products = $this->Product->findById($id, array('recursive' => 2));
       
            $this->set('products', $products);
        
//          echo pr($products, true); exit();
    }
    // ^ should not currently be in use ^
        
    public function admin_index() {
        $this->set('products', $this->Product->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('product', $product);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $uploaddir = WWW_ROOT . 'files' . DS . 'uploads' . DS;
            
            // name of file on the server
            $uploadfile = $uploaddir . basename($this->request->data['Product']['image_url']['name']);
//            pr($uploadfile);
            if(move_uploaded_file($this->request->data['ProductImage']['url']['tmp_name'], $uploadfile))
                    $this->request->data['Product']['image_url'] = $uploadfile;
            else 
                unset($this->request->data['Product']['image_url']);
            
            if ($this->Product->saveAll($this->request->data)) {
                $this->Session->setFlash("New product successfully created.", 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
            }
        }
        
         $this->loadModel('Flavor');
        $this->loadModel('Package');
        $this->loadModel('Category');
        $this->loadModel('Option');
        $this->set('flavors', $this->Flavor->find('list', array('fields' => array('id', 'name'))));
        $this->set('packages', $this->Package->find('list', array('fields' => array('id', 'name'))));
        $this->set('categories', $this->Category->find('list', array('fields' => array('id', 'name'))));
        $this->set('options', $this->Option->find('list', array('fields' => array('id', 'name'))));
        
        $directories = glob('files/galleries/*' , GLOB_ONLYDIR);
        $galleries = array(null => '{none}');
        foreach($directories as $d)
        {
            $n = explode("/", $d);
            $name = end($n);
            $galleries[$name] = $name;
        }
        $this->set('galleries', $galleries);
    }   
    
    public function admin_edit($id = null) {

        if ($this->request->is('post')) {
           
            $uploaddir = WWW_ROOT . 'files' . DS . 'uploads' . DS;
            
            // name of file on the server
            $uploadfile = $uploaddir . basename($this->request->data['Product']['image_url']['name']);
          //  pr($uploadfile);
            if(move_uploaded_file($this->request->data['ProductImage']['url']['tmp_name'], $uploadfile))
                    $this->request->data['Product']['image_url'] = $uploadfile;
            else 
                unset($this->request->data['Product']['image_url']);
            
//             pr($this->request->data); 
//             pr($_FILES);
//            exit();
            if ($this->Product->saveAll($this->request->data)) {
                $this->Flash->success(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your product.'));
        }

       else {
             if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
        throw new NotFoundException(__('Invalid product'));
        }
            $this->request->data = $product;
        }
        
        
         $this->loadModel('Flavor');
        $this->loadModel('Package');
        $this->loadModel('Category');
        $this->loadModel('Option');
        $this->set('flavors', $this->Flavor->find('list', array('fields' => array('id', 'name'))));
        $this->set('packages', $this->Package->find('list', array('fields' => array('id', 'name'))));
        $this->set('categories', $this->Category->find('list', array('fields' => array('id', 'name'))));
        $this->set('options', $this->Option->find('list', array('fields' => array('id', 'name'))));
   }
   
   public function admin_delete($id) {
      
        if ($this->Product->delete($id)) {
            $this->Flash->success(
                __('The product with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The product with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
   }
   
   
   public function isAuthorized($user) {
        // All registered users can add products
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a product can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $productId = (int) $this->request->params['pass'][0];
            if ($this->Product->isOwnedBy($productId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}
