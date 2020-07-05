<!doctype html>
<html lang="pt">
  <head>
    <title>UTODO - Faça você mesmo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
  <body class="container-fluid">
    <!-- <?php session_start() ?> Pega os dados do usuário -->
    <!-- <?php require_once("todoDAO.php"); ?> Classe para uso das querys -->

    <figure class="figure position-absolute text-center mt-3">
      <img src="../layout/logo.png" class="figure-img img-fluid rounded" alt="UTODO- Faça você mesmo!" width="100" height="100">
      <figcaption class="figure-caption text-xs-right">UTODO - Faça você mesmo!</figcaption>
    </figure>
    <div class="grandParentContaniner">
      <div class="parentContainer">
        <div class="card p-2" style="width: 90vw">
        <form action="logout.php" method="POST">
          <button class="btn btn-outline-dark btn-block"><i class="fas fa-sign-out-alt"></i> Sair</button>
        </form>
        <div class="card-body">

          <h4 class="card-title text-center float-center" id="title-login">
            <strong class="">Seus ToDos</strong>
          </h4>
          <hr />
         
            <div id="accordion">

              <?php

                $bd = new BD();

                $result = $bd->buscarToDos($_SESSION['id']);
                $i = 1;

                foreach ($result as $res) {

                  $participam = $bd->buscarTodosUsuariosDoToDo($res['id_todo']);
                  var_dump($res);

                  echo '
                  <div class="card mt-2">
                    <div class="card-header bg-dark text-white" id="heading' . $i . '" 
                        data-toggle="collapse" data-target="#collapse' . $i . '" aria-expanded="false" 
                        aria-controls="collapse' . $i . '" style="cursor:pointer;">
                      <h5 class="mb-0">
                        ToDo '. $i . '
                      </h5>
                    </div>

                    <div id="collapse' . $i . '" class="collapse" aria-labelledby="heading' . $i . '" data-parent="#accordion">
                      <div class="card-body">
                        <div>
                        ' . $res['content'] . '
                          <div class="mt-3 float-right">
                          <form method="POST">
                              <button type="submit" class="btn btn-outline-dark" name="feito"><i class="fa fa-check"></i> Feito</button>
                              <button type="submit" class="btn btn-outline-secondary" name="editar"><i class="fas fa-edit"></i> Editar</button>
                              <button type="submit" class="btn btn-outline-danger"  name="excluir"><i class="fas fa-trash"></i> Excluir</button>
                          </form>
                          </div>
                        </div>
                        ';
                    if (isset($_POST["feito"])){

                    } else if (isset($_POST["editar"])){
                      echo 'editado';
                    } else if (isset($_POST["excluir"])) {
                      if ($bd->excluirToDo($res['id']))
                        echo "<script>alert('ToDo excluído!')</script>";
                      else
                        echo "faio";
                    }

                  foreach ($participam as $p) {
                    echo '
                    <div class="mt-4 badge badge-pill badge-dark" data-toggle="tooltip" title="Participantes">
                    ' . $p['name'] . '
                    </div>
                    ';
                  }
                  
                  echo '
                      </div>
                    </div>
                  </div>';

                  $i++;
                }

              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>