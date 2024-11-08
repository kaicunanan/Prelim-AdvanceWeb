<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment and Grade Processing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 30px;
        }

        .grade-section {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Student Enrollment and Grade Processing System</h2>

  <!-- Student Enrollment Form -->
<?php if (empty($studentData) || isset($_POST['GradeBtn'])): ?>
<h3>Student Enrollment Form</h3>
<form method="post">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="female">Female</label>
        </div>
    </div>

    <div class="form-group">
        <label for="course">Course:</label>
        <select class="form-control" id="course" name="course" required>
            <option value="BSIT">BSIT</option>
            <option value="BSBA">BSBA</option>
            <option value="BSCrim">BSCrim</option>
            <option value="BSEduc">BSEduc</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <button type="submit" class="btn btn-primary" name="Student-Btn">Submit Student Information</button>
</form>
<?php endif; ?>


    
</body>
</html>