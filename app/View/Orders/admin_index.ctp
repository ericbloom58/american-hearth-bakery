<!-- file for doing the view of orders -->
<!--
http://americanhearthbakery.local/admin/orders/view/1
The 1 at the end is the order id.
-->

<?php $this->set('title_for_layout', 'View Past Orders'); ?>

<?php if (!empty($orders)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="orders-table">
	<thead>
		<tr>
			<th>Order Number</th>
                        <!--<th>User</th>-->
                        <th>User Name</th>
			<th>Created</th>
                        <!--<th>Delivery Date</th>-->
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order) { ?>
		<tr>
			<td><?php echo $order['Order']['id']; ?></td>
                        <!--<td><?php echo $order['Order']['user_id']; ?></td>-->
                        <td><?php echo $order['User']['name'];?></td>
			<td><?php echo $order['Order']['created'] == '0000-00-00 00:00:00' ? 'Never' : date('F j, Y g:i a', strtotime($order['Order']['created'])); ?></td>
			<td>
				<!--<a role="button" class="btn btn-primary" href="/admin/orders/edit/<?php echo $order['Order']['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;-->
                               <a role="button" class="btn btn-primary" href="/admin/orders/view/<?php echo $order['Order']['id']; ?>"><i class="fa fa-edit"></i> View</a>&nbsp;
                               <a class="btn btn-danger" href="/admin/orders/delete/<?= $order['Order']['id']; ?>"><i class='fa fa-remove'></i> Delete</a>
                                </p>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php else: ?>
<p>There are no orders in your database.</p>
<?php endif; ?>