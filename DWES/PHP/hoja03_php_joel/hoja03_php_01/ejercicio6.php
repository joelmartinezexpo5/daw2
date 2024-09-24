<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $fib1 = 0;
       $fib2 = 1;
       echo "$fib1<br>$fib2<br>";
       for ($i = 2; $i < 10; $i++) {
           $fib3 = $fib1 + $fib2;
           echo "$fib3<br>";
           $fib1 = $fib2;
           $fib2 = $fib3;
       }
       echo "<br>"; 
    ?>
</body>
</html>