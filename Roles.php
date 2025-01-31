<?php
// Include the database connection file
require ('includes/conn.php');


$query = "SELECT name, description, status FROM roles";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); ?>
<head>
    <style>
        /* Popup Form Container */
.popup-form-container {
  display: none;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Popup Form Box */
.popup-form {
  background-color: #fff;
  padding: 30px;
  width: 600px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  position: relative;
  text-align: left;
  animation: fadeIn 0.3s ease-in-out;
}

/* Input Fields */
.popup-form .form-group {
  margin-bottom: 20px;
}

.popup-form label {
  font-weight: 500;
  font-size: 14px;
  margin-bottom: 8px;
  display: block;
}

.popup-form input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
  margin-top: 5px;
}

/* Buttons */
.popup-form .btn {
  padding: 10px 20px;
  background-color: #28a745;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  transition: background-color 0.3s;
}

.popup-form .btn:hover {
  background-color: #218838;
}

/* Close Button */
.close-btn {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 18px;
  color: #333;
  cursor: pointer;
}

.close-btn:hover {
  color: #000;
}

select {
  font-size: 16px;
}

.form-group-permission {
        display: flex;
        gap: 20px; /* Space between permission groups */
        flex-wrap: wrap; /* Ensures responsiveness */
    }

    .permission-group {
        display: flex;
        flex-direction: column;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        min-width: 150px;
    }

    .permission-group label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Make checkbox and label appear inline */
    .permission-item {
        display: flex;
        align-items: center;
        gap: 5px; /* Space between checkbox and label */
    }

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

/* Animation */
@keyframes fadeIn {
  from {
      opacity: 0;/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  }
  to {
      opacity: 1;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .popup-form {
      width: 90%;
      padding: 20px;
  }
}
    </style>
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
				
                <script>function openForm() {
                  document.getElementById("popupForm").style.display = "flex";
                }
                
                function closeForm() {
                  document.getElementById("popupForm").style.display = "none";
                }</script>

                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h2 style="font-weight: bold;">Roles</h2>
                <button type="button" class="btn btn-success" style="font-size: 16px; padding: 6px; border-radius: 5px;" onclick="openForm()">Add Roles</button>
                
                <div id="popupForm" class="popup-form-container">
                        <div class="popup-form">
                            <span class="close-btn" onclick="closeForm()">&times;</span>
                            <form class="form-horizontal" action="add_role.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description:</label>
                                <input type="text" class="form-control" id="desc" placeholder="Enter Description" name="desc">
                            </div>


                            <label>Permission</label>
                            <div class="form-group-permission">
        

                          <div class="permission-group">
                              <label>Payee</label>
                              <div class="permission-item">
                                  <input type="checkbox" id="add_payee" name="permissions[]" value="add_payee">
                                  <label for="add_payee">Add</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="edit_payee" name="permissions[]" value="edit_payee">
                                  <label for="edit_payee">Edit</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="delete_payee" name="permissions[]" value="delete_payee">
                                  <label for="delete_payee">Delete</label>
                              </div>
                          </div>

                          <div class="permission-group">
                              <label>TEST</label>
                              <div class="permission-item">
                                  <input type="checkbox" id="add_test" name="permissions[]" value="add_test">
                                  <label for="add_test">Add</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="edit_test" name="permissions[]" value="edit_test">
                                  <label for="edit_test">Edit</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="delete_test" name="permissions[]" value="delete_test">
                                  <label for="delete_test">Delete</label>
                              </div>
                          </div>

                          <div class="permission-group">
                              <label>Account</label>
                              <div class="permission-item">
                                  <input type="checkbox" id="add_account" name="permissions[]" value="add_account">
                                  <label for="add_account">Add</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="edit_account" name="permissions[]" value="edit_account">
                                  <label for="edit_account">Edit</label>
                              </div>
                              <div class="permission-item">
                                  <input type="checkbox" id="delete_account" name="permissions[]" value="delete_account">
                                  <label for="delete_account">Delete</label>
                              </div>
                          </div>
                  </div>
                        <div class="form-group">
                            <label class="form-check-label" for="status">Status:</label>
                            <label class="switch">
                                <input type="checkbox" name="status" id="status" value="Active" onchange="this.value=this.checked ? 'Active' : 'Inactive'">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example2" class="display" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Description</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                          <tr>
                                              <td><?php echo htmlspecialchars($row['name']); ?></td>
                                              <td><?php echo htmlspecialchars($row['description']); ?></td>
                                              <td style="
    color: <?php echo ($row['status'] == 'Active') ? '#006400' : '#8B0000'; ?>;
    font-weight: bold;
">
    <?php echo htmlspecialchars($row['status']); ?>
</td>


                                          </tr>
                                      <?php } ?>
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



</body>
</html>