<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Category extends AppModel {
    public $useTable = 'categories';
    public $hasAndBelongsToMany = array(
        'Product' => array(
                'className' => 'Product',
                'joinTable' => 'product_categories',
                'foreignKey' => 'category_id',
                'associationForeignKey' => 'product_id',
                'unique' => true
            )
        );
    
}
