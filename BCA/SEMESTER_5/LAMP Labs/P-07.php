<!-- Write a Php program to check whether the given string is
palindrome or not. -->
<!-- Enhanced code | Tested -->

<html>

<head>
   <title>Program Seven</title>
   <!-- Inside <Style> is Optional -->
   <style>
      body {
         border: 5px solid black;
         display: inline-block;
         padding: 15px;
         font-family: "Lucida Sans";
         line-height: 2rem;
      }
   </style>
</head>

<body>
   <form  method="post">
      Enter the string:
      <input type="text" name="string" required>
      <br>
      <input type="submit" value="Submit" name="submit">
      <input type="reset" value="Clear"><br>
   </form>
   <?php 
   if (isset($_POST["submit"])) {
      $theStr = $_POST["string"];
      echo "The string is: $theStr<br>";
      $rep = str_replace(" ", "", $theStr);
      echo "The replaced string is: $rep <br>";
      $lower = strtolower($rep);
      echo "Lower string: $lower <br>";
      $prog = preg_replace( "/[^A-Z, a-z, 0-9\-]/", "", $lower);
      echo "The replaced lower string is: $prog <br>";
      $rev = strrev($prog);
      echo "Reverse is: $rev <br>";
      echo ($prog == $rev) ?  "The given string $theStr is palindrome" : "The given stirng $theStr is not palindrome";
   } 
   ?>
</body>
</html>

<!-- 
output:-
Enter the string: ma%lay alam
Submit

The string is: ma%lay alam
The replaced string is: ma%layalam
Lower string: ma%layalam
The replaced lower string is: malayalam
Reverse is: malayalam
The given string ma%lay alam is palindrome

-->
