<h1>Manage Quantitys</h1>

<div class='row'>
    <div class='col-md-8'>
        <h2>Current Quantitys</h2>
        <table class='table table-striped table-hover'>
            <thead>
            <th>Name</th>
            <th>Description</th>
            
            <th>Quantitys</th>
            </thead>
            <tbody>
        <?php foreach($quantitys as $quantity): ?>
                <tr>
                    <td><?= $quantity['Quantity']['name']; ?></td>
                    
                    <td><a href='/admin/quantitys/edit/<?= $quantity['Quantity']['id']; ?>'><i class='fa fa-edit'></i> Edit</a>&nbsp; &nbsp; 
                        <a class='text-red' 
                           href='/admin/quantitys/delete/<?= $quantity['Quantity']['id']; ?>'
                           onclick='return confirm("Are you sure you want to delete this item? This action cannot be undone.");'><i class='fa fa-remove'></i> Remove</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
    </div>

    <div class='col-md-4'>

        <h2>Add Quantity</h2>
<form action='/admin/quantitys/add' method='POST'>
    <div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Name
    </label>
    <input class='input form-control' name='data[Quantity][name]' type='text' placeholder="Enter new name here..." />
    </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>
             <input style='margin-top: 24px;' type='submit' class='btn btn-success' value='Add Quantity' />
        </div>
    </div>
    
        
    
</form>
    </div>
</div>
