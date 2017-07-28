<h1>Manage Packages</h1>

<div class='row'>
    <div class='col-md-8'>
        <h2>Current Packages</h2>
        <table class='table table-striped table-hover'>
            <thead>
            <th>Name</th>
            <!-- comment to allow commity 7/28 -->
            <th>Options</th>
            </thead>
            <tbody>
        <?php foreach($packages as $package): ?>
                <tr>
                    <td><?= $package['Package']['name']; ?></td>
                    <!--<td><?= $package['Package']['description']; ?></td>-->  <!-- Packages don't have a description at the moment 7/28 -->
                    
                    <td><a href='/admin/packages/edit/<?= $package['Package']['id']; ?>'><i class='fa fa-edit'></i> Edit</a>&nbsp; &nbsp; 
                        <a class='text-red' 
                           href='/admin/packages/delete/<?= $package['Package']['id']; ?>'
                           onclick='return confirm("Are you sure you want to delete this item? This action cannot be undone.");'><i class='fa fa-remove'></i> Remove</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
    </div>

    <div class='col-md-4'>

        <h2>Add Package</h2>
<form action='/admin/packages/add' method='POST'>
    <div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Name
    </label>
    <input class='input form-control' name='data[Package][name]' type='text' placeholder="Enter new name here..." />
    </div>
    </div>
    <!--<div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Description
    </label>
        <textarea class='input form-control' name='data[Package][description]'></textarea>
    </div>
    </div>-->
    
    <div class='row'>
        <div class='col-md-12'>
             <input style='margin-top: 24px;' type='submit' class='btn btn-success' value='Add Package' />
        </div>
    </div>
    
        
    
</form>
    </div>
</div>
