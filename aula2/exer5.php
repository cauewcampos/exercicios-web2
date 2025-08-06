<!DOCTYPE html>
<html>
<head>
  <title>Quadrados</title>
  <style>
    table {
      border-collapse: collapse;
      margin-top: 4rem;
      border-top: 1px solid black;
      border-bottom: 1px solid black;
    }
    #titulos{
      border-bottom: 1px solid black;
    }
    th, td {
      padding: 8px;
    }
  </style>
</head>
<body>
  <table>
    <tr id="titulos">
      <th>Tempo</th>
      <th>Montante</th>
      <th>Juro</th>
    </tr>
    <?php
    $capital = $_GET['capital'];
    $taxa = $_GET['taxa'];
    $tempo = $_GET['tempo'];

    $x = 0;

    while ($x <= $tempo):
        $juros = $capital * ($taxa / 100) * $x;
        $montante = $capital + $juros;
    ?>
    <tr>
      <td><?= $x ?></td>
      <td><?= $montante ?></td>
      <td><?= $juros ?></td>
    </tr>
    <?php
        $x++;
    endwhile;
    ?>
  </table>
</body>
</html>
