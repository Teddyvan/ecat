// JavaScript Document

			$(document).ready( function () {
				var id = -1;//simulation of id
				$('#personnel').dataTable({ bJQueryUI: true,

							"sPaginationType": "full_numbers",
							"sScrollY": 330,
							"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							"oLanguage": { "sProcessing":   "Traitement en cours...",
                   				"sLengthMenu":   "Afficher _MENU_ &eacute;l&eacute;ments",
             					"sZeroRecords":  "Aucun &eacute;l&eacute;ment &agrave; afficher",
               					"sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
               					"sInfoEmpty": "Liste vide ...",
               					"sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
               					"sInfoPostFix":  "",
               					"sSearch":       "Rechercher:",
               					"sUrl":          "",
								"sLoadingRecords": "Chargement en cours...",
							    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
							    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
              					"oPaginate": {
                					"sFirst":    "Premier",
					                "sPrevious": "Pr&eacute;c&eacute;dent",
					                "sNext":     "Suivant",
					                "sLast":     "Dernier",
			                   }
            		    },
					"bJQueryUI": true,

}).makeEditable({
									sUpdateURL: function(value, settings)
									{
                             							return(value); //Simulation of server-side response using a callback function
									},
                             			sAddURL: "ajoutPersonnel.php",
                             			sAddHttpMethod: "GET",
                                    sDeleteHttpMethod: "GET",
									sDeleteURL: "DeleteData.php",
                    							"aoColumns": [
                    									{ 	cssclass: "required" },
                    									{
                    									},
                    									{
                									        indicator: 'Saving platforms...',
                                                            					tooltip: 'Cliquez pour modifier',
												type: 'textarea',
                                                 						submit:'Save changes'
                    									},
                    									{
                                                            					indicator: 'Saving Engine Version...',
                                                            					tooltip: 'Click to select engine version',
                                                            					loadtext: 'loading...',
                           					                                type: 'select',
                               						            		onblur: 'Annuler',
												submit: 'Ok',
                                                            					loadurl: 'EngineVersionList.php',
												loadtype: 'GET'
                    									},
                    									{
                                                            					indicator: 'Saving CSS Grade...',
                                                            					tooltip: 'Click to select CSS Grade',
                                                            					loadtext: 'loading...',
                           					                                type: 'select',
                               						            		onblur: 'submit',
                                                       					data: "{'':'Please select...', 'A':'A','B':'B','C':'C'}"
                                                        				}
											],
									oAddNewRowButtonOptions: {	label: "Ajout...",
													icons: {primary:'ui-icon-plus'} 
									},
									oDeleteRowButtonOptions: {	label: "Suppr...", 
													icons: {primary:'ui-icon-trash'}
									},

/*									oAddNewRowFormOptions: { 	
                                                    title: 'Ajouter un agent',
													show: "blind",
													hide: "explode",
                                                    modal: true
									}	, */
sAddDeleteToolbarSelector: ".dataTables_length"								

										});
				
			} );