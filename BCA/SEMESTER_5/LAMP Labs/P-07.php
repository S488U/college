<!-- Write a Php program to check whether the given string is
palindrome or not. -->

<html>

<head>
   <title>Program Seven</title>
   <style>
      body {
         /* this is optional css */
         border: 5px solid black;
         display: inline-block;
         padding: 15px;
         font-family: "Lucida Sans";
         line-height: 2rem;
      }
   </style>
</head>

<body>
   <form action="" method="post">
      Enter the string:
      <input type="text" name="string" required>
      <br><br>
      <input type="submit" value="Submit" name="submit">
      <input type="reset" value="Clear"><br><br>
   </form>
   <?php if (isset($_POST["submit"])) {
      $theStr = $_POST["string"];
      echo "The string is: $theStr<br>";
      $rep = str_replace(" ", "", $theStr);
      echo "The replaced string is: " . $rep . "<br>";
      $lower = strtolower($rep);
      echo "Lower string: " . $lower . "<br>";
      $prog = preg_replace("/[^A-Z, a-z, 0-9\-]/", "", $lower); //regular expression
      echo "The replaced lower string is: " . $prog . "<br>";
      $rev = strrev($prog);
      echo "Reverse is: " . $rev . "<br>";
      if ($prog == $rev) {
         echo "The given string $theStr is palindrome";
      } else {
         echo "The given stirng $theStr is not palindrome";
      }
   } ?>
</body>

</html>