<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
   
    
    class FlavorsController extends AppController {

        public function beforeRender() {
            parent::beforeRender();
           
        }
    	
       public function admin_index()
       {
           $this->set('flavors', $this->Flavor->find('all'));
          
       }
       
       public function admin_add()
       {
           if(!empty($this->request->data))
           {
               
               $uploaddir = WWW_ROOT . 'files' . DS . 'uploads' . DS;
            
            // name of file on the server
            $uploadfile = $uploaddir . basename($this->request->data['Flavor']['image_url']['name']);
          //  pr($uploadfile);
            if(move_uploaded_file($this->request->data['FlavorImage']['url']['tmp_name'], $uploadfile))
                    $this->request->data['Flavor']['image_url'] = $uploadfile;
            else 
                unset($this->request->data['Flavor']['image_url']);
            
               
               $this->Flavor->create();
               if($this->Flavor->save($this->request->data))
               {
                   $this->Session->setFlash("New flavor successfully created.", 'flash_success');
                   
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               $this->redirect('/admin/flavors');
               
           }
       }
       public function admin_edit($id)
       {
           
           if(!empty($this->request->data))
           {
               
               $uploaddir = WWW_ROOT . 'files' . DS . 'uploads' . DS;
            
            // name of file on the server
            $uploadfile = $uploaddir . basename($this->request->data['Flavor']['image_url']['name']);
          //  pr($uploadfile);
            if(move_uploaded_file($this->request->data['FlavorImage']['url']['tmp_name'], $uploadfile))
                    $this->request->data['Flavor']['image_url'] = $uploadfile;
            else 
                unset($this->request->data['Flavor']['image_url']);
            
               
               $this->Flavor->id = $id;
               if($this->Flavor->save($this->request->data))
               {
                   $this->Session->setFlash("Flavor edited successfully.", 'flash_success');
                   $this->redirect('/admin/flavors');
               }
               else {
                   $this->Session->setFlash("An error occurred. Please try again.", 'flash_error');
               }
               
               $this->redirect('/admin/flavors');
           }
           $this->data = $this->Flavor->findById($id);
       }
       
       public function admin_delete($id)
       {
           
         if($this->Flavor->delete($id))
             $this->Session->setFlash('Flavor removed successfully.', 'flash_success');
         else {
             $this->Session->setFlash('An error occurred. Please try again.', 'flash_error');
         }
         
         $this->redirect('/admin/flavors');
       }
        
        
        }