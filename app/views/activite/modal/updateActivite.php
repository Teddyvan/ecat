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
										 <legend>Activite </legend>
										  <div class="form-group">
											<label class="col-md-3 control-label">Cat <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updcategorie" name='categorie' class="form-control">
												<option value='1'>Activite en cours</option>
												<option value='2'>Activite passé</option>
										
											  </select>
											</div>
										  </div>
										  
										  <div class="form-group">
												 <label class="col-md-3 control-label">Titre activite <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updtitre_activite" type="text" required="true" name="titre_activite" placeholder="titre de l'activite" class="form-control required ">
												 </div>
										 </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Domaine <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="upddomaine_concerne" name='domaine_concerne' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un domaine</option>
												<?php foreach($domaines as $domaine) :?>
													<option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
												<?php endforeach; ?>
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Description Activite <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="upddescription_activite" name="description_activite" rows="3" placeholder="Description de l'activite"></textarea>
											</div>
										  </div> 
										
									 <div class="box-footer">
											<button id="updtAnnuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addActivite" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>