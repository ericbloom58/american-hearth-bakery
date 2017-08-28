<?php $this->set('title_for_layout', 'Add/Edit Favorites'); ?>
<?php $this->Html->script('/_/plugins/tinymce/tinymce.min.js', array('block' => 'scripts')); ?>

<?php $this->start('scripts'); ?>
<script type="text/javascript">
tinymce.init(tinymceSettings);
function closeCustomRoxy2(){
	$('#roxyCustomPanel2').dialog('close');
}
</script>
<?php $this->end(); ?>
<style>
    select.form-control {
        height: 250px;
    }
</style>
<form method="post" action="/admin/users/add_favorites<?= isset($userId) ? "/" . $userId  : ""; ?>" enctype="multipart/form-data">
    <div class='row form-group'>
        <div class="col-md-4">
            <label>Products</label>
            <select multiple name='data[Product][]' class="input form-control">
                <?php foreach($products as $i => $c):
                    ?>
                <option value='<?= $i ?>'><?= $c ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
    </div>



<?php // echo $this->Form->hidden('Product.id'); ?>
<?php // echo $this->Form->hidden('Product.parent_id', array('value' => $parentId)); ?>
<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>

</form>

<div id="roxyCustomPanel2" style="display: none; z-index: 100000;">
  <iframe src="/_/plugins/fileman/index.html?integration=custom&type=files&txtFieldId=ProductSidebarImage" style="width:100%;height:100%" frameborder="0">
  </iframe>
</div>
