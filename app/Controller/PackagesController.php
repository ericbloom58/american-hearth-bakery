<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
   
    
    class PackagesController extends AppController {

        public function beforeRender() {
            parent::beforeRender();
           
        }
    	
       public function admin_index()
       {
           $this->set('packages', $this->Package->find('all'));
          
       }
       
       public function admin_add()
       {
           if(!empty($this->request->data))
           {
               $this->Package->create();
               if($this->Package->save($this->request->data))
               {
                   $this->Session->setFlash("New package successfully created.", 'flash_success');
                   
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               $this->redirect('/admin/packages');
               
           }
       }
       public function admin_edit($id)
       {
           
           if(!empty($this->request->data))
           {
               $this->Package->id = $id;
               if($this->Package->save($this->request->data))
               {
                   $this->Session->setFlash("Package edited successfully.", 'flash_success');
                   $this->redirect('/admin/packages');
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               
               $this->redirect('/admin/packages');
           }
           $this->data = $this->Package->findById($id);
       }
       
       public function admin_delete($id)
       {
           
         if($this->Package->delete($id))
             $this->Session->setFlash('Package removed successfully.', 'flash_success');
         else {
             $this->Session->setFlash('An error occurred. Please try again.', 'flash_error');
         }
         
         $this->redirect('/admin/packages');
       }
        
        
        }