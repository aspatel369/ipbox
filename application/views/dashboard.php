<?php  ($this_page = 'dashboard');?>
<?php include "header.php";?>
	<div class="page-container"><!-- BEGIN CONTAINER -->		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
			<div class="page-content" style="min-height:1434px"><!-- BEGIN CONTENT BODY -->
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">Dashboard	<br><small>dashboard &amp; statistics</small></h3>
						<!-- <div class="page-bar">
							<ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
							</ul>						
						</div>						 -->


						<!-- <div>
							<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-2">
								<label class="error" id="from_date_error"></label>
							</div>
							<label class="error" id="to_date_error"></label>
							</div>
						</div>
					<div class="row row11">
					<?php foreach($strength as $values){ 
					$pro=$values['Active']/$values['strength']*100;
					?>								 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mobile_box">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="7800"><?php echo $values['house_name'] ; ?></span>
                                            <small class="font-green-sharp"></small>
                                        </h3>
                                        <small>ACTIVE STUDENT <?php echo $values['Active'] ; ?></small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-pie-chart"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: <?php echo round($pro,2);?>%;" class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only"><?php echo round($pro,2);?>% Strength</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> Strength </div>
                                        <div class="status-number"> <?php echo round($pro,2);?>% </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?> -->



                    <div class="row" style="margin-bottom: 25px;">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div style="background: #fff;padding: 15px;">
                                 <div id="chart"></div>
					         </div>
					    </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div style="background: #fff;padding: 15px;">
                                 <div id="chart1"></div>
					         </div>
					    </div>
					</div>

					 <div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="task-container">

        <!-- Header -->
        <div class="task-header">
            <strong>Tasks:</strong>
            <span class="active">🐞 BUGS</span>
            <span>💻 WEBSITE</span>
            <span>☁ SERVER</span>
        </div>

        <!-- Table -->
        <table class="table task-table">
            <tbody>

                <tr>
                    <td width="40">
                        <input type="checkbox" checked>
                    </td>
                    <td class="task-text">
                        Sign contract for "What are conference organizers afraid of?"
                    </td>
                    <td width="100" class="text-right task-actions">
                       <i class="fa fa-edit"></i>
                       <i class="fa fa-trash font-red"></i>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td class="task-text">
                        Lines From Great Russian Literature? Or E-mails From My Boss?
                    </td>
                    <td class="text-right task-actions">
                       <i class="fa fa-edit"></i>
                       <i class="fa fa-trash font-red"></i>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td class="task-text">
                        Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="text-right task-actions">
                       <i class="fa fa-edit"></i>
                       <i class="fa fa-trash font-red"></i>
                    </td>
                </tr>
				             <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td class="task-text">
                        Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="text-right task-actions">
                       <i class="fa fa-edit"></i>
                       <i class="fa fa-trash font-red"></i>
                    </td>
                </tr>
				             <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td class="task-text">
                        Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="text-right task-actions">
                       <i class="fa fa-edit"></i>
                       <i class="fa fa-trash font-red"></i>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
					    </div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="emp-card-box">

        <!-- Header -->
        <div class="emp-card-header">
            <h4>Employees Stats</h4>
        </div>

        <!-- Table -->
        <table class="table emp-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Country</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>$36,738</td>
                    <td>Niger</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Minerva Hooper</td>
                    <td>$23,789</td>
                    <td>Curaçao</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Sage Rodriguez</td>
                    <td>$56,142</td>
                    <td>Netherlands</td>
                </tr>
				 <tr>
                    <td>4</td>
                    <td>Sage Rodriguez</td>
                    <td>$56,142</td>
                    <td>Netherlands</td>
                </tr>
            </tbody>

        </table>

    </div>
					</div>





					

                        <!-- <div class="col-md-12 col-sm-12">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold uppercase font-dark">Live Callers</span>
                                        <span class="caption-helper"> stats...</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
									<div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th colspan="2"> STUDENT </th>
                                                    <th> CALEE </th>
                                                    <th> STATUS </th>
                                                    <th> DURATION </th>
                                                </tr>
                                            </thead>
                                            <tbody id="livecallers" name="livecallers" >

											</tbody>
										</table>
                                    </div>								
								</div>
                            </div>
                        </div> -->
                        
                       <div class="col-md-12 col-sm-12"  style="margin-top: 25px;">
						  <div class="portlet-body">						
									<table class="table table-striped">
										<tbody><tr>							    
											<th class="text">Student Name</th>
											<th class="text">Roll No</th>
											<th class="text">House Name</th>
											<th class="text">Balance</th>
											<th class="text">Used Balance</th>
										</tr>										<tr>
											<td class="text">&nbsp;SHIVANI SHEKHAWAT</td>
											<td class="text">&nbsp;26007965</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;ANUSUIYA CHOUDHARY</td>
											<td class="text">&nbsp;26006901</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;PRATIKSHA</td>
											<td class="text">&nbsp;26004059</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;PARUL SHARMA</td>
											<td class="text">&nbsp;26006367</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;KOMAL</td>
											<td class="text">&nbsp;26006369</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;ESHA DORATA</td>
											<td class="text">&nbsp;26005698</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;MANNET</td>
											<td class="text">&nbsp;26003683</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;PRANATI SHARMA</td>
											<td class="text">&nbsp;26005208</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;MANSHI</td>
											<td class="text">&nbsp;26008014</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>										<tr>
											<td class="text">&nbsp;PALAK ARORA</td>
											<td class="text">&nbsp;26008084</td>								  
											<td class="text">&nbsp;Gurukripa G-14 Girls</td>
											<td class="text">&nbsp;&nbsp;80</td>
											<td class="text">&nbsp;&nbsp;0</td>
											

										</tr>  									</tbody></table>
									<div class="text-right">
										<nav>
										<ul class="pagination"> &nbsp;<li class="active"><a href="#">1</a></li>&nbsp;<li><a href="https://ipbox.zixisoft.com/index.php/student/studentmanagement_view/25">2</a></li>&nbsp;<li><a href="https://ipbox.zixisoft.com/index.php/student/studentmanagement_view/50">3</a></li>&nbsp;<li><a href="https://ipbox.zixisoft.com/index.php/student/studentmanagement_view/25">&gt;</a></li>&nbsp;&nbsp;<li><a href="https://ipbox.zixisoft.com/index.php/student/studentmanagement_view/150">Last ›</a></li> </ul>
										</nav>
									</div>
								</div>
					   </div>
					

                    </div>
				</div>
			</div>
		</div>
	</div>
	<script>
var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>

<script>
	        var options = {
          series: [
          {
            name: 'Actual',
            data: [
              {
                x: '2011',
                y: 1292,
                goals: [
                  {
                    name: 'Expected',
                    value: 1400,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2012',
                y: 4432,
                goals: [
                  {
                    name: 'Expected',
                    value: 5400,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2013',
                y: 5423,
                goals: [
                  {
                    name: 'Expected',
                    value: 5200,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2014',
                y: 6653,
                goals: [
                  {
                    name: 'Expected',
                    value: 6500,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2015',
                y: 8133,
                goals: [
                  {
                    name: 'Expected',
                    value: 6600,
                    strokeHeight: 13,
                    strokeWidth: 0,
                    strokeLineCap: 'round',
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2016',
                y: 7132,
                goals: [
                  {
                    name: 'Expected',
                    value: 7500,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2017',
                y: 7332,
                goals: [
                  {
                    name: 'Expected',
                    value: 8700,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                  }
                ]
              },
              {
                x: '2018',
                y: 6553,
                goals: [
                  {
                    name: 'Expected',
                    value: 7300,
                    strokeHeight: 2,
                    strokeDashArray: 2,
                    strokeColor: '#775DD0'
                  }
                ]
              }
            ]
          }
        ],
          chart: {
          height: 350,
          type: 'bar'
        },
        plotOptions: {
          bar: {
            columnWidth: '60%'
          }
        },
        colors: ['#00E396'],
        dataLabels: {
          enabled: false
        },
        legend: {
          show: true,
          showForSingleSeries: true,
          customLegendItems: ['Actual', 'Expected'],
          markers: {
            fillColors: ['#00E396', '#775DD0']
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
		</script>
<script type="text/javascript">
var $results = $('#livecallers'),
    loadInterval = 2000;
(function loader() {
    $.get('dashboard/callers', function(html){
            $results.hide(200, function() {
                $results.empty();
                $results.html(html);
                $results.show(200, function() {
                    setTimeout(loader, loadInterval);
                });
            });
    });
})();
</script>
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner"> 2015 © iPbx by www.polkazsoft.com
			<a href="#" title="Purchase iPbx and get lifetime updates for free" target="_blank">Purchase iPbx !</a>
		</div>
		<div class="scroll-to-top" style="display: none;">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->	
</body>
</html>	
