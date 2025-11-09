<!-- <!DOCTYPE html>
<html>
<head>
    <title>Employee Check-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Record Check-in</h2>
    <form id="checkinForm" method="post" action="check_in.php" novalidate>
        <div class="mb-3">
            <label for="employee_id" class="form-label">Select Employee:</label>
            <select class="form-select" id="employee_id" name="employee_id" required>
                <option value="">-- Select --</option>
            </select>
            <div class="invalid-feedback">Please select an employee.</div>
        </div>
        <button type="submit" class="btn btn-primary">Check In</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
(() => {
    'use strict'
    const form = document.getElementById('checkinForm');
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }
        form.classList.add('was-validated')
    }, false)
})();
</script>
</body>
</html> -->

<?php
require 'db.php';

$sql = "SELECT id, name FROM employees ORDER BY name ASC";
$result = $conn->query($sql);

$employees = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
} else {
    die("Error fetching employees: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Check-in</title>
</head>
<body>
    <form method="POST" action="checkin_process.php">
        <label for="employee_id">Select Employee:</label>
        <select name="employee_id" id="employee_id" required>
            <option value="">-- Select Employee --</option>
            <?php foreach ($employees as $employee): ?>
                <option value="<?php echo $employee['id']; ?>">
                    <?php echo htmlspecialchars($employee['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Check In</button>
    </form>
</body>
</html>
