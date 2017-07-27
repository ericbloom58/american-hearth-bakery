<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Package extends AppModel {
    public $useTable = 'packages';
    public $hasAndBelongsToMany = array(
        'Product' => array(
                'className' => 'Product',
                'joinTable' => 'product_packages',
                'foreignKey' => 'package_id',
                'associationForeignKey' => 'product_id',
                'unique' => true
            )
        );
    
}
