<?php 
require 'db.php';


$today = date('Y-m-d');

$sql = "select a.checkin_time, e.name, e.department
        from attendance as a
        join employees as e on a.employee_id = e.id
        where DATE(a.checkin_time) = ?";

        
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

// while ($row = $result->fetch_assoc()) {
//     echo "Checkin_Time: " . $row['checkin_time'] . ", Name: " . $row['name'] . ", Department: " . $row['department'] . "<br>";
// }
$stmt->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Today's Check-ins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2> Today's Check-ins</h2>
        <table class ="table table-bordered">
            <thead class ='table-dark'>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Check-in Time</th>
                </tr>
                </thead>
            <tbody>
                <?php if ($result ->num_rows > 0): ?>
                    <?php while ($row= $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['department']); ?></td>
                            <td><?php echo htmlspecialchars($row['checkin_time']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                        <tr><td colspan="3" class="text-center">No check-ins today.</td></tr>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
