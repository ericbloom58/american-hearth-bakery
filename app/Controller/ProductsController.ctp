<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// File: /app/Controller/ProductsController.php
class ProductsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
   
     public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
    }

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
            //Added this line
            
            if ($this->Product->save($this->request->data)) {
                $this->Flash->success(__('Your product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        
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
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
        throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is(array('product', 'put'))) {
            $this->Product->id = $id;
            if ($this->Product->save($this->request->data)) {
                $this->Flash->success(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your product.'));
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }
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
