	 <div class="example-modal">
        <div class="modal" id="annonce">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Annonce </h4>
              </div>
              <div class="modal-body">
                
						  <form id="formUpdate" class="form-horizontal">
								 <fieldset>
										 <legend>Ajout d'un annonce</legend>
										 <div class="form-group">
											<label class="col-md-3 control-label">Categorie <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="updcategorie" name='categorie' class="form-control">
												<option value='-1'>Selectionnez une categorie</option>
												<option value='1'>Seminaire</option>
												<option value='2'>Conference</option>
												<option value='3'>Atelier</option>
												<option value='4'>Autres céremonie</option>
										
											  </select>
											</div>
										  </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Titre <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="updtitre" type="text" required="true" name="titre" placeholder="Titre de l'annonce" class="form-control required ">
											 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Date début <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="upddate_debut" type="text" required="true" name="date_debut" placeholder="date de debut" class="form-control required ">
											 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Date Fin <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="upddate_fin" type="text" required="true" name="date_fin" placeholder="date de fin" class="form-control required ">
											 </div>
										 </div> 
										 <div class="form-group">
											 <label class="col-md-3 control-label">Lieu <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="updlieu" type="text" required="true" name="lieu" placeholder="lieu" class="form-control required ">
											 </div>
										 </div>
									 <div class="form-group">
											 <label class="col-md-3 control-label">Contenu <span class="required">*</span></label>
											 <div class="col-md-6">
											<textarea id="updeditor1" name="contenu" rows="7" cols="35" >
															
											</textarea>
											 </div>
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