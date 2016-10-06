<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
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
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active treeview">
      <a href="<?php echo base_url('adminpanel/dashboard')?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>

    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Users</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/user/add_user') ?>"><i class="fa fa-circle-o"></i> add user</a></li>
        <li><a href="<?php echo base_url('adminpanel/user/manage_user') ?>"><i class="fa fa-circle-o"></i> manage user</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span>Medical Record</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/category/add_category') ?>"><i class="fa fa-plus"></i> Add Medical Record</a></li>
        <li><a href="<?php echo base_url('adminpanel/category/manage_category') ?>"><i class="fa fa-sitemap"></i> Manage Medical Record</a></li>
              </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        <span>News</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/news/add_news') ?>"><i class="fa fa-plus"></i> Add News</a></li>
        <li><a href="<?php echo base_url('adminpanel/news/manage_news') ?>"><i class="fa fa-file-o"></i> Manage News</a></li>
        <li><a href="<?php echo base_url('adminpanel/news/add_read_news') ?>"><i class="fa fa-plus"></i> Add Read News</a></li>
        <li><a href="<?php echo base_url('adminpanel/news/manage_read_news') ?>"><i class="fa fa-truck"></i>Manage Read News</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <span>Love</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
          <li><a href="<?php echo base_url('adminpanel/tip/add_tip') ?>"><i class="fa fa-plus"></i>Add Love</a></li>
          <li><a href="<?php echo base_url('adminpanel/tip/manage_tip') ?>"><i class="fa fa-usd"></i>Manage Love</a></li>
      </ul>
    </li>
        <li class="treeview">
      <a href="#">
        <i class="fa fa-weixin" aria-hidden="true"></i>
        <span>Chat</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/promotion/add_promotion') ?>"><i class="fa fa-plus"></i>Add Chat</a></li>
        <li><a href="<?php echo base_url('adminpanel/promotion/manage_promotion') ?>"><i class="fa fa-book"></i>Manage Chat</a></li>
      </ul>
    </li>




</section>
<!-- /.sidebar -->
