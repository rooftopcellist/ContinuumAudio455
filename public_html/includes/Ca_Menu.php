<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<style>
/*.nav-sidebar{
  position: static;
  padding-right: 20px;
  padding-left: 20px;
	background-color:#333333;
}*/
#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

.nav-sidebar {
    position: fixed;
    top: 50px;
    width: 200;
    margin: 0;
    padding: 0;
    list-style: none;
    background-color: #262626
}

.nav-sidebar li {
    text-indent: 20px;
    line-height: 40px;
}

.nav-sidebar li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.nav-sidebar li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.nav-sidebar li a:active,
.nav-sidebar li a:focus {
    text-decoration: none;
}





</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="Ca_Index.php">&copy; <b>Continuum Audio</b></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Ca_Index.php" <?php if ($currentPage == 'Ca_Index.php') {echo 'id="here"'; } ?>>Home</a></li>
				<li><a href="Ca_Shop_Index.php" <?php if ($currentPage == 'Ca_Shop_Index.php') {echo 'id="here"'; } ?>>Shop</a></li>
				<li><a href="Ca_Create_Acct.php" <?php if($currentPage== 'Ca_Create_Acct.php') {echo 'id="here"';} ?>>Register</a></li>
				<?php
							if(isset($_SESSION['email'])){ ?>
				<li><a href="Ca_Logged_Out.php" >Logout</a></li>
				<?php }else {?>
					<li><a href="Ca_Login.php" <?php if($currentPage== 'Ca_Login.php') {echo 'id="here"';} ?>>Login</a></li>
				<?php
			}
					?>

			</ul>
			<form action= "Ca_Search.php" method ="post" class="navbar-form navbar-right" >
				<input type="text" name="search_string" class="form-control" placeholder="Search...">
        <input type="Submit" class="form-control" name = "search" value ="search"/>
			</form>
		</div>
	</div>
</nav>
<?php
			if(isset($_SESSION['email'])){ ?>

	<div class="wrapper">
    <div class="sidebar-wrapper">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="Ca_Search_Cat.php"<?php if($currentPage== 'Ca_Search_Cat.php') {echo 'id="here"';} ?>>Search <span class="sr-only">(current)</span></a></li>
				<li><a href="Ca_Employee.php"<?php if($currentPage== 'Ca_Employee.php') {echo 'id="here"';} ?>>Employees</a></li>
				<li><a href="Ca_Customer.php"<?php if($currentPage== 'Ca_Customer.php') {echo 'id="here"';} ?>>Customers</a></li>
				<li><a href="Ca_View_Orders.php"<?php if($currentPage== 'Ca_View_Orders.php') {echo 'id="here"';} ?>>View Orders</a></li>

				<li><a href="Ca_Add_Emp.php" <?php if($currentPage== 'Ca_Add_Emp.php') {echo 'id="here"';} ?>>New Employee</a></li>
				<li><a href="Ca_Upload_Images.php" <?php if($currentPage== 'Ca_Upload_Images.php') {echo 'id="here"';} ?>>Upload Images</a></li>
				<li><a href="Ca_View_Images.php" <?php if($currentPage== 'Ca_View_Images.php') {echo 'id="here"';} ?>>View Images</a></li>
				<li><a href="Ca_Remove_Employee.php" <?php if($currentPage== 'Ca_Remove_Employee.php') {echo 'id="here"';} ?>>Remove Employees</a></li>

				<?php }?>
			</ul>
		</div>
  </div>
