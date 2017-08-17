<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Option extends AppModel {
    public $useTable = 'options';
    public $hasAndBelongsToMany = array(
        'Product' => array(
                'className' => 'Product',
                'joinTable' => 'product_options',
                'foreignKey' => 'option_id',
                'associationForeignKey' => 'product_id',
                'unique' => true
            )
        );
    
}
