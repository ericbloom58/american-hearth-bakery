<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class _Order extends AppModel {
    public $useTable = false;
    /* when passing values make the id what it is not the name what it is*/
    
    function remove($id)
    {
        $order = CakeSession::read('Order');
        unset($order[$id]);
        CakeSession::write('Order', $order);
    }
    function add($Product)
    {
        /*CakeSession::check(write('Order',$Product);*/
        if(
                CakeSession::check('Order')
                )
            $Order = CakeSession::read('Order');
        else
                $Order = array();
        $inOrder = -1;
        foreach($Order as $i => $item){
            if(
                    $Product['id'] == $item['id'] &&
                    $Product['Category'] == $item['Category'] &&
                    $Product['Package'] == $item['Package'] &&
                    $Product['Flavor'] == $item['Flavor'] &&
                    $Product['Option'] == $item['Option']
                    )
            {
                $inOrder = $i;
            }
        }
            if($inOrder >= 0)
            {
                $Order[$i]['quantity'] += $Product['quantity'];
            }
            else{
                $Order[] = $Product;
            }
          
            CakeSession::write('Order',$Order);
            return(true);
    }
    public function emptyOrder()
    {
        CakeSession::write('Order', array());   
    }

    public function showOrder() {
	return CakeSession::read('Order');
	}

}
