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
      <div class="container mt-5">
          <div class="row">
              <div class="col-md-offset-3">
                <form class="form-inline">
                    <div class="form-group ml-5">
                        <label for="">Etat</label>
                    </div>
                    <div class="form-group ml-5">
                        <label for="">Etat</label>
                        <select name="" id=""></select>
                    </div>
                </form>
              </div>
          </div>
      </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Bien</th>
      <th scope="col">Date</th>
      <th scope="col">Etat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($reservations as $reservation):?>
      <td> <a href="#"><?=$reservation['nom'].' '.$reservation['prenom'].' '.$reservation['telephone']?></a></td>
      <td><a href="#"><?=$reservation['type_bien'].' '.$reservation['nom_zone'].' '.$reservation['date']?></a></td>
      <td><?=date_format(date_create($reservation['date_reservation']),'d-m-Y')?></td>
      <td><?=$reservation['etat_reservation']?></td>
    </tr>
    <?php endforeach ?>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
