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
										 <legend>Mise a jour d'un groupe</legend>
								
										 <div class="form-group">
												 <label class="col-md-3 control-label">Libelle <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updtlibelle" type="text" required="true" name="libelle" placeholder="Nom du groupe" class="form-control required ">
												 </div>
										 </div>
										 
										 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit"  name="addgroupe" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>