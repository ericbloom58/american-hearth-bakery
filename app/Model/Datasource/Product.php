<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Product extends AppModel {
    public $useTable = 'Products';
    
    /*
    public $hasMany = array('ProductImage');
    public $hasAndBelongsToMany = array(
        'MaterialType' =>
            array(
                'className' => 'MaterialType',
                'joinTable' => 'product_material_types',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'material_type_id',
                'unique' => true
            ),
        'MaterialColor' =>
            array(
                'className' => 'MaterialColor',
                'joinTable' => 'product_material_colors',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'material_color_id',
                'unique' => true,
                'order' => 'MaterialColor.name ASC'
            ),
        'CustomEffect' =>
            array(
                'className' => 'CustomEffect',
                'joinTable' => 'product_custom_effects',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'custom_effect_id',
                'unique' => true
            ),
        'SoleType' =>
            array(
                'className' => 'SoleType',
                'joinTable' => 'product_sole_types',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'sole_type_id',
                'unique' => true
            ),
        'ToeEffect' =>
            array(
                'className' => 'SoleType',
                'joinTable' => 'product_toe_effects',
                'foreignKey' => 'product_id',
                'associationForeignKey' => 'toe_effect_id',
                'unique' => true
            )
    );
    */
    
}
