<?php
include('includes/conn.php');
?>
<?php include('includes/header.php'); ?>

<body>
    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.php'); ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="card-header">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createModal"
                    style="border-radius: 5px; height: 40px; align-items:center; text-align: center;">
                    <span class="fas fa-plus"></span> Add User
                </a>
            </div>
        </div>
        <div class="card">
        <div class="card-body">
            <div class=" table-responsive">   
                <table id="example" class="display">
                    <colgroup>
                        <col width="5%">
                        <col width="60%">
                        <col width="35%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Fullname</th>
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
                                        <td style='text-align: center; justify-content: center; align-items: center;'>
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
    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>
    <script>
        $(function () {
            $("#example").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src ="vendor/datatables/js/jquery.dataTables.min.js"></script>


</body>