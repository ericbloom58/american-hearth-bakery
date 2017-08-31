<?php $this->set('title_for_layout', 'View Favorites'); ?>


<?php if (!empty($user)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="users-table">
	<thead>
		<tr>
			<th> Product Name </th>
                        <th> Flavor </th>
                        <!--<th> Packaging </th>-->
                        <th> Option </th>
                        <th> Options </th>
                        <th> Quantity </th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($user['Product'] as $favorites) { ?>
		<tr>
			<td><?php echo $favorites['name']; ?></td>
                        <td>	
                            <select multiple name='data[Flavor][]' class="input form-control">
                                <?php foreach($flavors as $i => $c):
                                 ?>
                                <option value='<?= $i ?>'><?= $c ?></option>
                                <?php
                                endforeach; ?>
                            </select>
                        </td>
<!--                        <td>
                                <?php 
                                foreach($favorites['packages'] as $packages)
                                echo $packages['name'];
                                ?>
                        </td>-->
                        <td>
                            <select multiple name='data[Option][]' class="input form-control">
                                <?php foreach($options as $i => $c):
                                ?>
                                <option value='<?= $i ?>'><?= $c ?></option>
                                <?php
                                endforeach; ?>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
		</tr>
	<?php } ?>
	</tbody>
        
</table>

<?php else: ?>
<p>There are no favorites in your database.</p>
<?php endif; ?>

<a role="button" href="/admin/users/add_favorites" class="btn btn-primary small"><i class="fa fa-plus"></i> Add Favorites </a>
<a role="button" href="#" class="btn btn-primary small">Place Order</a>
