	 <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise a jour profile d'un domaine </h4>
              </div>
              <div class="modal-body">
                  <form id="formUpdate" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Code <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="updcode" type="text" required="true" name="code" placeholder="Code" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Intitule domaine <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="upddesignation" type="text" required="true" name="designation" placeholder="Intitule du domaine" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="Updannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
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