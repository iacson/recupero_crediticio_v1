function printDashboardKPI(url){
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		cache: false,
		async: true,
		success: function(data){
			for(let i=0; i<data.message.length; i++){
				var vKpi = data.message[i].KPI;
				var vName = data.message[i].NAME;
				var vValue = data.message[i].VALUE;
				var vIcon = data.message[i].ICON;
				
				$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box bg-aqua"><div id="'+vKpi+'" class="inner"><h3>'+vValue+'</h3><p>'+vName+'</p></div><div class="icon"><i class="ion '+vIcon+'"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(data);			
		}
	});				
}

function printFooter(){	
	$("#main-footer").append('<div class="pull-right hidden-xs"><b>Versión </b> 0.1 </div><strong>Copyright &copy; 2018-2019 <a href="https://www.iacson.com">Iacson Sistemas</a>.</strong>');
}

/*
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
	<div class="inner">
	  <h3>53<sup style="font-size: 20px">%</sup></h3>

	  <p>Bounce Rate</p>
	</div>
	<div class="icon">
	  <i class="ion ion-stats-bars"></i>
	</div>
	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
	<div class="inner">
	  <h3>44</h3>

	  <p>User Registrations</p>
	</div>
	<div class="icon">
	  <i class="ion ion-person-add"></i>
	</div>
	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
	<div class="inner">
	  <h3>65</h3>

	  <p>Unique Visitors</p>
	</div>
	<div class="icon">
	  <i class="ion ion-pie-graph"></i>
	</div>
	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
*/