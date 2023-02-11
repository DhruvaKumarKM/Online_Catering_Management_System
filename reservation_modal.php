<div id="reserve" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title center"><i class = "fa fa-key"></i> Reservation Details</h4>
        </div>
         <div class="modal-body">
                            <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal">	
                    <!-- Email -->
					<h3>Personal Information</h3>
					<hr/>
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">Firstname</label>
                      <div class="col-lg-7">
                        <input type="text" name = "firstname" class="form-control" id="inputEmail" placeholder="Firstname here..">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Lastname </label>
                      <div class="col-lg-7">
                        <input type="text" name = "lastname" class="form-control" id="inputPassword" placeholder="Lastname here..">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Email Address </label>
                      <div class="col-lg-7">
                        <input type="email" name = "email_address" class="form-control" id="inputPassword" placeholder="Your valid email address here..">
                      </div>
                    </div> 
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Home Address </label>
                      <div class="col-lg-7">                     
                        <textarea class="form-control" rows="3" placeholder="Type your complete address"></textarea>
                      </div>
                    </div>
					
                                 <div class="form-group">
                                  <label class="col-lg-2 control-label">Contact #</label>
                                  <div class="col-lg-5">
                                    <input type="number" maxlength="11"  class="form-control" placeholder="Contact #" name="contact" >
                                  </div>
                                </div>
					
					<br/>
					<h3>Reservation Information</h3>
					<hr/>
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Event Address</label>
                      <div class="col-lg-7">
                         <textarea class="form-control" rows="3" placeholder="Event complete address"></textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Date of Event</label>
                      <div class="col-lg-3">
                       <input name = "date_of_event" class = "form-control" type="text" id="datepicker" size="30"><span class = "label label-warning">Check if date is available</span>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Event Theme</label>
                      <div class="col-lg-7">
						<select name = "theme" class = "form-control">					
							<option></option>							
							<option></option>							
							<option></option>							
							<option></option>							
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Occasion</label>
                      <div class="col-lg-7">
						<select name = "theme" class = "form-control">					
							<option></option>							
							<option></option>							
							<option></option>							
							<option></option>							
						</select>
                      </div>
                    </div>					
                       <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword"></label>
                      <div class="col-lg-7">
                        <button class = "btn btn-success btn-block">Submit</button> 
                      </div>
                    </div> 
                    <br />
                  </form>
				  
				</div>
        </div>
        <div class="modal-footer">
                
		</div>
    </div>
</div>

