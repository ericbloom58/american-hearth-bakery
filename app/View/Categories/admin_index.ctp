<h1>Manage Categories</h1>

<div class='row'>
    <div class='col-md-8'>
        <h2>Current Categories</h2>
        <table class='table table-striped table-hover'>
            <thead>
            <th>Name</th>
            <th>Description</th>
            
            <th>Options</th>
            </thead>
            <tbody>
        <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category['Category']['name']; ?></td>
                    <td><?= $category['Category']['description']; ?></td>
                    
                    <td><a href='/admin/categories/edit/<?= $category['Category']['id']; ?>'><i class='fa fa-edit'></i> Edit</a>&nbsp; &nbsp; 
                        <a class='text-red' 
                           href='/admin/categories/delete/<?= $category['Category']['id']; ?>'
                           onclick='return confirm("Are you sure you want to delete this item? This action cannot be undone.");'><i class='fa fa-remove'></i> Remove</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
    </div>

    <div class='col-md-4'>

        <h2>Add Category</h2>
<form action='/admin/categories/add' method='POST'>
    <div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Name
    </label>
    <input class='input form-control' name='data[Category][name]' type='text' placeholder="Enter new name here..." />
    </div>
    </div>
    <div class='row form-group'>
    <div class='col-md-12'>
    <label>
        Description
    </label>
        <textarea class='input form-control' name='data[Category][description]'></textarea>
    </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>
             <input style='margin-top: 24px;' type='submit' class='btn btn-success' value='Add Category' />
        </div>
    </div>
    
        
    
</form>
    </div>
</div>
