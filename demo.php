<!-- TASK ONE -->
<?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];

echo "<h1 style='text-align: center;'>Application name: PHP class registration</h1>";

echo "<table style='width: 60%; border-collapse: collapse; margin: 20px auto; '>";
echo "<thead>
        <tr>
            <th style='border: 1px solid black; padding: 10px; background-color: #f2f2f2;'>Name</th>
            <th style='border: 1px solid black; padding: 10px; background-color: #f2f2f2;'>Email</th>
            <th style='border: 1px solid black; padding: 10px; background-color: #f2f2f2;'>Track</th>
        </tr>
      </thead>";
echo "<tbody>";

foreach ($students as $student) {
    $style = $student['track'] === 'CMS' ? 'color: red;' : '';
    
    echo "<tr>";
    echo "<td style='border: 1px solid black; padding: 10px; text-align: center; $style'>" . htmlspecialchars($student['name']) . "</td>";
    echo "<td style='border: 1px solid black; padding: 10px; text-align: center; $style'>" . htmlspecialchars($student['email']) . "</td>";
    echo "<td style='border: 1px solid black; padding: 10px; text-align: center;'>" . htmlspecialchars($student['track']) . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>




<!-- TASK TWO -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAST_BIS Class Registration</title>
</head>
<body>
    <h1>Application name: AAST_BIS class registration</h1>
    <?php

    $name = $email = $group = $class_details = $gender = "";
    $courses = [];
    $errors = [];
    $submittedData = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $group = htmlspecialchars($_POST['group']);
        $class_details = htmlspecialchars($_POST['class_details']);
        $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
        $courses = isset($_POST['courses']) ? $_POST['courses'] : [];

       
        if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors['name'] = "Name must contain letters only.";
        }

      
        if (empty($email)) {
            $errors['email'] = "Email is required.";
        }
        if (empty($gender)) {
            $errors['gender'] = "Gender is required.";
        }
        if (empty($courses)) {
            $errors['courses'] = "At least one course must be selected.";
        }
        if (!isset($_POST['agree'])) {
            $errors['agree'] = "You must agree to the terms.";
        }

    
        if (empty($errors)) {

            $submittedData = "<h1>Your given values are as:</h1>";
            $submittedData .= "<p><strong>Name:</strong> $name</p>";
            $submittedData .= "<p><strong>Email:</strong> $email</p>";
            $submittedData .= "<p><strong>Group #:</strong> $group</p>";
            $submittedData .= "<p><strong>Class details:</strong> $class_details</p>";
            $submittedData .= "<p><strong>Gender:</strong> $gender</p>";
            $submittedData .= "<p><strong>Your courses are:</strong> " . implode(", ", $courses) . "</p>";

         
            $name = $email = $group = $class_details = $gender = "";
            $courses = [];
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <p>
            <label>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required></label>
            <span style="color:red;">* <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
        </p>
        <p>
            <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required></label>
            <span style="color:red;">* <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
        </p>
        <p><label>Group #: <input type="text" name="group" value="<?php echo htmlspecialchars($group); ?>"></label></p>
        <p><label>Class details: <textarea name="class_details"><?php echo htmlspecialchars($class_details); ?></textarea></label></p>
        <p>
            Gender: 
            <label><input type="radio" name="gender" value="Female" <?php echo $gender === 'Female' ? 'checked' : ''; ?> required> Female</label>
            <label><input type="radio" name="gender" value="Male" <?php echo $gender === 'Male' ? 'checked' : ''; ?> required> Male</label>
            <span style="color:red;">* <?php echo isset($errors['gender']) ? $errors['gender'] : ''; ?></span>
        </p>
        <p>
            Select Courses: 
            <select name="courses[]" multiple required>
                <option value="PHP" <?php echo in_array("PHP", $courses) ? 'selected' : ''; ?>>PHP</option>
                <option value="JavaScript" <?php echo in_array("JavaScript", $courses) ? 'selected' : ''; ?>>JavaScript</option>
                <option value="MySQL" <?php echo in_array("MySQL", $courses) ? 'selected' : ''; ?>>MySQL</option>
                <option value="HTML" <?php echo in_array("HTML", $courses) ? 'selected' : ''; ?>>HTML</option>
            </select>
            <br><span style="color:red;">* <?php echo isset($errors['courses']) ? $errors['courses'] : ''; ?></span>
        </p>
        <p>
            <label><input type="checkbox" name="agree" <?php echo isset($_POST['agree']) ? 'checked' : ''; ?> required> Agree</label> 
            <span style="color:red;">* <?php echo isset($errors['agree']) ? $errors['agree'] : ''; ?></span>
        </p>
        <button type="submit">Submit</button>
    </form>


    <?php
    if (!empty($submittedData)) {
        echo $submittedData;
    }
    ?>
</body>
</html>