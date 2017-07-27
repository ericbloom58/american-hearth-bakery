
<?php $this->set('title_for_layout', 'Manage Products'); ?>

<?php $this->start('jquery-scripts'); ?>
	$('#product-table').dataTable({	
		"sPaginationType": "bootstrap"
	});
<?php $this->end(); ?>
<!-- view/products/index -->
<?php if (!empty($products)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="aproduct-table">
	<thead>
		<tr>
			<th>Name</th>
                        <th>Description</th>
                        <th>Categories</th>
                        <th>Packaging</th>
                        <th>Flavors</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product) { ?>
		<tr>
			<td><?php echo $product['Product']['name']; ?></td>
                        <td><?php echo $product['Product']['description']; ?></td>
                        <td>
                            <?php 
                            $count = 0;
                            foreach($product['Category'] as $c)
                            {
                                if($count > 0)
                                    echo ", ";
                                
                                echo ucwords($c['name']);
                                $count++;
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $count = 0;
                            foreach($product['Package'] as $c)
                            {
                                if($count > 0)
                                    echo ", ";
                                
                                echo ucwords($c['name']);
                                $count++;
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $count = 0;
                            foreach($product['Flavor'] as $c)
                            {
                                if($count > 0)
                                    echo ", ";
                                
                                echo ucwords($c['name']);
                                $count++;
                            }
                            ?>
                        </td>
			
			<td>
				<a role="button" class="btn btn-primary" href="/admin/products/edit/<?php echo $product['Product']['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;
				<a role="button" class="btn btn-danger delete-object" onclick='return confirm("Are you sure you want to delete \"<?php echo $product['Product']['name']; ?>?\" This action CANNOT be undone.")'
                                   href="/admin/products/delete/<?php echo $product['Product']['id']; ?>"><i class="fa fa-trash-o"></i> Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php echo $this->element('modals/delete', array('title' => 'Delete Product', 'text' => 'delete the <strong>{name}</strong> product', 'action' => '/admin/products/delete/{id}')); ?>

<?php else: ?>
<p>There is no product in this section.</p>
<?php endif; ?>

<a role="button" href="/admin/products/add" class="btn btn-primary small"><i class="fa fa-plus"></i> Create New Product</a>
