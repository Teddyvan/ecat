	 <div class="example-modal">
        <div id="assistant" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Création d'un Assistant technique</h4>
              </div>
              <div class="modal-body">
                 <form id="formTech" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updidentifiant" type="text" required="true" name="login" placeholder="Identifiant de connexion" class="form-control required ">
												 </div>
										 </div>
									
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation AT <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updabreviation_at" type="text" required="true" name="abreviation_at" placeholder="Abreviation de l'Assistant technique" class="form-control required ">
												 </div>
										 </div>
										  
										  <div class="form-group">
												 <label class="col-md-3 control-label">Contact Adresse <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updcontact_adresse" type="text" required="true" name="contact_adresse" placeholder="Contact Adresse" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Site <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updcontact_site_web" type="text" required="true" name="contact_site_web" placeholder="Contact site" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Phone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updcontact_phone" type="tel" required="true" name="contact_phone" placeholder="Contact phone" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Email <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updcontact_email" type="email" required="true" name="contact_email" placeholder="Contact Email" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addtechnique" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
								 <input id="updtid" type="hidden"  name="id"  />
						 </form>
              </div>

              <!--  /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </div>
        </div>