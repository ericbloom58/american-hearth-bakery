<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Product extends AppModel {
    public $useTable = 'products';
    
    public $hasAndBelongsToMany = array(
        'Category' => array(
                'className' => 'Category',
                'joinTable' => 'product_categories',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'category_id',
                'unique' => true
            ),
        'Package' => array(
                'className' => 'Package',
                'joinTable' => 'product_packages',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'package_id',
                'unique' => true
            ),
        'Flavor' => array(
                'className' => 'Flavor',
                'joinTable' => 'product_flavors',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'flavor_id',
                'unique' => true
            ),
        'Option' => array(
                'className' => 'Option',
                'joinTable' => 'product_options',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'option_id',
                'unique' => true
            ),
        'Quantity' => array(
                'className' => 'Quantity',
                'joinTable' => 'product_quantitys',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'quantity_id',
                'unique' => true
            )
//        'User' => array(
//                'className' => 'User',
//                'joinTable' => 'user_products',
//                'foreignKey' => 'product_id',
//                'associationForeignKey' => 'user_id',
//                'unique' => true
//            )
    );
    public $hasMany = array(
        'ProductSpecialOption'
    );
}
