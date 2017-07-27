
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AHB SkyCompass</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
  
    <!-- **Favicon** -->
    <link href="/images/ahblogosm.jpg" rel="shortcut icon" type="/image/x-icon" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/adminPanel/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/adminPanel/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="/adminPanel/plugins/datatables/dataTables.bootstrap.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/adminPanel/plugins/datepicker/datepicker3.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="/adminPanel/dist/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/adminPanel/dist/css/skins/skin-blue.min.css">
 
<link rel="stylesheet" href="/adminPanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link href='/plugins/fullcalendar/scheduler.min.css' rel='stylesheet' />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="/adminPanel/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <link href="/adminPanel/plugins/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />
  
  <link type="text/css" href="/adminPanel/plugins/chatbox/jquery.ui.chatbox.css" rel="stylesheet" />
   

    
  <script type="text/javascript">
		tinymceSettings = {
			selector: ".tinymce",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor textcolor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste colorpicker responsivefilemanager save"
			],
			toolbar: "<?php if ($this->request->params['controller'] == 'content' && $this->request->params['action'] == 'admin_edit'): ?>save | <?php endif; ?>undo redo | formatselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | link image media",
			relative_urls : false,
			width: 1380,
			doctype: '<!DOCTYPE html>',
			image_advtab: true,
			table_advtab: true,
			table_cell_advtab: true,
			table_row_advtab: true,
			//file_browser_callback: RoxyFileBrowser,
                external_filemanager_path:"/adminPanel/plugins/filemanager/", //Attaches tinymce to filemanager plugin here
   filemanager_title:"Your Site " ,
   external_plugins: { "filemanager" : "/adminPanel/plugins/filemanager/plugin.min.js"},
			
			content_css : "/_/css/bootstrap.min.css,/_/css/bootstrap-theme.min.css,/css/editor.css",
			extended_valid_elements : "img[!src|border:0|alt|title|width|height|style]a[name|href|target|title|onclick]",
		  	valid_children : "+body[style]",
		    style_formats: [
		    {
		      title: 'Float Left',
		      selector: 'img', 
		      classes: 'left'
		    },
		    {
		       title: 'Float Right',
		       selector: 'img', 
		       classes: 'right'
		    },
                    {
                        title: 'Client Testimonial Title',
                        selector: 'h2',
                        classes: 'client-testimonial'
                    }
		    ],
		    table_cell_class_list: [
		        {title: 'None', value: ''},
		        {title: 'Mobile Full', value: 'mobile-full'},
		        {title: 'Mobile Hide', value: 'mobile-hide'}
		    ],
		    image_class_list: [
		        {title: 'None', value: ''},
		        {title: 'Mobile Hide', value: 'mobile-hide'},
		        {title: 'Mobile Hide / Desktop Float Left', value: 'mobile-hide-left'},
		        {title: 'Mobile Hide / Desktop Float Right', value: 'mobile-hide-right'}
		    ],
		    block_formats: "Paragraph=p;Pre=pre;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6",
			browser_spellcheck: true,
			font_formats: "Arial=arial,helvetica,sans-serif;"+
		        "Courier New=courier new,courier;"+
		        "Oswald=Oswald;"+
		        "Roboto=Roboto",
			fontsize_formats : "10px 12px 13px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px"
		};

		
	</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <style>
        .form-control.checkbox {
            -webkit-appearance: checkbox;
        }
  .custom-combobox {
    position: relative;
    display: inline-block;
    width: 100%;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 2px 5px;
    border: 1px solid #cfcfcf;
    background: #efefef;
    cursor: pointer;
    color: #888;
    font-weight: bold;
    
    right: 0;
    
    
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  
  }
  .ui-widget {
      z-index: 9;
  }
  .main-item {font-weight: bold;}
                  .child-item {font-style: italic; font-size: 95%; padding-left: 25px;}
                  
                  /* *** Add this for visible Scrolling ;) */

        .ui-autocomplete {
		max-height: 350px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		/* add padding to account for vertical scrollbar */
		padding-right: 20px;
	}
	/* IE 6 doesn't support max-height
	 * we use height instead, but this forces the menu to always be this tall
	 */
	* html .ui-autocomplete {
		height: 100px;
	}
  </style>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/admin/content" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sky</b>Compass</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/adminPanel/uploads/shadowfigure.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/adminPanel/uploads/shadowfigure.jpg" class="img-circle" alt="User Image">

                <p>
                 Admin
    
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <!--  <a href="/admin/users/profile" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="/admin/users/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-check-square-o"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/adminPanel/uploads/shadowfigure.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php echo $this->element('admin_menu'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->fetch('title'); ?>
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php echo $this->Session->flash(); ?>
        <div class="main" style="padding: 10px;">
      <?php echo $this->fetch('content'); ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="http://net2sky.com">Net2Sky, LLC</a>.</strong> All rights
    reserved.
  </footer>

<div id="dialog" style="display: none">

</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-ordered-tab" data-toggle="tab"><i class="fa fa-calendar-check-o"></i></a></li>
      <li><a href="#control-sidebar-jobs-tab" data-toggle="tab"><i class="fa fa-building"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-ordered-tab">
          <h3 class='control-sidebar-heading'><i class="fa fa-plus-square-o"></i> Quick Add Item</h3>
          <textarea class='form-control'></textarea>
          <hr>
          <h3 class="control-sidebar-heading"><i class="fa fa-check-square-o"></i> To-Do List Items</h3>
        <hr>




      </div>
      <!-- /.tab-pane -->

      
      
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-jobs-tab">
        
          <h3 class="control-sidebar-heading">Job Task Lists</h3>
          <hr>
         
          
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="/adminPanel/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/adminPanel/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/adminPanel/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/adminPanel/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/adminPanel/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="/adminPanel/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/adminPanel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/adminPanel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/adminPanel/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/adminPanel/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="/adminPanel/dist/js/pages/dashboard2.js"></script>-->


<!-- bootstrap datepicker -->
<script src="/adminPanel/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/adminPanel/plugins/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/adminPanel/plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

 <script type="text/javascript" src="/adminPanel/plugins/chatbox/jquery.ui.chatbox.js"></script>
<script src="/adminPanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php echo $this->fetch('scripts'); ?>
<script type="text/javascript">
    
    $('.select2 span').addClass('needsclick');
    
    $('.dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "order": [[0, "desc"]]
    });
    
   
    
	$(function() {
            
            $(".fancybox").fancybox({
                    'autoScale': true});
            
<?php echo $this->fetch('jquery-scripts'); ?>
		
               
     
         
         
	});
        
       

	
        $("#galleryManager").on('click', function(e) {
                        e.preventDefault();
                
			$('#galleryManagerCustomPanel').dialog({modal: true, width:1050,height:600});
			return false;
		});
                
                
</script>

   

<style>
    .ui-dialog {
        z-index: 99999 !important;
    }
    </style>

    <div id="galleryManagerCustomPanel" style="display: none;" title="Galleries">
	<iframe src="/adminPanel/plugins/filemanager/dialog.php?type=0&relative_url=1&popup=1" style="width:100%;height:100%; z-index: 99999;" frameborder="0"></iframe>
</div>


</body>
</html>