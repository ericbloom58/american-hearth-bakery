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
       // $this->Auth->allow('creator');
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
    
        function creator($id = null) {
            if(!empty($this->request->data))
            {
                $orders = $this->request->data['Order'];
                foreach($orders as $i => $product):
                    foreach($product as $j => $flavor):
                        if(empty($flavor['quantity']))
                            unset($orders[$i][$j]);
                    endforeach;
                    if(empty($orders[$i]))
                        unset($orders[$i]);
                endforeach;
                $this->loadModel('Order');
                $this->Order->create();
                $o = serialize($orders);
                $newOrder = array('data' => $o, 'user_id' => $this->Auth->user('id'));
              
                if($this->Order->save($newOrder)) {
                $this->Session->setFlash('Your order has been saved!');
                }
                else
                {
                     $this->Session->setFlash('A saving error occurred!');
                   
                }
            }
            $this->loadModel('Category'); //loads Category's Model then using the if below sets the PR to sort via Category THEN Product
           if(!isset($id))
                $products = $this->Category->find('all', array('recursive' => 3, 'order' => 'Category.name ASC'));
            else
                $products = $this->Product->findById($id, array('recursive' => 2));
       
            $this->set('products', $products);
        
//          echo pr($products, true); exit();
    }
    
    
    public function view($id) {
        $order = $this->Order->findById($id);
        //$this->loadModel('Product');
        $this->loadModel('Flavor');
        $this->loadModel('Option');
        $prettyOrder = array();
        $orderInfo = unserialize($order['Order']['data']);
        foreach($orderInfo as $productId => $productData):
            $prettyOrder[$productId] = array('Flavors' => array());
            foreach($productData as $flavorId => $data):
                $prettyOrder[$productId]['Flavors'][$flavorId] = array('Flavor' => array(), 'data' => array());
                $prettyOrder[$productId]['Flavors'][$flavorId]['Flavor'] = $this->Flavor->findById($flavorId);
                $prettyOrder[$productId]['Flavors'][$flavorId]['data']['quantity'] = $data['quantity'];
                
                // break down the options if they exist, add add to data
                if(isset($data['options']))
                {
                    foreach($data['options'] as $option)
                    {
                        // this is where you're doing that.
                    }
                }
                
                
                
            endforeach;
        endforeach;
        $this->set('order', $prettyOrder);
        pr($prettyOrder);
         exit();
        
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