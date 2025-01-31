<!DOCTYPE html>
<html lang="en">
<?php
include('includes/conn.php');
?>
<?php include('includes/header.php'); ?>
<head>
<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="vendor/datatables/css/modal.css" rel="stylesheet">
</head>
<body>

<?php include('includes/preloader.php'); ?>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php include('includes/navbar.php'); ?>
        <?php include('includes/sidebar.php'); ?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <div class="card-header">
                <button type="button" class="btn btn-primary" style="font-size: 14px; padding: 6px; border-radius: 5px;" onclick="openForm()"><span class="fas fa-plus"></span>&nbsp;Add Users</button>
                <!-- First Modal -->
                <div id="popupForm" class="popup-form-container">
                    <div class="popup-form" id="modalStep1">
                        <span class="close-btn" onclick="closeForm()">&times;</span>
                        <h3>Step 1: User Information</h3>
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Username:</label>
                            <input type="text" class="form-control" id="userName" placeholder="Enter Username" name="userName">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                    </div>

                    <!-- Second Modal -->
                    <div class="popup-form" id="modalStep2" style="display: none;">
                        <span class="close-btn" onclick="closeForm()">&times;</span>
                        <h3>Step 2: Account Details</h3>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" placeholder="Enter Email" name="Email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="repwd">Re-type Password:</label>
                            <input type="password" class="form-control" id="repwd" placeholder="Re-enter Password" name="repwd">
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Back</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                    </div>

                    <!-- Third Modal -->
                    <div class="popup-form" id="modalStep3" style="display: none;">
                        <span class="close-btn" onclick="closeForm()">&times;</span>
                        <h3>Step 3: Role and Status</h3>
                        <div class="form-group">
                            <label for="division">Choose Division:</label>
                            <select name="division" id="division">
                                <option value="#">#</option>
                                <option value="#">#</option>
                                <option value="#">#</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Choose Roles:</label>
                            <select name="role" id="role">
                                <option value="#">#</option>
                                <option value="#">#</option>
                                <option value="#">#</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-check-label" for="status">Status:</label>
                            <label class="switch">
                                <input type="checkbox" name="status" id="status" value="Active" onchange="this.value=this.checked ? 'Active' : 'Inactive'">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Back</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

                <script src="./js/Pop-up-form/popUpForm.js"></script>
            </div>
            <class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table id="example" class="display">
                                <colgroup>
                                    <col width="5%">
                                    <col width="50%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Fullname</th>
                                        <th>Division</th>
                                        <th>Roles</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM users";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through and display each row in the table
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['last_name'] . ", " . $row['first_name'] . "</td>
                                        <td>" . $row['division_id'] . "</td>
                                        <td>" . $row['role_id'] . "</td>
                                        <td>" . $row['status'] . "</td>
                                        <td style='display: flex;'>
                                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary shadow btn-xs sharp me-1'><i class='fas fa-edit'></i></a>
                                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger shadow btn-xs sharp' ><i class='fas fa-trash'></i></a>
                                        </td>
                                      </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No data found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>
                                      
    <script>$(function () {
            $("#example").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });</script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>


</body>
</html>