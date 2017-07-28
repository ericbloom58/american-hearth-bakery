<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// File: /app/Controller/ContentsController.php
class ContentController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
   
     public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('about_us', 'home');
    }

    //Code for About Us Page
    public function about_us() {
        $this->set('about_us', $this->Content->findById(9));
        $this->set('unacceptable_ingredients', $this->Content->findById('11'));
    }
    //End of Code for About Us Page

    public function home() {
        $this->set('home', $this->Content->findById(10));
    }
    public function admin_index() {
        $this->set('contents', $this->Content->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid content'));
        }

        $content = $this->Content->findById($id);
        if (!$content) {
            throw new NotFoundException(__('Invalid content'));
        }
        $this->set('content', $content);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            //Added this line
            
            if ($this->Content->save($this->request->data)) {
                $this->Flash->success(__('Your content has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        
        $directories = glob('files/galleries/*' , GLOB_ONLYDIR);
        $galleries = array(null => '{none}');
        foreach($directories as $d)
        {
            $n = explode("/", $d);
            $name = end($n);
            $galleries[$name] = $name;
        }
        $this->set('galleries', $galleries);
    }   
    
    public function admin_edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid content'));
        }

        $content = $this->Content->findById($id);
        if (!$content) {
        throw new NotFoundException(__('Invalid content'));
        }

        if ($this->request->is(array('content', 'put'))) {
            $this->Content->id = $id;
            if ($this->Content->save($this->request->data)) {
                $this->Flash->success(__('Your content has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your content.'));
        }

        if (!$this->request->data) {
            $this->request->data = $content;
        }
        $directories = glob('files/galleries/*' , GLOB_ONLYDIR);
        $galleries = array(null => '{none}');
        foreach($directories as $d)
        {
            $n = explode("/", $d);
            $name = end($n);
            $galleries[$name] = $name;
        }
        $this->set('galleries', $galleries);
   }
   
   public function admin_delete($id) {
      
        if ($this->Content->delete($id)) {
            $this->Flash->success(
                __('The content with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The content with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
   }
   
   
   public function isAuthorized($user) {
        // All registered users can add contents
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a content can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $contentId = (int) $this->request->params['pass'][0];
            if ($this->Content->isOwnedBy($contentId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}