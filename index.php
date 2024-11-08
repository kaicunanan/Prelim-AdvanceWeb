<?php
// Initialize variables for the student information and grades
$studentData = [];
$grades = [];
$averageGrade = null;
$gradeStatus = ''; // Variable to hold grade status (Passed/Failed)
$colorClass = '';  // Variable to hold CSS class for color

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Student-Btn'])) {
        // Collect student information from the first form
        $studentData['first_name'] = $_POST['first_name'];
        $studentData['last_name'] = $_POST['last_name'];
        $studentData['age'] = $_POST['age'];
        $studentData['gender'] = $_POST['gender'];
        $studentData['course'] = $_POST['course'];
        $studentData['email'] = $_POST['email'];
    }

    if (isset($_POST['GradeBtn'])) {
        // Collect grade information if the grades form is submitted
        $grades['prelim'] = $_POST['prelimInput'];
        $grades['midterm'] = $_POST['midtermInput'];
        $grades['final'] = $_POST['finalInput'];

        // Calculate average grade
        $averageGrade = ($grades['prelim'] + $grades['midterm'] + $grades['final']) / 3;

        // Determine the grade status based on the average
        if ($averageGrade < 75) {
            $gradeStatus = 'Failed';
            $colorClass = 'text-danger';  // Red color for Failed
        } else {
            $gradeStatus = 'Passed';
            $colorClass = 'text-success';  // Green color for Passed
        }

        // Collect student data back from the hidden fields in the grade form
        $studentData['first_name'] = $_POST['first_name'];
        $studentData['last_name'] = $_POST['last_name'];
        $studentData['age'] = $_POST['age'];
        $studentData['gender'] = $_POST['gender'];
        $studentData['course'] = $_POST['course'];
        $studentData['email'] = $_POST['email'];
    }
}
?>
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
        <h2 class="text-center">Student Enrollment and Grade Processing Systems</h2>

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

        <!-- Prelim Form  -->
        <?php if (!empty($studentData) && empty($grades)): ?>
            <div id="nextForm">
                <h3>Enter Grades</h3>
                <form method="post">
                    <input type="hidden" name="first_name" value="<?php echo htmlspecialchars($studentData['first_name']); ?>">
                    <input type="hidden" name="last_name" value="<?php echo htmlspecialchars($studentData['last_name']); ?>">
                    <input type="hidden" name="age" value="<?php echo htmlspecialchars($studentData['age']); ?>">
                    <input type="hidden" name="gender" value="<?php echo htmlspecialchars($studentData['gender']); ?>">
                    <input type="hidden" name="course" value="<?php echo htmlspecialchars($studentData['course']); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($studentData['email']); ?>">

                    <div class="form-group">
                        <label for="prelimInput">Prelim:</label>
                        <input type="number" class="form-control" name="prelimInput" id="prelimInput" required>
                    </div>
                    <div class="form-group">
                        <label for="midtermInput">Midterm:</label>
                        <input type="number" class="form-control" name="midtermInput" id="midtermInput" required>
                    </div>
                    <div class="form-group">
                        <label for="finalInput">Final:</label>
                        <input type="number" class="form-control" name="finalInput" id="finalInput" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="GradeBtn">Submit Grades</button>
                </form>
            </div>
        <?php endif; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>