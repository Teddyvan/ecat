<div class="row">
        <div class="col-md-9">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservé pour l'affichage des notes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
            
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Derniere évaluation soumise </strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                     <canvas id="pieChart" style="height:250px"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
				<div class="chart">
					<canvas id="barChart" style="height:230px"></canvas>
				</div>
                  <!-- /.progress-group -->
                
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
		  <?php if($type == RAN || $type == ASSISTANT ) :?>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Besoins des associations</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="besoin_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Besoin</th>
						<th>Domaine</th>
						<th>Insuffisance </th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($besoins)) :?>
									<?php foreach($besoins as $besoin ):?>
					<tr>
						<td><?=$besoin['besoin_designation']?></td>
						<td><?=$besoin['domaine']?></td>
						<td><?=$besoin['insuff']?></td>
					
						<td>
						<button class="seeBesoin" title="Voir details du besoin" value="<?=$besoin['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$besoin['id']?>" class="donwloadAnnonce" title="Telecharger" ><i class="fa fa-cloud-download"></i> </button>&nbsp;&nbsp;
							
							
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Besoin</th>
						<th>Domaine</th>
						<th>Insuffisance </th>
						<th>Actions</th>
					</tr>
					</tfoot>
				</table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tout</a>
            </div>
            <!-- /.box-footer -->
          </div>
			<?php endif;?>
		  <?php if($type == RAN || $type == ASSOC ) :?>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Offre de service d'assistance</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="offre_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Ouverture</th>
						<th>Fermeture</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($offres)) :?>
									<?php foreach($offres as $service ):?>
					<tr>
						<td><?=$service['pays_name']?></td>
						<td><?=$service['domaine']?></td>
						<td><?=$service['offre']?></td>
						<td><?=$service['ouverture']?></td>
						<td><?=$service['fermeture']?></td>
					
						<td>
						<button class="seeService" title="Voir details du Service" value="<?=$service['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;
							<button type="button" value="<?=$service['id']?>" class="donwloadAnnonce" title="Telecharger" ><i class="fa fa-cloud-download"></i> </button>&nbsp;&nbsp;
						
						
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Date Ouverture</th>
						<th>Date Fermeture</th>
						<th>Actions</th>
					</tr>
					</tfoot>
				</table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tout</a>
            </div>
            <!-- /.box-footer -->
          </div>
		  <?php endif;?>
        </div>
        <!-- /.col -->
		<div class="col-md-3">
                      <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Evenement</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                        
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Ressource documentaire</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                          <canvas id="areaChart" style="height:250px"></canvas>
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Boite a outils</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                        
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					  <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Partenaires du PRF</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
						  
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
						<div id="evts" class="demo"></div>
                       <img style="text-align:center;height:200px;width:200px" src="<?=SERVER?>/dist/img/partenaires_prf.jpg" alt="logo ecat" />
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Organisation porteuse</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
							 <img style="align:center" src="<?=SERVER?>/dist/img/logo_rame.jpg" alt="logo ecat" />

                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
	  </div>
      </div>

<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/chartjs/Chart.min.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
	// Get context with jQuery - using jQuery's .get() method.
	
    var areaChartData = {
      labels: [],
      datasets: [
        {
          label: "",
          fillColor: "#00ffbf",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56, 55, 40]
        }
      ]
    };
	var dataBaton = {} ;
	$.ajax({
			url: "index.php?p=Domaine/getAll",
			type: "GET",
			dataType: 'json',
			success: function (data) {
				if(data.erreur == 1)
				{
					//il ya une erreur
					$("#retour").html(data.msg);
				}else
				{
					//lancer la boite modal et preremplir les champs
					console.log(data.data.serv);
					 $.each(data.data, function (index,value) {
						 console.log("id "+value.id);
						 console.log("valeur "+value.domaine);
						areaChartData.labels.push = value.domaine ;
					});
				}
			},
			error: function (jqxr, status,erreur) {
				$("#retour").html(jqxr.responseText+"<br />"+status);
			}
		});
	//recuperer les domaines qui seront les titres du graphes
	


 
	//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;

		
    // barChartData.datasets[1].strokeColor = "#00a65a";
    // barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Gouvernance"
      },
      {
        value: 700,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Gestion financiere"
      },
     
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 0, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

   
  });
</script>
