
<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('name', array('style' => 'margin-left:27px;'));
        echo $this->Form->input('address', array('required' => 'false', 'style' => 'margin-left:14px;'));
        echo $this->Form->input('password', array('style' => 'margin-left:3px;'));
        echo $this->Form->input('role', array('style' => 'margin-left:36px;',
            'options' => array('admin' => 'Admin', 'customer' => 'Customer')
        ));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>