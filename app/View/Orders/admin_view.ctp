<?php $this->set('title_for_layout', 'View Orders'); ?>


<?php if (!empty($order)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="users-table">
	<thead>
		<tr>
                        <th> Flavor </th>
			<th> Product Name </th>
                        <th> Option </th>
                        <th> Quantity </th>
		</tr>
	</thead>
        <?php foreach ($order as $product)
        {  ?>
            <?php foreach($product['Flavors'] as $flavor)
            { ?>
	<tbody>
                    <td><?php echo $flavor['Flavor']['Flavor']['name']; ?></td>
                    <td><?php echo " " . $product['Product']['name']; ?></td>
                    <td><?php echo "if the item has options they will go here (so far only bagels)"; ?></td>
                    <td><?php echo " " . $flavor['data']['quantity']; ?></td>

       </tbody>
            <?php } ?>
        <?php } ?>
</table>

<?php else: ?>
<p>There are no orders in your database.</p>
<?php endif; ?>

<a role="button" href="#" class="btn btn-primary small"><i class=""></i> Re-Order </a>