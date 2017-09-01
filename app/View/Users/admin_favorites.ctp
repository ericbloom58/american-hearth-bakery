<?php $this->set('title_for_layout', 'Manage Favorites'); ?>


<?php if (!empty($users)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="users-table">
	<thead>
		<tr>
			<th>User Name</th>
<!--			<th>Last Name</th>
                        <th>Type</th>-->
                        <th>View Favorites</th>
			<th>Add Favorites</th>
<!--			<th>Edit Favorites</th>-->
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user) { ?>
		<tr>
			<td><?php echo $user['User']['username']; ?></td>
                        <td>
                            <a role="button" class="btn btn-primary" href="/admin/users/view_favorites/<?php echo $user['User']['id']; ?>"><i class="fa fa-edit"></i> View Favorites</a>&nbsp;
                        </td>
			<td> <a role="button" class="btn btn-primary" href="/admin/users/add_favorites/<?php echo $user['User']['id']; ?>"><i class="fa fa-edit"></i> Add Favorites</a>&nbsp;
			</td>
<!--			<td> <a role="button" class="btn btn-primary" href="/admin/users/edit_favorites/<?php echo $user['User']['id']; ?>"><i class="fa fa-edit"></i> Edit Favorites</a>&nbsp;
			</td>-->
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php else: ?>
<p>There are no users in your database.</p>
<?php endif; ?>

