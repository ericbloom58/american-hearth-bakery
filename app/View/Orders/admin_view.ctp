<?php $this->set('title_for_layout', 'View Order'); ?>


<form id='orderForm' method='post' action='/admin/orders/creator'>
<?php if (!empty($order)): ?>
<h3> Delivery Date : <?php echo $prettydate; ?> </h3>                
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
        {  $test = 0; 
        ?>
            <?php foreach($product['Flavors'] as $flavor)
            {
              
                ?>
	<tbody>
            
                    <td><?php echo $flavor['Flavor']['Flavor']['name']; ?></td>
                    <td><?php echo " " . $product['Product']['name']; ?></td>
                    <td>
                        <?php if(!empty($flavor['Option'])):
                            $counter = 0;
                            foreach($flavor['Option'] as $option)
                        {
                            ?>
                        <?php if($test === 0): ?>
                        
                        <input type="hidden" name ="data[Order][<?= $product['Product']['id']; ?>][options][<?= $counter; ?>]" value ='<?= $option['Option']['id']; ?>' />
                        
                        <?php $counter++;
                        endif; ?>
                        <?php
                            echo $option['Option']['name'];
                            echo "<br />";
                            }
                           $test++; 
                        endif;
                        ?>
                    </td>
                    <td><?php echo " " . $flavor['data']['quantity']; ?></td>

       </tbody>
       <input type="hidden" name ="data[Order][<?= $product['Product']['id']; ?>][<?= $flavor['Flavor']['Flavor']['id']; ?>][quantity]" value ='<?= $flavor['data']['quantity']; ?>' />
            <?php } ?>
        <?php } ?>
</table>

<?php else: ?>
<p>There are no orders in your database.</p>
<?php endif; ?> 
                            <h3 class='page-title'>Please input the date you would like your order to arrive.</h3>
                            <input name='data[Order][dateneeded]' type="date">
                            <input class="dt-sc-button small blue" type='submit' value='Re-Order'/>
                            
</form> 