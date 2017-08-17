<h1>Manage Options</h1>

<div class='row'>
    <div class='col-md-8'>
        <h2>Current Options</h2>
        <table class='table table-striped table-hover'>
            <thead>
            <th>Name</th>
            <th>Description</th>
            
            <th>Options</th>
            </thead>
            <tbody>
        <?php foreach($options as $option): ?>
                <tr>
                    <td><?= $option['Option']['name']; ?></td>
                    
                    <td><a href='/admin/options/edit/<?= $option['Option']['id']; ?>'><i class='fa fa-edit'></i> Edit</a>&nbsp; &nbsp; 
                        <a class='text-red' 
                           href='/admin/options/delete/<?= $option['Option']['id']; ?>'
                           onclick='return confirm("Are you sure you want to delete this item? This action cannot be undone.");'><i class='fa fa-remove'></i> Remove</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
    </div>

    <div class='col-md-4'>

        <h2>Add Option</h2>
<form action='/admin/options/add' method='POST'>
    <div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Name
    </label>
    <input class='input form-control' name='data[Option][name]' type='text' placeholder="Enter new name here..." />
    </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>
             <input style='margin-top: 24px;' type='submit' class='btn btn-success' value='Add Option' />
        </div>
    </div>
    
        
    
</form>
    </div>
</div>
