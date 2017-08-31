<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
   
    
    class QuantitysController extends AppController {

        public function beforeRender() {
            parent::beforeRender();
           
        }
    	
       public function admin_index()
       {
           $this->set('quantitys', $this->Quantity->find('all'));
          
       }
       
       public function admin_add()
       {
           if(!empty($this->request->data))
           {
               $this->Quantity->create();
               if($this->Quantity->save($this->request->data))
               {
                   $this->Session->setFlash("New quantity successfully created.", 'flash_success');
                   
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               $this->redirect('/admin/quantitys');
               
           }
       }
       public function admin_edit($id)
       {
           
           if(!empty($this->request->data))
           {
               $this->Quantity->id = $id;
               if($this->Quantity->save($this->request->data))
               {
                   $this->Session->setFlash("Quantity edited successfully.", 'flash_success');
                   $this->redirect('/admin/quantitys');
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               
               $this->redirect('/admin/quantitys');
           }
           $this->data = $this->Quantity->findById($id);
       }
       
       public function admin_delete($id)
       {
           
         if($this->Quantity->delete($id))
             $this->Session->setFlash('Quantity removed successfully.', 'flash_success');
         else {
             $this->Session->setFlash('An error occurred. Please try again.', 'flash_error');
         }
         
         $this->redirect('/admin/quantitys');
       }
        
        
        }