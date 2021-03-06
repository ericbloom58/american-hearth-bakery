<?php $this->set('title_for_layout', 'New Product'); ?>
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
    <?php $cats = array(); $flavs = array(); $pkgs = array(); $opts = array(); $qts = array();
    foreach($this->data['Category'] as $c)
    {
        $cats[] = $c['id'];
    }
     foreach($this->data['Flavor'] as $c)
    {
        $flavs[] = $c['id'];
    }
     foreach($this->data['Package'] as $c)
    {
        $pkgs[] = $c['id'];
    }
     foreach($this->data['Option'] as $c)
    {
        $opts[] = $c['id'];
    }
    foreach($this->data['Quantity'] as $c)
    {
        $qts[] = $c['id'];
    }
    
   ?>
<?= $this->Form->create('edit', array('type' => 'file')); ?>
    <?= $this->Form->hidden('Product.id'); ?>
		<div class="row form-group">	
			<?php echo $this->Form->input('Product.name', array('div' => 'col-md-8', 'label' => 'Product Name', 'autofocus', 'class' => 'input form-control')); ?>
                        <?php echo $this->Form->input('Product.image_url', array('type'=>'file', 'div' => 'col-md-4', 'label' => 'Product Image...', 'class' => 'input form-control')); ?>
			
		</div>
		
		<div class="row form-group">
			<?php echo $this->Form->input('Product.description', array('div' => 'col-md-12', 'label' => false, 'rows' => '6', 'class' => 'tinymce form-control')); ?>
		</div>
    <div class='row form-group'>
        <div class="col-md-4">
            <label>Categories</label>
            <select multiple name='data[Category][]' class="input form-control">
                <?php foreach($categories as $i => $c):
                    $selected = "";
                    if(in_array($i, $cats))
                            $selected = 'selected';
                    ?>
                <option <?= $selected; ?> value='<?= $i ?>'><?= $c ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Flavors</label>
            <select multiple name='data[Flavor][]' class="input form-control">
                <?php foreach($flavors as $i => $c):
                    $selected = "";
                    if(in_array($i, $flavs))
                            $selected = 'selected';
                    ?>
                <option <?= $selected; ?> value='<?= $i ?>'><?= $c ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Packaging</label>
            <select multiple name='data[Package][]' class="input form-control">
                <?php foreach($packages as $i => $c):
                    $selected = "";
                    if(in_array($i, $pkgs))
                            $selected = 'selected';
                    ?>
                <option <?= $selected; ?> value='<?= $i ?>'><?= $c ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Option</label>
            <select multiple name='data[Option][]' class="input form-control">
                <?php foreach($options as $i => $c):
                    $selected = "";
                    if(in_array($i, $opts))
                            $selected = 'selected';
                    ?>
                <option <?= $selected; ?> value='<?= $i ?>'><?= $c ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Sell By Quantities</label>
            <select multiple name='data[Quantity][]' class="input form-control">
                <?php foreach($quantitys as $i => $c):
                    $selected = "";
                    if(in_array($i, $qts))
                            $selected = 'selected';
                    ?>
                    ?>
                <option <?= $selected; ?> value='<?= $i ?>'><?= $c ?></option>
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
