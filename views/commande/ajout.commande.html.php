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

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <img class="navbar-brand " src="img/capture.png" width="150" alt="">
      
      
      <div class="collapse navbar-collapse" id="navbarColor01">
        <h1 class="card-body text-center btn-secondary"></h1>
       
        <ul class="navbar-nav mr-10 ml-4">
        <?php if (!est_connect()): ?>
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
    
    
    <div class="main-wrapper">
    
    <form class="needs-validation" novalidate method="POST" action="<?=WEB_ROUTE?> ">
        <input type="hidden" name="controlleurs" value="commande"/>
        <input type="hidden" name="action" value="ajoutcommande"/>
  <div class="form-row ml-3">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01"> Livreur</label>
      <select class="form-control" name ="livreur" id="validationCustom01" placeholder="00" value="" required>
        <?php foreach($livreurs as $livreur): ?>
          <option value="<?=$livreur['id_livreur']?>"><?=$livreur['prenom'].' '.$livreur['nom']?></option>
          <?php endforeach ?>
    </select>
    </div>
  
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Date Livraison</label>
      <input type="date" class="form-control" name ="date_livraison" id="validationCustom02" placeholder="" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row ml-3">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Montant</label>
      <input type="number" class="form-control" name ="montant" id="validationCustom03" placeholder="" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Adresse</label>
      <input type="text" class="form-control" id="validationCustom04" name ="adresse" placeholder="adress_livraison" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Remise</label>
      <input type="number" class="form-control" name ="remise" id="validationCustom05" placeholder="" required>
    </div>
  </div>
  <div class="form-row ml-3">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01"> Produit</label>
      <select class="form-control" name ="produit" id="validationCustom01" placeholder="00" value="" required>
        <?php foreach($prod as $produits): ?>
          <option value="<?=$produits['id_produit']?>"><?=$produits['libelle']?></option>
          <?php endforeach ?>
    </select>
    </div>
  <div class="form-group ml-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Je confirme mon commande
      </label>

    </div>
  </div>
  <button class="btn btn-primary ml-4" type="submit">Submit form</button>
</form>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
   