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
								 <form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Ajout d'une Offre de service</legend>
										  
										  <div class="form-group">
											<label class="col-md-3 control-label">Domaine(s) <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="upddomaine" name='domaine' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un domaine</option>
												<?php foreach($domaines as $domaine):?>
													 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
												<?php endforeach;?>
											  </select>
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Probleme identifie <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="updtprobleme_identify" name='probleme_identify' rows="3" placeholder="Probleme identifie"></textarea>
											</div>
										  </div> 
										  <div class="form-group">
											<label class="col-md-3 control-label">Intitule offre <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="updoffer_designation" name='offer_designation' rows="3" placeholder="Intitule offre"></textarea>
											</div>
										  </div> 
										   <div class="form-group">
											<label class="col-md-3 control-label">Pays concerne <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updcountry_concerne" name='country_concerne' class="form-control">
													<option value='-1'>Selectionnez le pays de l'association</option>
												 <?php foreach($pays as $pay):?>
													<option value='<?=$pay['id']?>'><?=$pay['country']?> - <?=$pay['abreviation']?> </option>
												<?php endforeach;?>
											  </select>
											</div>
										  </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Ouverture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="update_ouverture" type="date" required="true" name="date_ouverture" placeholder="Ouverture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Cloture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="upddate_fermeture" type="date" required="true" name="date_fermeture" placeholder="Cloture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Regularite de l'offre  <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updfrequence" name='frequence' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='1'>Journalier</option>
												<option value='2'>Hebdomadaire</option>
												<option value='2'>Mensuelle</option>
												<option value='3'>Trimestrielle</option>
												<option value='4'>Annuelle</option>
										
											  </select>
											</div>
										  </div>
										  	
										
									 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addgroupe" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>