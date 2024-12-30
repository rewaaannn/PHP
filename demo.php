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
    <form method="POST" action="<?php $_PHP_SELF ?>">
        <p><label>Name: <input type="text" name="name" required></label> <span style="color:red;">* Name is required</span></p>
        <p><label>Email: <input type="email" name="email" required></label> <span style="color:red;">* Email is required</span></p>
        <p><label>Group #: <input type="text" name="group"></label></p>
        <p><label>Class details: <textarea name="class_details"></textarea></label></p>
        <p>
            Gender: 
            <label><input type="radio" name="gender" value="Female" required> Female</label>
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <span style="color:red;">* Gender is required</span>
        </p>
        <p>
            Select Courses: 
            <select name="courses[]" multiple required>
                <option value="PHP">PHP</option>
                <option value="JavaScript">JavaScript</option>
                <option value="MySQL">MySQL</option>
                <option value="HTML">HTML</option>
            </select>
            <br><span style="color:red;">* Hold CTRL to select multiple courses</span>

        </p>
        <p>
            <label><input type="checkbox" name="agree" required> Agree</label> 
            <span style="color:red;">* You must agree to terms</span>
        </p>
        <button type="submit">Submit</button>
    </form>
    

 
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $group = htmlspecialchars($_POST['group']);
    $class_details = htmlspecialchars($_POST['class_details']);
    $gender = htmlspecialchars($_POST['gender']);
    $courses = isset($_POST['courses']) ? implode(", ", $_POST['courses']) : "None";

    echo "<h1>Your given values are as:</h1>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Group #:</strong> $group</p>";
    echo "<p><strong>Class details:</strong> $class_details</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Your courses are:</strong> $courses</p>";
} else {
    echo "Invalid request method.";
}
?>