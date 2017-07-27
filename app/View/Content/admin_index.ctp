
<?php $this->set('title_for_layout', 'Manage Content'); ?>

<?php $this->start('jquery-scripts'); ?>
	$('#content-table').dataTable({	
		"sPaginationType": "bootstrap"
	});
<?php $this->end(); ?>

<?php if (!empty($contents)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="acontent-table">
	<thead>
		<tr>
			<th>Post Name</th>
			
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($contents as $content) { ?>
		<tr>
			<td><?php echo $content['Content']['name']; ?></td>
			
			<td>
				<a role="button" class="btn btn-primary" href="/admin/content/edit/<?php echo $content['Content']['id']; ?>"><i class="fa fa-edit"></i> Edit</a>&nbsp;
				<a role="button" class="btn btn-danger delete-object" onclick='return confirm("Are you sure you want to delete \"<?php echo $content['Content']['name']; ?>?\" This action CANNOT be undone.")'
                                   href="/admin/content/delete/<?php echo $content['Content']['id']; ?>"><i class="fa fa-trash-o"></i> Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php echo $this->element('modals/delete', array('title' => 'Delete Content', 'text' => 'delete the <strong>{name}</strong> content', 'action' => '/admin/content/delete/{id}')); ?>

<?php else: ?>
<p>There is no content in this section.</p>
<?php endif; ?>

<a role="button" href="/admin/content/add" class="btn btn-primary small"><i class="fa fa-plus"></i> Create New Post</a>