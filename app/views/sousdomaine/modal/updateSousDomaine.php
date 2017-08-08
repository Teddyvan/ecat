	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour profile d'un Sous domaine</h4>
              </div>
              <div class="modal-body">
                  <form id="formUpdate" class="form-horizontal" enctype="multipart/form-data">
								 <form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
									 <div class="form-group">
												 <label class="col-md-3 control-label">Domaine <span class="required">*</span></label>
												 <div class="col-md-6">
													 <select required="true" id="upddomaine_concern" name='domaine_concern' class="form-control">
															 <option value='-1'>Selectionnez le domaine</option>
															<?php foreach($domaines as $domaine):?>
															 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
															<?php endforeach;?>
													 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Intitule Sous domaine <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updsous_domaine_designation" type="text" required="true" name="sous_domaine_designation" placeholder="Intitule du Sous domaine" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addSousdomaine" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>