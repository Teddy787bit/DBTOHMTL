<script>
 function validateBooking(data){
  var action = data.action;
  var hotel_code = $(':selected',data.hotel).val();
  var arrival_day = $(':selected',data.arrival_day).val();
  var arrival_month = $(':selected',data.arrival_month).val();
  var arrival_year = $(':selected',data.arrival_year).val();
  var departure_day = $(':selected',data.departure_day).val();
  var departure_month = $(':selected',data.departure_month).val();
  var departure_year = $(':selected',data.departure_year).val();
  var arrival_month_text = $(':selected',data.arrival_month).html();
  var departure_month_text = $(':selected',data.departure_month).html();
  var arrival_date = new Date(arrival_year,arrival_month - 1,arrival_day);
  var departure_date = new Date(departure_year,departure_month - 1,departure_day);
  var today = new Date();
  
  var checkin = arrival_day+'-'+arrival_month_text+'-'+arrival_year;
  var checkout = departure_day+'-'+departure_month_text+'-'+departure_year;
  today.setHours(0);
  today.setMinutes(0,0,0);
  
 
  
  if(arrival_date.getTime() < today.getTime() ){
    alert("Arrival date should be greater than today date.");
    return false;
  }
  
  if(departure_date.getTime() <= arrival_date.getTime()){
    alert("Departure date should be greater than arrival date.");
    return false;
  }
/*
  data.action = "https://be.synxis.com/?hotel="+hotel_code+"&Chain=16365&nocache=true";
 $(data.checkin).val(checkin);
  $(data.checkout).val(checkout);
  $(data.hotel).val(hotel_code);
*/
  data.action = "https://bookingengine.graceworks.com/?hid=IN321794&partnercode=VESTA&checkin=2021-09-15&checkout=2021-09-16&nRooms=1&nAdults=1&nChildrens=1";

 
  return true;
 }
</script>
<div id="light781" style="display: none;" class="white_content2">
<img class="close_certific" onClick="document.getElementById('light781').style.display='none';document.getElementById('black_overlay').style.display='none';" src="admin/images/desible2.png">
<img id="lightimg" width="1000" height="463" src="">
</div>		
		<div class="container">
			<form onSubmit="return validateBooking(this);" name="booking" method="post" action="" >
			<div class="row">
				<div class="col-sm-12">
					<h2>Reservation</h2>
				</div>
				<div class="col-sm-4">
					<ul>
						<li><label>Hotels</label></li>
						<li>
							<div class="styled-select">
							   <select name="hotel" id="hotel" class="">
							      <option value="67185">Vesta International</option>
							      <option value="67186">Vesta Bikaner Palace</option>							      
								<option value="67184">Vesta Maurya Palace</option>
							   </select>
							</div>

						</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<?php
					
					$dl_date = explode("-",date("Y-m-d"));
					$dt = $dl_date[2];
					$month = $dl_date[1];
					$year = $dl_date[0];

					?>
					<ul>
						<li><label>Arrival</label></li>
						<li>
							<div class="styled-select-smll">
							   <select name="arrival_month" id="arrival-month" class="arrival-month">
							      <option value="01" <?php if($month==1){ echo "selected";}?>>Jan</option>
							      <option value="02" <?php if($month==2){ echo "selected";}?>>Feb</option>
							      <option value="03" <?php if($month==3){ echo "selected";}?>>Mar</option>
							      <option value="04" <?php if($month==4){ echo "selected";}?>>Apr</option>
							      <option value="05" <?php if($month==5){ echo "selected";}?>>May</option>
							      <option value="06" <?php if($month==6){ echo "selected";}?>>Jun</option>
							      <option value="07" <?php if($month==7){ echo "selected";}?>>Jul</option>
							      <option value="08" <?php if($month==8){ echo "selected";}?>>Aug</option>
							      <option value="09" <?php if($month==9){ echo "selected";}?>>Sep</option>
							      <option value="10" <?php if($month==10){ echo "selected";}?>>Oct</option>
							      <option value="11" <?php if($month==11){ echo "selected";}?>>Nov</option>
							      <option value="12" <?php if($month==12){ echo "selected";}?>>Dec</option>
							   </select>
							</div>
						</li>
						<li>
							<div class="styled-select-smll">
							   <select name="arrival_day" class="arrival-day">
							   	<?php
							   	for($i=1;$i<=31;$i++){
							   	?>
							      <option value="<?php echo ($i < 10)?'0'.$i:$i; ?>" <?php if($dt==$i){ echo "selected";}?>><?php echo $i; ?></option>
							     <?php } ?>
							   </select>
							</div>
						</li>
						<li>
							<div class="styled-select-mid">
							   <select name="arrival_year" class="arrival-year">
							      <?php
							   	for($i=2015;$i<=2099;$i++){
							   	?>
							      <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";}?>><?php echo $i; ?></option>
							     <?php } ?>
							   </select>
							</div>
						</li>
						
					</ul>
				</div>
				<div class="col-sm-4">
					<?php
					$sql="SELECT DATE_ADD('".date('Y-m-d')."', INTERVAL 1 DAY)";
                    $query=mysqli_query($connobj,$sql);
                    $premium_exp_dt= mysqli_fetch_array($query);
					//print_r($premium_exp_dt);
					//echo $premium_exp_dt;
					$dl_date = explode("-",$premium_exp_dt[0]);
					$dt = $dl_date[2];
					$month = $dl_date[1];
					$year = $dl_date[0];

					?>
					<ul>
						<li><label>Departure</label></li>
						<li>
							<div class="styled-select-smll">
							   <select name="departure_month" class="departure-month">
							      <option value="01" <?php if($month==1){ echo "selected";}?>>Jan</option>
							      <option value="02" <?php if($month==2){ echo "selected";}?>>Feb</option>
							      <option value="03" <?php if($month==3){ echo "selected";}?>>Mar</option>
							      <option value="04" <?php if($month==4){ echo "selected";}?>>Apr</option>
							      <option value="05" <?php if($month==5){ echo "selected";}?>>May</option>
							      <option value="06" <?php if($month==6){ echo "selected";}?>>Jun</option>
							      <option value="07" <?php if($month==7){ echo "selected";}?>>Jul</option>
							      <option value="08" <?php if($month==8){ echo "selected";}?>>Aug</option>
							      <option value="09" <?php if($month==9){ echo "selected";}?>>Sep</option>
							      <option value="10" <?php if($month==10){ echo "selected";}?>>Oct</option>
							      <option value="11" <?php if($month==11){ echo "selected";}?>>Nov</option>
							      <option value="12" <?php if($month==12){ echo "selected";}?>>Dec</option>
							   </select>
							</div>
						</li>
						<li>
							<div class="styled-select-smll">
							   <select name="departure_day" class="departure-day">
							   	<?php
							   	for($i=1;$i<=31;$i++){
							   	?>
							      <option value="<?php echo ($i < 10)?'0'.$i:$i; ?>" <?php if($dt==$i){ echo "selected";}?>><?php echo $i; ?></option>
							     <?php } ?>
							   </select>
							</div>
						</li>
						<li>
							<div class="styled-select-mid">
							   <select name="departure_year" class="departure-year">
							      <?php
							   	for($i=2015;$i<=2099;$i++){
							   	?>
							      <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";}?>><?php echo $i; ?></option>
							     <?php } ?>
							   </select>
							</div>
						</li>
						
					</ul>
				</div>
				
				<div class="col-sm-12">
					<div class="bnr_frm_bot">
						<div class="row">
						<div class="col-sm-3 mob_big">
								<ul>
									<li><label>Rooms</label></li>									
									<li>
										<div class="styled-select-smll">
											<select name="rooms" class="rooms">
										   <?php
							   	for($i=1;$i<=4;$i++){
							   	?>
							      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							     <?php } ?>
							    </select>
										</div>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 mob_big">
								<ul>
									<li><label>Adults</label></li>									
									<li>
										<div class="styled-select-smll">
											<select name="adults" class="adults">
										   <?php
							   	for($i=1;$i<=6;$i++){
							   	?>
							      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							     <?php } ?>
							    </select>
										</div>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 mob_big">
								<ul>
									<li><label>Children</label></li>									
									<li>
										<div class="styled-select-smll">
										   <select name="children" class="children">
										      <?php
							   	for($i=0;$i<=10;$i++){
							   	?>
							      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							     <?php } ?>
										   </select>
										</div>
									</li>
								</ul>
							</div>
							<input type="hidden" name="checkin" class="checkin"/>
							<input type="hidden" name="checkout" class="checkout"/>
							<input type="hidden" name="hotel" class="hotel"/>
							<div class="col-sm-3 col-xs-12">
							<input style=" background:url('http://aff.bstatic.com/data/sp_aff/330843/booknow_en-us.gif') no-repeat scroll 0 0;
    border: medium none;
    min-height: 35px;
    min-width: 170px;" type="submit" name="submit" class="submit" value="" />
				
				
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
