<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
   
    
    class CategoriesController extends AppController {

        public function beforeRender() {
            parent::beforeRender();
           
        }
    	
       public function admin_index()
       {
           $this->set('categories', $this->Category->find('all'));
          
       }
       
       public function admin_add()
       {
           if(!empty($this->request->data))
           {
               $this->Category->create();
               if($this->Category->save($this->request->data))
               {
                   $this->Session->setFlash("New category successfully created.", 'flash_success');
                   
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               $this->redirect('/admin/categories');
               
           }
       }
       public function admin_edit($id)
       {
           
           if(!empty($this->request->data))
           {
               $this->Category->id = $id;
               if($this->Category->save($this->request->data))
               {
                   $this->Session->setFlash("Category edited successfully.", 'flash_success');
                   $this->redirect('/admin/categories');
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               
               $this->redirect('/admin/categories');
           }
           $this->data = $this->Category->findById($id);
       }
       
       public function admin_delete($id)
       {
           
         if($this->Category->delete($id))
             $this->Session->setFlash('Category removed successfully.', 'flash_success');
         else {
             $this->Session->setFlash('An error occurred. Please try again.', 'flash_error');
         }
         
         $this->redirect('/admin/categories');
       }
        
        
        }