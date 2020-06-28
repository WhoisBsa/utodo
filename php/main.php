<!doctype html>
<html lang="pt">
  <head>
    <title>UTODO - Faça você mesmo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
  <body class="container-fluid">
    <!-- <?php session_start() ?> Pega os dados do usuário -->
    <!-- <?php require_once("todoDAO.php"); ?> Classe para uso das querys -->

    <div class="grandParentContaniner">
      <div class="parentContainer">
        <div class="card p-2" style="width: 90vw">
          <div class="card-body">
            <h4 class="card-title text-center" id="title-login"><strong>Seus ToDos</strong></h4>
            <hr />
            
            <div id="accordion">
              <div class="card mt-2">
                <div class="card-header bg-dark text-white" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <h5 class="mb-0">
                    ToDo 1
                  </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div>
                      Exemplo de texto 1
                      <div class="mt-3 float-right">
                        <button class="btn btn-outline-success" name="feito">Feito</button>
                        <button class="btn btn-outline-primary" name="editar">Editar</button>
                        <button class="btn btn-outline-danger"  name="excluir">Excluir</button>
                      </div>
                    </div>
                    <div class="mt-4 badge badge-pill badge-primary" data-toggle="tooltip" title="Participantes">matheus</div>
                  </div>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header bg-dark text-white" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="mb-0">
                    ToDo 2
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <div>
                      Exemplo de texto 2
                      <div class="mt-3 float-right">
                        <button class="btn btn-outline-success" name="feito">Feito</button>
                        <button class="btn btn-outline-primary" name="editar">Editar</button>
                        <button class="btn btn-outline-danger"  name="excluir">Excluir</button>
                      </div>
                    </div> 
                    <div class="mt-4 badge badge-pill badge-primary" data-toggle="tooltip" title="Participantes">hemilio</div>
                  </div>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header bg-dark text-white" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0">
                    ToDo 3
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                      <div>
                        Exemplo de texto 1
                        <div class="mt-3 float-right">
                          <button class="btn btn-outline-success" name="feito">Feito</button>
                          <button class="btn btn-outline-primary" name="editar">Editar</button>
                          <button class="btn btn-outline-danger"  name="excluir">Excluir</button>
                        </div>
                      </div> 
                    <div class="mt-4 badge badge-pill badge-primary" data-toggle="tooltip" title="Participantes">matheus</div>
                    <div class="mt-4 badge badge-pill badge-primary" data-toggle="tooltip" title="Participantes">hemilio</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted text-center">
            UToDo - Faça Você Mesmo!
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>