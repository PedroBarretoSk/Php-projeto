<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>CRUD em PHP!</title>
  </head>
  <body>
  <?php require_once 'save.php';?>
  <?php require_once 'update.php';?>
  <?php require_once 'delete.php';?>
  <?php if(isset($_SESSION['message'])):?>
    <div class = "alert alert-<?=$_SESSION['msg_type']?>">
      <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);      
      ?>
    </div>
  <?php endif ?>
  

  <div class="container">
  <?php 
    $mysqli = new mysqli('localhost','root','','dswcrud_bd') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error); 
  ?>

<title> cadastro </title>
  <div class="row justify-content-center">
    <form action="save.php" method="POST">
        <div class="form-control">
            <label>Nome</label>
            <input type="text" name="name" value="Digite seu nome">        
            <label>Cidade</label>
            <input type="text" name="location" value="Digite sua cidade">        
        <button type="submit" class="btn btn-primary" name="save">Salvar dados</button>
        </div>
    </form>
  </div>
  <!-- Aqui vai ser criada a grid -->
  <div class="row justify-content-center">
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Cidade</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <?php while($row = $result->fetch_assoc()): ?>
        <form action="update.php" method="post">
          <tr>
            <input type="text" name ="id" hidden value="<?= $row['id']?>">
            <td><input type="text" name ="name" value="<?= $row['name']?>"></td>
            <td><input type="text" name ="location" value="<?= $row['location']?>"></td>
            <td>
              <button type="submit" class="btn btn-info" name="update">Editar</button>
              <a href="delete.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Excluir</a>
            </td>

          </tr>
        </form>
      <?php endwhile;?>
    </table>
  </div>
  </div>    
  </body>
</html>