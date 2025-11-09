<?php
require 'db.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
$employee_id = trim(  $_POST['employee_id'] ?? '');
        if ($employee_id === '') {
            $msg = '<div class="alert alert-danger">Please select an employee.</div>';
        } else {
            $today = date('Y-m-d');
            $stmt = $conn -> prepare ('select * from attendance where employee_id = ? and date(checkin_time) = ?');
            $stmt -> bind_param("is", $employee_id, $today);
            $stmt->execute();
            $result = $stmt->get_result();




            //1
                if ($result -> num_rows == 0){
                        $stmt -> close();

                        $stmt = $conn -> prepare("insert into attendance (employee_id, checkin_time) values (?, now())");
                        $stmt -> bind_param("i", $employee_id);
                                //2
                                if ($stmt -> execute ()) {
                                    $msg = '<div class="alert alert-success">Checked-in successfully .</div>';
                                } else {
                                    $msg = '<div class="alert alert-danger"> Error Try Again , pleasee .</div>';
                                }
                    

                    } else {
                        $msg = "<div class='alert alert-warning'>You've already checked in today.</div>";
                    }
            $stmt->close();
                    }

}

$employees = $conn ->query(("SELECT id, name FROM employees ORDER BY name ASC"));

?>








<!DOCTYPE html>
<html lang="en">    
<head>
    <title>Employee Check-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee Check-in</h2>
        <?php if ($msg) echo $msg; ?>
        <form id="checkinForm" method="post" action="" novalidate>
            <div class="mb-3">
                <label for="employee_id" class="form-label">Select Employee:</label>
                <select class="form-select" id="employee_id" name="employee_id" required>
                    <option value="">-- Select --</option>
                    <?php while ($row = $employees->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                    <?php endwhile; ?>
                </select>
                <div class="invalid-feedback">Please select an employee.</div>
            </div>
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>

    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (() => {
        'use strict';
        const form= document.getElementById('checkinForm');
        form.addEventListener('submit' , event => {
            if (! form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false )
    }
    )();
    

</script>



</body>

</html>





