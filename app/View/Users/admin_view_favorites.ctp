<?php $this->set('title_for_layout', 'View Favorites'); ?>

<form id='orderForm' method='post' action='/admin/orders/creator'>
<?php if (!empty($user)): ?>
<table class="table table-striped table-bordered table-hover dataTable" id="users-table">
	<thead>
		<tr>
			<th> Product Name </th>
                        <th> Flavor </th>
                        <!--<th> Packaging </th>-->
                        <th> Options </th>
                        <th> Quantity </th>
                        <th> Remove </th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($user['Product'] as $favorites) { ?>
		<tr>
			<td><?php echo $favorites['name']; ?></td>
                        <td>	
                          
                            <select multiple name='data[Flavor][]' class="input form-control">
                                <?php foreach($favorites['ProductInfo']['Flavor'] as $c):
                                 ?>
                                <option value='<?= $c['id'] ?>'><?= $c['name'] ?></option>
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
                                <?php foreach($favorites['ProductInfo']['Option'] as $c):
                                ?>
                                <option value='<?= $c['id'] ?>'><?= $c['name'] ?></option>
                                <?php
                                endforeach; ?>
                            </select>
                        </td>
                        <td>
                                                                <select name="data[quantity][]">
                                                                    <?php foreach($favorites['ProductInfo']['Quantity'] as $c): ?>
                                                                    <?php if($c['id'] === "1") 
                                                                        {echo $this->element('quantitiesindividuals');}
                                                                    else if($c['id'] === "2") 
                                                                        {echo $this->element('quantitiesdozen');}
                                                                    else if ($c['id'] === "3") 
                                                                        {echo $this->element('quantitieshalf_dozens');} 
                                                                    else if ($c['id'] === "4") 
                                                                        {echo $this->element('quantitieshalf_case');} 
                                                                    else 
                                                                        {echo $this->element('quantitiesindividuals');} ?>
                                                                    <?php endforeach; ?> 
                                                                </select>
                        </td>
                        <td><a class="btn btn-danger" href="/admin/users/favorites_delete/<?= $user['Product'][0]['id']; ?>"><i class='fa fa-remove'></i> Delete</a></td>
		</tr>
	<?php } ?>
	</tbody>
        
</table>

<?php else: ?>
<p>There are no favorites in your database.</p>
<?php endif; ?>
</form>

<a role="button" href="/admin/users/add_favorites/<?php echo $user['User']['id']; ?>" class="btn btn-primary small"><i class="fa fa-plus"></i> Add Favorites </a>                     
                            <h3 class='page-title'>Please input the date you would like your order to arrive.</h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Re-Order'/>
