	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour profile besoin</h4>
              </div>
              <div class="modal-body">
			   <form id="formUpdate" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>										
										 <div class="form-group">
												 <label class="col-md-3 control-label">Designation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="upddesignation" type="text" required="true" name="designation" placeholder="Désignation du Besoin association" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Domaines <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="upddomain_concerne" name='domain_concerne' class="form-control">
												<option value="-1">Choissisez le domaine</option>
												<?php foreach($domaines as $domaine) :?>
													<option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
												<?php endforeach; ?>
										
											  </select>
											</div>
										  </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Sous-domaines <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updsous_domaine" name='sous_domaine' class="form-control">

											  </select>
											</div>
										  </div>
										 <div class="form-group">
											<label class="col-md-3 control-label">Insuffisance releve <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " name="insuffisance_releve" id="updinsuffisance_releve" rows="3" placeholder="Insuffisance releve"></textarea>
											</div>
										  </div> 
										  <div class="form-group">
											<label class="col-md-3 control-label">Objet de l'appui technique <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " name="appui_technique" id="updappui_technique" rows="3" placeholder=""></textarea>
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