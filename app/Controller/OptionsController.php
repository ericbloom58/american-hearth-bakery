<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
   
    
    class OptionsController extends AppController {

        public function beforeRender() {
            parent::beforeRender();
           
        }
    	
       public function admin_index()
       {
           $this->set('options', $this->Option->find('all'));
          
       }
       
       public function admin_add()
       {
           if(!empty($this->request->data))
           {
               $this->Option->create();
               if($this->Option->save($this->request->data))
               {
                   $this->Session->setFlash("New option successfully created.", 'flash_success');
                   
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               $this->redirect('/admin/options');
               
           }
       }
       public function admin_edit($id)
       {
           
           if(!empty($this->request->data))
           {
               $this->Option->id = $id;
               if($this->Option->save($this->request->data))
               {
                   $this->Session->setFlash("Option edited successfully.", 'flash_success');
                   $this->redirect('/admin/options');
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               
               $this->redirect('/admin/options');
           }
           $this->data = $this->Option->findById($id);
       }
       
       public function admin_delete($id)
       {
           
         if($this->Option->delete($id))
             $this->Session->setFlash('Option removed successfully.', 'flash_success');
         else {
             $this->Session->setFlash('An error occurred. Please try again.', 'flash_error');
         }
         
         $this->redirect('/admin/options');
       }
        
        
        }