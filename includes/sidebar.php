<!DOCTYPE html>
<html lang="en">
<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="dashboard.php" class="" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>

                    <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-user"></i>
							<span class="nav-text">Payees</span>
						</a>
                    </li>  

                    <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-user-minus"></i>
							<span class="nav-text">Deductions</span>
						</a>
                    </li>

                    <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-money-check"></i>
							<span class="nav-text">Accounts</span>
						</a>
                    </li>   
                    
                    <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-money-bill-alt"></i>
							<span class="nav-text">Collections</span>
						</a>
                    </li>  
                    <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="fas fa-user-cog"></i>
							<span class="nav-text">Transactions</span>
						</a>
                    </li>  
                                      

                    </li>
					
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-info-circle"></i>
							<span class="nav-text">Admin</span>
						</a>
                        <ul aria-expanded="false">
                            <li>
                            <a href="user.php" class="nav-link <?php echo ($current_page == 'user.php' ) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              User
            </a>
                            
							<li><a href="roles.php"><i class="fas fa-info-circle"></i>Roles</a></li>
                            <li><a href="permissions.php"><i class="fas fa-info-circle"></i>Permissions</a></li>
                            <li><a href="pages.php"><i class="fas fa-info-circle"></i>Pages</a></li>
							<li><a href="activitylogs.php"><i class="fas fa-info-circle"></i>Activity Logs</a></li>
                    </li>
                    
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
</html>