<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Employee Search</title> 
<link rel="stylesheet" href="style.css"> 
</head> 
<body> 
<?php 
// Create an indexed array of employee names 
$employee_names = array( 
"Vineet", 
"Pratik", 
"Abhi", 
"Kunal", 
"Omkar", 
"Aniket", 
"shrushti", 
"khushi", 
"Daniel", 
"Emma", 
"Matthew", 
"Ava", 
"Christopher", 
"Mia", 
"Andrew", 
"Ella", 
"James", 
"Grace", 
"Logan", 
"Lily" 
); 
// Check if a name exists in the array 
if (isset($_GET['search_name'])) { 
$search_name = $_GET['search_name']; 
$result = array_search($search_name, $employee_names); 
if ($result !== false) { 
echo "<p>{$search_name} found in the list of employees at index $result.</p>"; 
} else { 
echo "<p>{$search_name} is not found in the list of employees.</p>"; 
} 
} 
// Function to add a new employee to the array 
function addEmployee($name, &$employees) { 
array_push($employees, $name); 
} 
// Function to remove an employee from the array 
function removeEmployee($name, &$employees) { 
$index = array_search($name, $employees); 
if ($index !== false) { 
unset($employees[$index]); 
} 
} 
// Add new employee if form submitted 
if (isset($_POST['add_employee'])) { 
$new_employee = $_POST['new_employee']; 
addEmployee($new_employee, $employee_names); 
} 
// Remove employee if form submitted 
if (isset($_POST['delete_employee'])) { 
$employee_to_delete = $_POST['delete_employee_name']; 
removeEmployee($employee_to_delete, $employee_names); 
} 
sort($employee_names); 
echo "<table border> 
<tr> 
<th>Employee Name</th> 
</tr>"; 
foreach($employee_names as $name) { 
echo "<tr><td>$name</td></tr>"; 
} 
echo "</table>"; 
?> 
<!-- HTML form for user input--> 
<form method="GET" action=""> 
<label for="search_name">Enter employee name:</label> 
<input type="text" name="search_name" id="search_name" required> 
<button type="submit">Search</button> 
</form> 
<!-- Form to add new employee --> 
<form method="POST" action=""> 
<label for="new_employee">Enter new employee name:</label> 
<input type="text" name="new_employee" id="new_employee" required> 
<button type="submit" name="add_employee">Add Employee</button> 
</form> 
<!-- Form to delete employee --> 
<form method="POST" action=""> 
<label for="delete_employee_name">Enter employee name to delete:</label> 
<input type="text" name="delete_employee_name" id="delete_employee_name" required> 
<button type="submit" name="delete_employee">Delete Employee</button> 
</form></body> 
</html>