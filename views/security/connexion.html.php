<?php
if(isset($_SESSION['arrayError'])){
  $arrayErrors = $_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}

require(ROUTE_DIR.'views/inc/header.html.php')
?>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <img class="navbar-brand " src="img/capture.png" width="150" alt="">
      
      
      <div class="collapse navbar-collapse" id="navbarColor01">
        <h1 class="card-body text-center btn-secondary"></h1>
       
        <ul class="navbar-nav mr-10 ml-4">
       
          <li class="nav-item dropdown">
            <div class="btn btn-secondary"><a 
              href="<?= WEB_ROUTE. '.?controlleurs=security&views=inscription'?>">S'inscrire</a
            ></div>
          </li>
        
        </ul>
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
        
                    <form method="POST" action="<?=WEB_ROUTE?>">
                        <input type="hidden" name="controlleurs" value="security"/>
                        <input type="hidden" name="action" value="connexion"/>
                        <div class="card-body text-center ">
                          <p class="badge-light">Pour acceder a mes fonctionnalité</p>
                            <div class="form-group">
                              <label for="username" >Email address</label>
                              <input type="text" class="form-control " id="login" name="login" placeholder="Login">
                              <small  class="form-text text-danger">
                                <?php echo isset($arrayError['login']) ? $arrayError['login'] : " "  ?>
                              </small>
                            </div>
                            <div class="form-group">
                              <label for="password" class="form-label mt-4">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                              <small  class="form-text text-danger">
                                <?php echo isset($arrayError['password']) ? $arrayError['password'] : " "  ?>
                              </small>
                            </div>
        
                            <div class="card-foter text-right">
                                <button type="submit" value ="connexion" class="btn btn-dark btn-sm" style="width: 140px;">Connexion</button>
                            </div>
        
                        </div>
                        
                    </form>
        
                </div>
        
            </div>
        </div>
    </div>
    
<!--   Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 
<style>
      body {
color:black;
background-color:white;
background-image:url(img/image_de_fond.png);
background-repeat:no-repeat;
}
      .foto{
        margin-top:15px;
        height: 680px;
        margin-left:80px;
      }
      form{
        box-shadow: 2px 3px 10px ;
      }
    </style>