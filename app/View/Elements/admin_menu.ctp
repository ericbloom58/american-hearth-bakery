

<ul class="sidebar-menu">
        <li class="header"></li>
                <li class="header">Admin Dashboard</li>
           
                
        <li class="<?= $section == 'web' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>My Orders</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
                   
          <ul class="treeview-menu">
            <li><a href="/admin/orders"><i class="fa fa-edit"></i> View Past Orders</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="/admin/orders/creator"><i class="fa fa-edit"></i> Create an Order</a></li>
          </ul>
        </li>
                
                
                
        <li class="<?= $section == 'web' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Webpage Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
                   
          <ul class="treeview-menu">
            <li><a href="/admin/content"><i class="fa fa-edit"></i> View/Edit Content</a></li>

            <li><a href="#" id="galleryManager"><i class="fa fa-image"></i> View/Edit Galleries</a></li>

          </ul>
        </li>

       
        <li class="<?= $section == 'web' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Products Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
                   
          <ul class="treeview-menu">
            <li><a href="/admin/products"><i class="fa fa-edit"></i> View/Edit Product</a></li>
          </ul>         
          <ul class="treeview-menu">
            <li><a href="/admin/categories"><i class="fa fa-edit"></i> View/Edit Category</a></li>
          </ul>         
          <ul class="treeview-menu">
            <li><a href="/admin/flavors"><i class="fa fa-edit"></i> View/Edit Flavors</a></li>
          </ul>         
          <ul class="treeview-menu">
            <li><a href="/admin/packages"><i class="fa fa-edit"></i> View/Edit Packaging</a></li>
          </ul>         
          <ul class="treeview-menu">
            <li><a href="/admin/options"><i class="fa fa-edit"></i> View/Edit Options</a></li>
          </ul>
            <!--This is commented out so users do not mess with the sell by quantities.-->
          <!--<ul class="treeview-menu">
            <li><a href="/admin/quantitys"><i class="fa fa-edit"></i> View/Edit Sell By Quantities</a></li>
          </ul>-->
        </li>    
            
            
            
        <li class="<?= $section == 'users' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
          
            <i class="fa fa-angle-left pull-right"></i>

          </a>
          <ul class="treeview-menu">
              
            <li><a href="/admin/users/add"><i class="fa fa-user-plus"></i> Add New User</a></li>
            <li><a href="/admin/users"><i class="fa fa-list"></i> View All Users</a></li>
           
          </ul>
        </li>    
        
        <li class="<?= $section == 'favorites' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Favorites</span>
          
            <i class="fa fa-angle-left pull-right"></i>

          </a>
          <ul class="treeview-menu">
              
            <li><a href="/admin/users/favorites"><i class="fa fa-user-plus"></i> View/Edit Favorites </a></li>
           
          </ul>
        </li>
        
</ul>
