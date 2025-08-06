<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operadores lógicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>

  <?php
    $x = $_GET['num1'];
    $y = $_GET['num2'];
  

    if($x > $y) {
        echo "$x é maior que $y <br>";
    }
    if($y > $x) {
        echo "$y é maior que $x  <br>";
    }
    if($x < $y) {
        echo "$x é menor que $y  <br>";
      }
    if($y < $x) {
        echo "$y é menor que $x  <br>";
      }
    if($x >= $y) {
        echo "$x é maior que ou igual a $y  <br>";
      }
    if($y <= $x) {
        echo "$y é maior que ou igual a $x  <br>";
      }
    if($x == $y) {
        echo "$x é igual a $y  <br>";
      }
    if($y == $x) {
        echo "$y é igual a $x  <br>";
      }
    if($x != $y) {
        echo "$x é diferente de $y  <br>";
      }
    if($y != $x) {
        echo "$y é diferente de $x  <br>";
      }
    if($x <> $y) {
        echo "$x é diferente de $y  <br>";
      }
    if($y <> $x) {
        echo "$y é diferente de $x  <br>";
      }
    if($x === $y) {
        echo "$x é igual e tem o mesmo tipo de $y <br>";
      }
    if($y === $x) {
        echo "$y é igual e tem o mesmo tipo de $x <br>";
      }
    if($x !== $y) {
        echo "$x não é idêntico a $y e não tem o mesmo tipo <br>";
      }
    if($y !== $x) {
        echo "$x não é idêntico a $y e não tem o mesmo tipo <br>";
      } 

    $res = $x <=> $y;

    if($x <=> $y) {
        echo "$x <=> $y = {$res}<br>";
      }
  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
  </body>
</html>