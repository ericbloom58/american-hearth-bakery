<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrdersController
 *
 * @author Eric
 */
class OrdersController extends AppController{
    //put your code here
    
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
