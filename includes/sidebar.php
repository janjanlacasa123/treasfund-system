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
                        </li>

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
                                      

					
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-info-circle"></i>
							<span class="nav-text">Admin</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="users.php"><i class="fas fa-info-circle"></i>Users</a></li>
							<li><a href="roles.php"><i class="fas fa-info-circle"></i>Roles</a></li>
                            <li><a href="permissions.php"><i class="fas fa-info-circle"></i>Permissions</a></li>
                            <li><a href="pages.php"><i class="fas fa-info-circle"></i>Pages</a></li>
							<li><a href="activitylogs.php"><i class="fas fa-info-circle"></i>Activity Logs</a></li>
                        </ul>
                    </li>
                    <li><a id="btn_logout" style="cursor:pointer;" class ="nav-link<?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>">
							<i class="fas fa-power-off"></i>
							<span class="nav-text">Logout</span>
						</a>
                    </li>  
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
  $(document).ready(function () {
    // When the logout button is clicked
    $("#btn_logout").click(function () {
      // Show confirmation using SweetAlert
      Swal.fire({
        title: "Would you like to logout?",
        showCancelButton: true,
        confirmButtonText: "Logout",
        cancelButtonText: "Cancel",
      }).then((result) => {
        if (result.isConfirmed) {
          // Handle the logout via AJAX request
          $.ajax({
            type: "POST",
            url: "logout.php", // Make sure this is correct path to your logout script
            data: { btn_logout: 1 }, // Send a flag to indicate a logout action
            success: function (response) {
              Swal.fire("Logged out successfully!", "You have been logged out.", "success").then(function () {
                // Redirect to the login page or homepage after successful logout
                window.location.href = "index.php"; // Adjust this to your desired location
              });
            },
            error: function () {
              Swal.fire("Error", "An error occurred while logging out.", "error");
            }
          });
        }
      });
    });
  });
</script>
	