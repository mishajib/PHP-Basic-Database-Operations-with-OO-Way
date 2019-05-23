<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
table{
  width: 100%;
}
</style>
<?php
#Create Connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "php_connection";

$conn = new mysqli($host, $user, $pass, $db);

#connection test
if ($conn->connect_error) {
  die("Can't connect to the database".$conn->connect_error);
  exit();
}else{
  echo "Database Connection Successful.<br>";
}

// Create database
// $sql = "CREATE DATABASE userlist";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
//
// if ($conn->query($sql)) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

# Data Insert

// $sql = "INSERT INTO userlist(firstName, lastName, email) VALUES('Arnold', 'Khan', 'arnold@gmail.com')";
//
// # Data Insertion Check
// if ($conn->query($sql)) {
//   echo "New record inserted.".$conn->insert_id;
// }else {
//   echo "Failed".$sql. "<br>".$conn->error;
// }

#Multiple Data Insert
// $sql = "INSERT INTO userlist (firstName, lastName, email) VALUES ('Tamjid', 'Hasan', 'tamjid@example.com');";
// $sql .= "INSERT INTO userlist (firstName, lastName, email) VALUES ('Azizur', 'Rahman', 'aziz@example.com');";
// $sql .= "INSERT INTO userlist (firstName, lastName, email) VALUES ('Saleh', 'Ahammed', 'saleh@example.com')";
// #Data Insertion check
// if ($conn->multi_query($sql) === TRUE) {
//   echo "New record inserted.";
// }else {
//   echo "Failed".$sql. "<br>".$conn->error;
// }

# Prepare Statement & Bind
# $query = "INSERT INTO userlist (firstName, lastName, email) VALUES (?, ?, ?)";
# $stmt = $conn->prepare($query);
# The argument may be one of four types:
// i - integer
// d - double
// s - string
// b - BLOB
# $stmt->bind_param("sss", $firstName, $lastName, $email);

// set parameters and execute
/*
$firstName = "Mijanur";
$lastName = "Rahman";
$email = "mijanur@gmail.com";
$stmt->execute();
echo "New record inserted.";
$stmt->close();
*/



# Update Data into mysql
// $query = "UPDATE userlist SET lastName='Khan Js' WHERE id=3";
// # Check Updation
// if ($conn->query($query)) {
//   echo "Update Record Successfully.";
// }else{
//   echo "Error updating record: " . $conn->error;
// }

#Delete Record from mysql
// $query = "DELETE FROM userlist WHERE id=2";
// if ($conn->query($query)) {
//   echo "Record deleted successfully";
// }else {
//   echo "Error deleting record: " . $conn->error;
// }

// Mysql Limit Data
// this two query return same result
// $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
// $sql = "SELECT * FROM Orders LIMIT 15, 10";

# Select Data From Database
$sql = "SELECT * FROM userlist";

# Data store into variable from getting value
$result = $conn->query($sql);

#check database value is available or not
?>
<table>
  <tr>
    <td>ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Full Name</td>
    <td>Email</td>
  </tr>

<?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['firstName']; ?></td>
      <td><?php echo $row['lastName']; ?></td>
      <td><?php echo $row['firstName'].' '.$row['lastName']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <?php
  }
}
?>
</table>
<?php
# Connection Disable/ disconnect
$conn->close();
?>
