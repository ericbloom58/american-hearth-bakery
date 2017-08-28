

<ul class="sidebar-menu">
        <li class="header"></li>
                <li class="header">Customer Dashboard</li>
           
        <li class="<?= $section == 'web' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>My Orders</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
                   
          <ul class="treeview-menu">
            <li><a href="/admin/orders"><i class="fa fa-edit"></i> View Past Orders</a></li>
          </ul>
        </li>
            
        <li class="<?= $section == 'users' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>My Account</span>
          
            <i class="fa fa-angle-left pull-right"></i>

          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/users"><i class="fa fa-list"></i> View All Users</a></li>
          </ul>
        </li>
        
         <li class="<?= $section == 'favorites' ? 'active' : ''; ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Favorites</span>
          
            <i class="fa fa-angle-left pull-right"></i>

          </a>
          <ul class="treeview-menu">
              
            <li><a href="/admin/users/view_favorites"><i class="fa fa-user-plus"></i> View/Edit Favorites </a></li>
           
          </ul>
        </li>
        
        
</ul>

