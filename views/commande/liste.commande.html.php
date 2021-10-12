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
  <body>
  <li class="nav-item dropdown">
            <div class="btn btn-secondary"><a 
              href="<?= WEB_ROUTE. '.?controlleurs=responsable&views=ajout.user'?>">Retour</a
            ></div>
          </li>
    <div class="container">
    <img class="navbar-brand " src="img/capture.png" width="" alt="">

      <div class="row">

        <div class="col-md-8">
        <table class="table">
        <thead>
          <tr>
            <th>Date Commande</th>
            <th>Numero Comande</th>
            <th>Montant</th>
            <th>Adresse</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($commande as $commandes): ?>

          <tr>
            <td><?= $commandes['date_commande']?></td>
            <td><?= $commandes['numero_commande']?></td>
            <td><?= $commandes['montant']?></td>
            <td><?= $commandes['adresse_livraison']?></td>
            <td><a name="" id=""  class="btn btn-danger" href="<?= WEB_ROUTE . '?controlleurs=responsable&views=delete&id_produit=' . $produits['id_produit'] ?>" role="button"><i class="fas fa-shopping-cart"></i></a>

          </tr>
          <?php endforeach ?>        

        </tbody>
      </table>
    <!--   <div class="card-rooter clearfix">
<ul class="pagination pagination-sm m-0 float-right">
  <li class ="page-item<?= ($currentPage == 1) ? "disabled": ""?>"> 
    <a href="<?=WEB_ROUTE.'?controlleurs=responsable&views=liste.produit&page='.($currentPage - 1)?>"class = "page-link"> Précedent </a>
</li>
<?php for ($i=1;$i<=$page;$i++):?>
  <li class="page-item">
    <a href="<?=WEB_ROUTE.'?controlleurs=responsable&views=liste.produit&page='.$i?>"><?= $i ?> </a>
  </li>
  <?php endfor ?>
  <li class ="page-item <?= ($currentPage== $page)?"disabled":"" ?>">
    <a href="<?= WEB_ROUTE.'?controlleurs=responsable&views=liste.produit&page='.($currentPage + 1 )?>" class="page-link"> Suivante</a>
  </li>
</ul>
</div> -->
        </div>
     
     
     
     
     
      
      </div>
      </div>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<style>
  .row{
    box-shadow:5px 5px 3px;
    width:800px;
    
  }
  .container{
    display: flex;
    justify-content: space-between;
  }

</style>