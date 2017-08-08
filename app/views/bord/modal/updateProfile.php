	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour profile </h4>
              </div>
              <div class="modal-body">
                  <form id="formUpdate" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Informations personnelles</legend>
								
										 <div class="form-group">
												 <label class="col-md-3 control-label">Nom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updtnom" disabled="false" type="text" required="true" name="nom" placeholder="Nom" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Prénom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updtprenom" type="text" required="true" name="prenom" placeholder="Prénom" class="form-control required ">
												 </div>
										 </div>
									
								 </fieldset>
								 <fieldset>
										 <legend>Informations supplementaires</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updtlogin" type="text" required="true" name="login" placeholder="Identifiant" class="form-control required ">
												 </div>
										 </div>

										 <div class="form-group">
												 <label class="col-md-3 control-label">Groupe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <select required="true" id="updtidgroupe" name='idGroupe' class="form-control">
															 <option value='-1'>Selectionnez le groupe de l'utilsateur</option>
																<?php foreach($groupes as $groupe):?>
																 <option value ='<?=$groupe['id']?>'><?=$groupe['libelle']?></option>
																<?php endforeach ; ?>
													 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Etat <span class="required">*</span></label>
												 <div class="col-md-6">
														 <select required="true" id="updtetat" name='etat' class="form-control">
																 <option value='-1'>Selectionnez l'etat de l'utilsateur</option>
																 <option value = '1'>Actif </option>
																 <option value='0'>Inactif</option>
														 </select>
												 </div>
										 </div>
										 <div class="box-footer">
											<button id="Updtannuler" type="reset"  class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addUser" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 	 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>