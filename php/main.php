<!doctype html>
<html lang="pt">

<head>
  <title>UTODO - Faça você mesmo</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <body class="container-fluid">
    <!-- <?php session_start() ?> Pega os dados do usuário -->
    <!-- <?php require_once("todoDAO.php"); ?> Classe para uso das querys -->

    <figure class="figure position-absolute text-center mt-2">
      <img src="../layout/logo.png" class="figure-img img-fluid rounded" alt="UTODO - Faça você mesmo!" width="100"
        height="100">
      <figcaption class="figure-caption text-xs-center">UTODO - Faça você mesmo!</figcaption>
    </figure>
    <div class="grandParentContaniner">
      <div class="parentContainer">
        <div class="card p-2 mt-3 mb-3" style="width: 90vw">
          <form action="logout.php" method="POST">
            <button class="btn btn-outline-dark btn-block"><i class="fas fa-sign-out-alt"></i> Sair</button>
          </form>
          <div class="card-body p-1">

            <h4 class="card-title text-center float-center mt-2" id="title-login">
              <strong class=""><i class="fas fa-th-list"></i> Seus ToDos</strong>
            </h4>
            <hr />

            <div id="accordion">

              <div class="card mt-2">
                <div class="card-header bg-dark text-white" id="add" data-toggle="collapse" data-target="#collapseadd"
                  aria-expanded="false" aria-controls="collapseadd" style="cursor:pointer;">
                  <h5 class="mb-0">
                    <i class="fa fa-plus" aria-hidden="true"></i> Adicionar
                  </h5>
                </div>

                <div id="collapseadd" class="collapse" aria-labelledby="headingadd" data-parent="#accordion">
                  <div class="card-body">
                    <div>
                      <form method="POST">
                        <div class="form-group">
                          <label for=""><i class="fa fa-users" aria-hidden="true"></i> Participantes</label><br>
                          <?php
                              $bd = new BD();
                              $usuarios = $bd->buscarTodosUsuarios();

                              foreach($usuarios as $row) {
                                if ($_SESSION['login'] === $row['name'])
                                  echo '<input class="mr-1" type="checkbox" id="'. $row["id"] .'" name="'. $row["name"] .'" value="'. $row["id"] .' " checked>';
                                else
                                  echo '<input class="mr-1" type="checkbox" id="'. $row["id"] .'" name="'. $row["name"] .'" value="'. $row["id"] .'">';
                                echo '<label class="mr-3 border-right border-dark" for="'. $row["name"] .'">'.  ucfirst($row["name"]) .'&nbsp;&nbsp;&nbsp;</label>';
                              }
                            ?>
                        </div>
                        <div class="form-group">
                          <label for="" ><i class="fas fa-pencil-alt"></i> Conteúdo</label>
                          <input type="text" name="content" id="login" class="form-control">
                        </div>
                        <button type="submit" name='btnadd' class="btn btn-primary">ADD</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <hr />

              <?php

                $bd = new BD();
                $participantes = [];

                if (isset($_POST["btnadd"])){
                  if (!$_POST['content']){
                    $message = "Preencha todos os campos!";
                    echo "<script>alert('$message')</script>";
                  } else {
                    foreach($_POST as $key => $value){
                      if ($key != "content"){
                        array_push($participantes, $value);
                      }
                    }
                    $bd->inserirToDo($participantes, $_POST['content']);
                  }
                }

                $result = $bd->buscarToDos($_SESSION['id']);
                $i = 1;

                foreach ($result as $res) {

                  $participam = $bd->buscarTodosUsuariosDoToDo($res['id_todo']);

                  if($res['status']==0){
                    echo '
                    <div class="card mt-2">
                      <div class="card-header bg-dark text-white" id="heading' . $i . '" 
                          data-toggle="collapse" data-target="#collapse' . $i . '" aria-expanded="false" 
                          aria-controls="collapse' . $i . '" style="cursor:pointer;">
                        <h5 class="mb-0">
                          ToDo '. $i . '
                        </h5>
                      </div>';
                  } else {
                    echo '
                  <div class="card mt-2">
                    <div class="card-header bg-success text-white" id="heading' . $i . '" 
                        data-toggle="collapse" data-target="#collapse' . $i . '" aria-expanded="false" 
                        aria-controls="collapse' . $i . '" style="cursor:pointer;">
                      <h5 class="mb-0">
                        ToDo '. $i . '
                      </h5>
                    </div>';
                  }
                  

                   echo '<div id="collapse' . $i . '" class="collapse" aria-labelledby="heading' . $i . '" data-parent="#accordion">
                      <div class="card-body">
                        <div>
                        ' . $res['content'] . '
                          <div class="mt-3 float-right">
                          <form action="controllerToDo.php" method="POST">
                            <button type="submit" class="btn btn-outline-dark" name="feito" value="'. $res["id_todo"] .'"><i class="fa fa-check"></i> Feito</button>
                            <button type="submit" class="btn btn-outline-secondary" name="editar" value="'. $res["id_todo"] .'"><i class="fas fa-edit"></i> Editar</button>
                            <button type="submit" class="btn btn-outline-danger"  name="excluir" value="'. $res["id_todo"] .'"><i class="fas fa-trash"></i> Excluir</button>
                          </form>
                          </div>
                        </div>
                        ';

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

                echo '
                  <hr />
                  <div class="row ml-1">
                    <div class="col-xs-1-6">
                      <div class="form-group mr-2">
                        <form method="POST">
                          <button type="submit" class="btn btn-outline-dark" name="galeria">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            Visualizar Galeria
                          </button>
                        </form>
                      </div>
                    </div>

                    <div class="col-xs-1-6">
                      <div class="form-group">
                        <form action="controllerToDo.php" method="POST">
                          <button type="submit" class="btn btn-outline-dark" name="download">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Download ToDo
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                  ';

                if (isset($_POST["galeria"])){
                  echo "<script>window.location.replace('../layout/galery/index.html');</script>";
                }

              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </body>

</html>