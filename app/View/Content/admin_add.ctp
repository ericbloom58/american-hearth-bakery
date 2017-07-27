<?php $this->set('title_for_layout', 'New Page'); ?>
<?php $this->Html->script('/_/plugins/tinymce/tinymce.min.js', array('block' => 'scripts')); ?>

<?php $this->start('scripts'); ?>
<script type="text/javascript">
tinymce.init(tinymceSettings);
function closeCustomRoxy2(){
	$('#roxyCustomPanel2').dialog('close');
}
</script>
<?php $this->end(); ?>

<form method="post" action="/admin/content/add">

		<div class="row form-group">	
			<?php echo $this->Form->input('Content.name', array('div' => 'col-md-4', 'label' => 'Page Name', 'autofocus', 'class' => 'input form-control')); ?>
			<?php echo $this->Form->input('Content.page_type', array('div' => 'col-md-4', 'label' => 'Page Type', 'class' => 'input form-control', 'options' => array(
                        'content' => 'Content Page'
                    ))); ?>
                    <?php echo $this->Form->input('Content.linked_gallery', array('div' => 'col-md-4', 'label' => 'Linked Gallery', 'class' => 'input form-control', 'options' =>$galleries)); ?>
		</div>
		
		<div class="row form-group">
			<?php echo $this->Form->input('Content.content', array('div' => 'col-md-12', 'label' => false, 'rows' => '20', 'cols' => '30', 'style' => 'height: 600px;', 'class' => 'tinymce form-control')); ?>
		</div>



<?php // echo $this->Form->hidden('Content.id'); ?>
<?php // echo $this->Form->hidden('Content.parent_id', array('value' => $parentId)); ?>
<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>

</form>

<div id="roxyCustomPanel2" style="display: none; z-index: 100000;">
  <iframe src="/_/plugins/fileman/index.html?integration=custom&type=files&txtFieldId=ContentSidebarImage" style="width:100%;height:100%" frameborder="0">
  </iframe>
</div>

 