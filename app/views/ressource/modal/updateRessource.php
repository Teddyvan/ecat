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
								 <legend>Ressource</legend>
								  <div class="form-group">
									<label class="col-md-3 control-label">Type <span class="required">*</span></label>
									<div class="col-md-6">
									  <select required="true" id="updtype" name='type' class="form-control">
										<option value='-1'>Type de fichier</option>
										<option value='2'>Rapport</option>
										<option value='3'>Publication</option>
										<option value='4'>Module de formation</option>
										<option value='5'>Autres</option>
								
									  </select>
									</div>
								  </div>
								   <div class="form-group">
									<label class="col-md-3 control-label">Description ressource <span class="required">*</span></label>
									<div class="col-md-6">
									<textarea class="form-control " id="upddescription_activite"  name="description_activite" rows="3" placeholder="Description de la ressource"></textarea>
									</div>
								  </div> 
								 
								   <div class="form-group">
									<label class="col-md-3 control-label">Theme de ratachement <span class="required">*</span></label>
									<div class="col-md-6">
									  <select required="true" id="updtheme" name='theme' class="form-control">
									   <option value='-1'>Selectionnez le theme </option>
										<?php foreach($domaines as $domaine):?>
													 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
													<?php endforeach;?>
									  </select>
									</div>
								  </div>
								   <div class="form-group">
										 <label class="col-md-3 control-label">Fichier concerné 1 <span class="required">*</span></label>
										 <div class="col-md-6">
												 <input id="updfichier1" type="file" required='true' name="fichier[]" class="form-control required ">
										 </div>
								 </div>
								  <div class="form-group">
										 <label class="col-md-3 control-label">Fichier concerné 2 </label>
										 <div class="col-md-6">
												 <input id="updfichier2" type="file"  name="fichier[]" class="form-control required ">
										 </div>
								 </div>
								  <div class="form-group">
										 <label class="col-md-3 control-label">Fichier concerné 3</label>
										 <div class="col-md-6">
												 <input id="updfichier3" type="file"  name="fichier[]" class="form-control required ">
										 </div>
								 </div>
							 <div class="box-footer">
									<button id="updannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
									<button type="updsubmit" name="addressource" class="btn btn-primary pull-right">Enregistrer</button>
								 </div>
						 </fieldset>
						 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>