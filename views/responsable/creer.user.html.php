<?php
$roles=find_all_role();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="http://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-a11y="true"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=WEB_ROUTE. "css/menu.css"?> ">
    <link rel="stylesheet" href="<?=WEB_ROUTE. "css/ajout.user.css"?> ">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <img class="navbar-brand " src="img/capture.png" width="150" alt="">
      
      
      <div class="collapse navbar-collapse" id="navbarColor01">
        <h1 class="card-body text-center btn-secondary"></h1>
       
        <ul class="navbar-nav mr-10 ml-4">
        <?php if (est_connect()): ?>
          <li class="nav-item dropdown">
            <div class="btn btn-secondary"><a 
              href="<?= WEB_ROUTE. '.?controlleurs=security&views=connexion'?>">Deconnexion</a
            ></div>
          </li>
        <?php endif ?>
        </ul>
      </div>
    </nav>

    <header class="header text-center">
    <?php if (est_responsable_stock()): ?>
                    <div class="card">
                        <img class="" src="<?=$_SESSION ['userConnect']['image']?>" alt=""/> 
                        <p>Aaa Bbb</p>
                    </div>
                    <?php endif ?>
                   
        <ul class="nav flex-column">
            <li class="menu nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="<?=WEB_ROUTE.'?controlleurs=responsable&views=ajout.user'?>">Liste utilisateurs <i class="pluss fas fa-users"></i></i></a>
            </li>
            <li class="menu nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="<?= WEB_ROUTE.'?controlleurs=responsable&views=liste.produit' ?>">Liste Produits <i class="cre fab fa-product-hunt"></i></a>
            </li>   
         
            <li class="menu nav-item">
                <a class="nav-link " href="<?= WEB_ROUTE.'?controlleurs=responsable&views=ajout.livreur' ?>">Ajout livreurs <i class="plusss fas fa-truck-loading"></i> </a>
            </li> 
            <li class="menu nav-item">
                <a class="nav-link " href="<?= WEB_ROUTE.'?controlleurs=responsable&views=liste.livreur' ?>">Liste livreurs <i class="plusss fas fa-truck-loading"></i> </a>
            </li>    
            <li class="menu nav-item">
                <a class="nav-link " href="<?= WEB_ROUTE.'?controlleurs=responsable&views=ajoutproduit' ?>">ajout produit <i class="plusss fas fa-shopping-cart"></i> </a>
            </li>         
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Achat</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= WEB_ROUTE .'?controlleurs=commande&views=ajoutcommande' ?>">Ajouter Commande<i class="fas fa-shopping-cart"></i></a>
                    <a class="dropdown-item" href="<?= WEB_ROUTE . '?controlleurs=commande&views=liste.commande' ?>">Liste Commande<i class="far fa-list-alt"></i></a>
                    <a class="dropdown-item" href="<?= WEB_ROUTE . '?controlleurs=versement&views=ajout_versement' ?>">Ajout Versement<i class="fas fa-file-invoice"></i></a>
                    <a class="dropdown-item" href="<?= WEB_ROUTE . '?controlleurs=versement&views=liste.versement' ?>">Liste Versement<i class="fas fa-file-invoice"></i></a>                </div>
            </li>
        </ul>
    </header>
    <div class="appell col-md-6">
    <form method="POST" action="<?=WEB_ROUTE?>" enctype="multipart/form-data">
                        <input type="hidden" name="controlleurs" value="responsable"/>
                        <input type="hidden" name="action" value="ajout.user"/>
                        <div class="card-body text-center ">
                          <p class="badge-light">Ajouter Nouveau utilisateur</p>
                          <div class="form-group">
                                <input type="text" id="prenom" name="prenom_user" class="form-control w-50" placeholder="Entrer votre Prenom">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['prenom_user']) ? $arrayErrors['prenom_user'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name"  name="nom_user" class="form-control w-50" placeholder="Entrer votre Nom">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['nom_user']) ? $arrayErrors['nom_user'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="text" id="login" name="login" class="form-control w-50" placeholder="Entrer votre login">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['login']) ? $arrayErrors['login'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control w-50" placeholder="Entrer votre password">
                                <label for="password"></label>
                                <small><?php echo isset($arrayErrors['password']) ? $arrayErrors['password'] :''; ?></small>
                            </div>
                            <div class="form-group">
                                <input type="password" id="confpassword" name="confpassword" class="form-control w-50" placeholder="Confirmer votre password">
                                <label for="username"></label>
                                <small><?php echo isset($arrayErrors['confpassword']) ? $arrayErrors['confpassword'] :''; ?></small>
                            </div>
                            
                                <div class="form-group">
                                  <label for="">Role</label>
                                 
                                  <select class="form-control" name="role" id="">
                                  <?php foreach ($roles as $role):?>
                                    <option value="<?=$role['id_role']?>"><?=$role['nom_role']?></option>
                                    <?php endforeach?>
                                  </select>
                                </div>
                                <div class="col">
                        <label for="avatar" >image</label>
                        <input type="file" name="image" value="none">
                        </div>
        
                            <div class="ins card-foter text-right">
                                <button type="submit" name ="ajout.user" class="btn btn-dark btn-sm" style="width: 140px;">Ajouter</button>
                            </div>
                        </div>
                        
                    </form>
                    <a name="" id="" class="btn btn-danger  mt-2 " href="<?=WEB_ROUTE.'?controllers=admin&vue=liste.admin&page='.$precedent;  ?>" role="button">Precedent</a>
                    
    </div>
    </div>
    </div>
</body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>