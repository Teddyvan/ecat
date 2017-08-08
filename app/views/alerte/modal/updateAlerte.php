	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour annonce </h4>
              </div>
              <div class="modal-body">
                
						  <form id="formUpdate" class="form-horizontal">
								 <form id="form" class="form-horizontal" >
								 <fieldset>
										 <legend>Ajout d'un Alerte</legend>
										 <div class="form-group">
											<label class="col-md-3 control-label">Type  <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updtype" name='type' class="form-control">
												<option value='-1'>Selectionnez un type</option>
												<?php foreach($types as $type):?>
												 <option value='<?=$type['id']?>'><?=$type['libelle']?></option>
												<?php endforeach;?>
											 </select>
											</div>
										  </div>
										  	  <div class="form-group">
											 <label class="col-md-3 control-label">Anonyme <span class="required">*</span></label>
											 <div class="col-md-6">
											  <select  id="updanonyme" name='anonyme' class="form-control">
												<option value='1'>Non-Anonyme</option>
												<option value='2'>Anonyme</option>
											 </select>
											 </div>
										</div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Intitulé <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="updintitule" type="text" required="true" name="intitule" placeholder="Intitule de l'alerte" class="form-control required ">
											 </div>
										</div>
									
										 <div class="form-group">
											 <label class="col-md-3 control-label">Description <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="upddescription" name="description" rows="5" placeholder="Description de l'activite"></textarea>
											</div>
										 </div>
										
									 <div class="box-footer">
										<button id="updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
										<button type="submit" id="updSubmit" name="addalerte" class="btn btn-primary pull-right">Enregistrer</button>
									</div>
								 </fieldset>
								 	 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>