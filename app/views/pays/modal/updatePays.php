	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour pays </h4>
              </div>
              <div class="modal-body">
                
						  <form id="formUpdate" class="form-horizontal">
								 <fieldset>
										  <div class="form-group">
									
										 <div class="form-group">
												 <label class="col-md-3 control-label">Pays <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updCountry" type="text" required="true" name="country" placeholder="Nom du Pays" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updAbreviation" type="text" required="true" name="abreviation" placeholder="Abreviation de l'Pays" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="updannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addpay" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 	 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>