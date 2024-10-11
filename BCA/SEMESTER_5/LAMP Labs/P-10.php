<!-- Write a Php script to insert employee name and age to the
database and display the records in table format. -->

<!-- Connection.php -->
<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "mydb");
if ($con) {
    echo "Connection is established<br>";
} else {
    die("Connection not established<br>" . mysqli_error());
}
?>

<!-- Insert.php -->
<html>
   <body>
      <a href="view.php">View</a> <br><br>
      <?php include "connection.php"; ?>
      <form method="post">
         <table border="1">
            <tr>
               <td>Enter Name:</td>
               <td>
                  <input type="text" name="name" required>
                  
               </td>
            </tr>
            <tr>
               <td>Enter Age:</td>
               <td>
                  <input type="number" name="age" required>
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <input type="submit" value="Insert" name="ins">
               </td>
            </tr>
         </table>
      </form>
      <?php if (isset($_POST["ins"])) {
         $name = $_POST["name"];
         $age = $_POST["age"];
         $sql = "insert into details values('$name', '$age')";
         $res = mysqli_query($con, $sql);
         if ($res) {
             echo "Details is inserted";
         } else {
             echo "Details is not inserted";
         }
         } ?>
   </body>
</html>

<!-- View.php -->
<html>
   <head>
      <title>View</title>
   </head>
   <body>
      <a href="insert.php">Insert new record</a><br><br>
      <table border=1>
         <?php
         include "connection.php";
         $count = 0;
         $sql = "select * from details order by name desc";
         $res = mysqli_query($con, $sql);
         echo "<tr><td>";
         echo "NAME";
         echo "</td><td>";
         echo "AGE";
         echo "</td></tr>";
         while ($row = mysqli_fetch_assoc($res)) {
             echo "<tr><td>";
             echo $row["Name"];
             echo "</td><td>";
             echo $row["Age"];
             echo "</td></tr>";
             $count++;
         }
         if ($count == 0) {
             echo "No records in the table.";
         }
         ?>
      </table>
   </body>
</html>


<!--
 output:- 
   insert.php

View

Connection is established
Enter Name:	hello
Enter Age:	20
|insert|

view.php

Insert new record

connection is established
Name 			Age
hello 		20

-->
