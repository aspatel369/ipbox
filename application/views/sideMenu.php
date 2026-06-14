<style>
	.page-sidebar .page-sidebar-menu>li>a>.title, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a>.title {
    text-align: left;
	}
	.page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {
    min-height: 45px;
	}
	.text-primary {
    color: #fff;
}
.table {
    border: 1px solid #ddd;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border: 1px solid #ddd;
}
/* .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th .odd {
    background: #fafafa;
} */
label {
    color: #333;
	padding-bottom:5px;
}
 .form-control {
    color: #a8a4a4e6;
}
/* Header row fix (first row ko alag rakho) */
.table tbody tr:first-child {
  background-color: #ffffff !important;
}

/* Odd rows */
.table tbody tr:nth-child(odd):not(:first-child) {
  background-color: #fff !important;
}

/* Even rows */
.table tbody tr:nth-child(even):not(:first-child) {
  background-color: #eef0f3 !important;
}
.dashboard-stat2 .display .number h3 {
    font-size: 27px;
}
select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;

  padding-right: 40px; /* space create */

  /* custom arrow */
  background-image: url("data:image/svg+xml;utf8,<svg fill='gray' height='20' viewBox='0 0 20 20' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M5 7l5 5 5-5z'/></svg>");
  background-repeat: no-repeat;
  background-position: right 12px center; /* 👈 yaha gap control karo */
  background-size: 16px;
}
li [class*=" icon-"], li [class^=icon-] {
    color: #000;
}
@media (max-width: 767px) {
.mobile_box{    display: contents;}
.row11{margin-left: 0;
    margin-right: 0;}
}
	</style>

	    <style>

        .task-container {
            background: #fff;
            padding: 0;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        /* Header Tabs */
        .task-header {
            background: #fff;
            padding: 15px 20px;
            color: #000;
            border-radius: 5px 5px 0 0;
        }

        .task-header span {
            margin-right: 20px;
            cursor: pointer;
            opacity: 0.8;
        }

        .task-header span.active {
            background: rgba(255,255,255,0.2);
            padding: 6px 12px;
            border-radius: 4px;
            opacity: 1;
        }

        /* Table */
        .task-table {
            margin: 0;
        }

        .task-table tr {
            border-bottom: 1px solid #eee;
        }

        .task-table td {
            vertical-align: middle !important;
            padding: 15px;
        }

        .task-text {
            color: #555;
        }

        .task-actions i {
            margin-left: 15px;
            cursor: pointer;
        }

        .edit {
            color: #9c27b0;
        }

        .delete {
            color: #e53935;
        }
		       .emp-card-box {
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        /* Header */
        .emp-card-header {
            background: #fff;
            color: #000;
                padding: 5px 8px 5px 20px;
        }

        .emp-card-header h3 {
            margin: 0;
            font-weight: 500;
        }

        .emp-card-header p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        /* Table */
        .emp-table {
            margin: 0;
        }

        .emp-table thead tr th {
            color: #000;
            font-weight: 600;
            border-bottom: 2px solid #eee !important;
        }

        .emp-table tbody tr {
            border-bottom: 1px solid #eee;
        }

        .emp-table tbody tr td {
            padding: 16px;
            color: #555;
        }
    </style>
<div class="page-sidebar-wrapper">	
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<!-- <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
				<i class="icon-settings"></i> Management
			</li> -->
			<li <?php if($this_page == 'housemanagement') echo ' class="nav-item start active open"' ?>>
				<a href="#" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="House Management">
				
				<span class="title"> <i class="icon-settings"></i> Management </span>
				<span <?php if($this_page == 'housemanagement') echo ' class="selected"' ?>></span></a>
			</li> 
			<li <?php if($this_page == 'housemanagement') echo ' class="nav-item start active open"' ?>>
				<a href="<?php echo base_url().'index.php/house/housemanagement_view?q='.$hash;?>" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="House Management">
				
				<span class="title"> <i class="icon-call-end text-primary"></i> Caller Group </span>
				<span <?php if($this_page == 'housemanagement') echo ' class="selected"' ?>></span></a>
			</li> 
			<li <?php if($this_page == 'timecondition') echo ' class="nav-item start active open"' ?>>
				<a href="<?php echo base_url().'index.php/timecondition?q='.$hash;?>" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="Time Condition">
					
					<span class="title"> <i class="icon-clock"></i> Time Condition </span>
					<span <?php if($this_page == 'timecondition') echo ' class="selected"' ?>></span></a>
			</li>			
			<li <?php if($this_page == 'studentmanagement') echo ' class="nav-item start active open"' ?>>
				<a href="<?php echo base_url().'index.php/student/studentmanagement_view?q='.$hash;?>" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="student Management">
					
					<span class="title"> <i class="icon-users text-primary"></i> Students </span>
					<span <?php if($this_page == 'studentmanagement') echo ' class="selected"' ?>></span></a>
			</li>
			<li <?php if($this_page == 'dashboard') echo ' class="nav-item start active open"' ?>>
				<a href="<?php echo base_url().'index.php/dashboard?q='.$hash;?>" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="student Management">
					
					<span class="title"> <i class="icon-puzzle text-primary"></i> Dashboard </span>
					<span <?php if($this_page == 'dashboard') echo ' class="selected"' ?>></span></a>
			</li>			
			<li <?php if($this_page == 'staffmanagement') echo ' class="nav-item start active open"' ?>>
				<a href="<?php echo base_url().'index.php/admin/staffmanagement_view?q='.$hash;?>" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="Staff Management">
					
					<span class="title"> <i class="icon-graduation text-primary"></i> Staff </span>
					<span <?php if($this_page == 'staffmanagement') echo ' class="selected"' ?>></span>
					</a>          
			</li>
			 
			<li class="line dk"></li>
			<!-- <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
				<i class="icon-bar-chart"></i> 
			</li> -->
			<li <?php if($this_page == 'housemanagement') echo ' class="nav-item start active open"' ?>>
				<a href="#" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="House Management">
				
				<span class="title"> <i class="icon-bar-chart"></i>  Reports </span>
				<span <?php if($this_page == 'housemanagement') echo ' class="selected"' ?>></span></a>
			</li> 
			<li <?php if($this_page == 'userreport') echo ' class="nav-item start active open"' ?>>
                <a href="<?php echo base_url(); ?>index.php/report/user_report" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="User Report">
                    
					<span class="title"> <i class="icon-call-out text-primary"></i> CDR Report </span>
					<span <?php if($this_page == 'userreport') echo ' class="selected"' ?>></span>
					</a>							
			</li>
			<li <?php if($this_page == 'balancereport') echo ' class="nav-item start active open"' ?>>
                <a href="<?php echo base_url(); ?>index.php/report/balance_report" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="User Report">
                    
					<span class="title"> <i class="icon-bar-chart text-primary"></i> Balance Report </span>
					<span <?php if($this_page == 'userreport') echo ' class="selected"' ?>></span>
					</a>							
			</li>
			<li <?php if($this_page == 'housereport') echo ' class="nav-item start active open"' ?>>
                <a href="<?php echo base_url(); ?>index.php/report/house_report" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="House Report">
                    
					<span class="title"> <i class="icon-folder text-primary"></i> House Report </span>
					<span <?php if($this_page == 'userreport') echo ' class="selected"' ?>></span>
					</a>							
			</li>
            <li <?php if($this_page == 'extension_report') echo ' class="nav-item start active open"' ?>>
                <a href="<?php echo base_url(); ?>index.php/report/extension_report" class="nav-link nav-toggle" data-toggle="tooltip" data-placement="bottom" title="Extension Report">
                    
                    <span class="title"> <i class="icon-folder text-primary"></i> Extension Report </span>
                    <span <?php if($this_page == 'userreport') echo ' class="selected"' ?>></span>
                    </a>                            
            </li>
			<li class="line dk hidden-folded"></li>                
        </ul> 
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>