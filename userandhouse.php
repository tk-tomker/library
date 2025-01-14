<!DOCTYPE html>
<html>
<head>
    
<title>Users</title>
    
</head>
<body>
    <form action="adduserandhouse.php" method="POST">
    First name:<input type="text" name="forename"><br>
    Last name:<input type="text" name="surname"><br>
    House:<select name="house">
            <option value="Grafton">Grafton</option>
            <option value="Sanderson">Sanderson</option>
            <option value="Dryden">Dryden</option>
    Year:<select name="year">
            <option value=9>3rd Form</option>
            <option value=10>4th Form</option>
            <option value=11>5th Form</option>
            <option value=12>L6th Form</option>
            <option value=13>U6th Form</option>
        </select>
    <br>
    <!-- <input type="radio" name="role" value="Pupil" checked> Pupil<br>
    <input type="radio" name="role" value="Teacher"> Teacher<br>
    <input type="radio" name="role" value="Admin"> Admin<br> -->
    <input type="submit" value="Add User">
    <h2>Add House</h2>
    House:<input name="addhouse">
    </form>

  <h2>Current users</h2>
  <?php
    include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM tblpupils");
    $stmt->execute();
    while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["forename"]." ".$row["surname"]."<br>");
        }
  ?>

</body>
</html>