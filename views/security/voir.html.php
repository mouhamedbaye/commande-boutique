<div class="col-md-4 my-5 offset-4">
                <div class="">
        
                <form method="POST" action="<?=WEB_ROUTE?> ">
                <input type="hidden" name="controlleurs" value="responsable"/>
                <input type="hidden" name="action" value="ajoutproduit"/>
                
                    <div class="row">
                        <div class="col">
                        <label for="libelle" class="form-label mt-4">Libelle</label>
                        <input type="text" name="libelle" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                        <label for="quantite" class="form-label mt-4">Qantite</label>
                        <input type="text" name="quantite" class="form-control" placeholder="">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="prix" class="form-label mt-4">prix</label>
                        <input type="text" name="prix" class="form-control" placeholder="0.00">
                        </div>
                        <div class="col">
                        <label for="avatar" >image</label>
                        <input type="file" name="image" value="none">
                        </div>
                        
                    </div>
                    <div class="card-foter text-right">
                                <button type="submit" value ="valider" class="btn btn-dark btn-sm" style="width: 140px;">Enregistrer</button>
                            </div>
                            <div class="card-foter text-right">
                                <button type="submit" value ="valider" class="btn  btn-sm" style="width: 140px;">Annuler</button>
                            </div>
                </form>
                            
                </div>
        
            </div>



            <form method="POST" action="<?=WEB_ROUTE?>" class="row g-3" >
      <input type="hidden" name="controlleurs" value="commande">
      <input type="hidden" name="action" value="ajout_versement">

 <div class="container"> 
   <div> <h4 style="text-align: center;" class="mt-3" id="ptitre" > versement d'une Commande <hr> </h4></div> 
     
      <div class=""id="input"style=""> 
      <h4 style="text-align: center;" class="mt-3">Formulaire des versements<hr> </h4>
           <div class="row mt-5">
           <div class=" col-sm ml-2">
                <label for="">montant versement</label>
                <input type="text" class=" col-sm" name="mnt_versement" id="bord" value="" >
               <!--  <small  class="form-text text-danger">
                                      <?= isset($arrayError['mnt_versement']) ? $arrayError['mnt_versement']:""; ?>
                                </small> -->
            </div>
            <div class="col-sm ml-1">
              
                            <label for=""class="">Date versement </label>
                            <input type="date" class="col-sm" name="date_versement" id="bord" >
            </div>
          
                     
           </div>
            <div class="row mt-5">
          
             <div class="col-sm">
                <label for=""class=""> la Commande </label>
                <select class="col-sm-6" id="bord" name="id_commande">
               <!--  <?php foreach ($en_cour as $en_cours):?> 
                  <option class=""value="<?=$en_cours['id_commande']?>" > <?= $en_cours['nom_produit'].$est.$en_cours['date_commande'] ?> </option>
                  <?php endforeach?> -->
                </select>
            </div>
            
            
           </div>
           <div>
          <button  type="submit" class="btn btn-warning mt-3 " id="right">Valider</button>
           </div>
           
        </div> 
    </div>
             
  </div>

 </div>
 </form>