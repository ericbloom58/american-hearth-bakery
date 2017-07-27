<?php $this->set('title_for_layout', 'Manage Users'); ?>


<?php if (!empty($users)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="users-table">
	<thead>
		<tr>
			<th>User Name</th>
<!--			<th>Last Name</th>
                        <th>Type</th>-->
			<th>Role</th>
			<th>Created</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user) { ?>
		<tr>
			<td><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['role']; ?></td>

			<td><?php echo $user['User']['created'] == '0000-00-00 00:00:00' ? 'Never' : date('F j, Y g:i a', strtotime($user['User']['created'])); ?></td>
			<td>
				<a role="button" class="btn btn-primary" href="/admin/users/edit/<?php echo $user['User']['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;
				
                               <a class="btn btn-danger" href="/admin/users/delete/<?= $user['User']['id']; ?>"><i class='fa fa-remove'></i> Delete</a>
                                </p>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php else: ?>
<p>There are no users in your database.</p>
<?php endif; ?>

<a role="button" href="/admin/users/add" class="btn btn-primary small"><i class="fa fa-plus"></i> Create New User</a>
