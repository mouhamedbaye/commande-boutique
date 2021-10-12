<?php
if(isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <img class="navbar-brand " src="img/capture.png" width="150" alt="">
      
      
      <div class="collapse navbar-collapse" id="navbarColor01">
        <h1 class="card-body text-center btn-secondary">BIENVENUE dans Entreprise MBD</h1>
       
        
      </div>
    </nav>
    <!-- -----------------------------------------------------------NAV BAR -->
    <!-- -----------------------------------------------------------CONTAINER -->
    <div class="container">
      
        <div class="row">
        <img src="img/capture.png" width="290" class="foto" alt="">
            <div class="col-md-4 my-5 offset-4">
            <?php if (isset($arrayErrors['erreurConnexion'])): ?>
                    <div class="alert alert-Danger" role="alert">
                        <strong><?php echo isset($arrayErrors['erreurConnexion']) ? $arrayErrors['erreurConnexion'] : ''?></strong>
                    </div>
                    <?php endif; ?>
                <div class="">
        
                    <form method="POST" action="<?=WEB_ROUTE?>  " enctype="multipart/form-data">
                        <input type="hidden" name="controlleurs" value="security"/>
                        <input type="hidden" name="action" value="inscription"/>
                        <div class="card-body text-center ">
                          <p class="badge-light">Pour acceder a mes fonctionnalité</p>
                          <div class="form-group">
                                <input type="text" id="prenom" name="prenom_user" class="form-control" placeholder="Entrer votre Prenom">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['prenom_user']) ? $arrayErrors['prenom_user'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name" name="nom_user" class="form-control" placeholder="Entrer votre Nom">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['nom_user']) ? $arrayErrors['nom_user'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" id="login" name="login" class="form-control" placeholder="Entrer votre login">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['login']) ? $arrayErrors['login'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Entrer votre password">
                                <label for="password"></label>
                                <small><?php echo isset($arrayErrors['password']) ? $arrayErrors['password'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="password" id="confpassword" name="confpassword" class="form-control" placeholder="Confirmer votre password">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['confpassword']) ? $arrayErrors['confpassword'] :''; ?></small>
                            </div>
                            <div class="col">
                        <label for="avatar" >image</label>
                        <input type="file" name="image" value="none">
                        </div>
                            <div class="card-foter text-right">
                                <button type="submit" name ="inscription" class="btn btn-dark btn-sm" style="width: 140px;">S'inscrire</button>
                            </div>
                        </div>
                        
                    </form>
        
                </div>
        
            </div>
        </div>
    </div>
    <style>
      body {
color:black;
background-color:white;

background-repeat:no-repeat;
}
      .foto{
        margin-top:15px;
        height: 680px;
        margin-left:80px;
      }
      form{
        box-shadow:5px 4px 5px 2px  ;
      }
    </style>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>