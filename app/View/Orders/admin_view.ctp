<?php $this->set('title_for_layout', 'View Orders'); ?>


<form id='orderForm' method='post' action='/admin/orders/creator'>
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

                <div class="container" style='margin-bottom: 100px;'>                         
                            <h3 class='page-title'>Please input the date you would like your order to arrive.</h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Re-Order'/>
                </div>
</form> 