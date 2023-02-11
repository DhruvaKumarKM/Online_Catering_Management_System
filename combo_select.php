<?php include 'header.php';?>

<body>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
		<div class = "content">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-8 col-lg-8">
					<div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Forms</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Input Box</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Input Box">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Password Box">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Textarea</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" placeholder="Textarea"></textarea>
                                  </div>
                                </div>    
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Checkbox</label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                                    </label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Radio Box</label>
                                  <div class="col-lg-5">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        Option one
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Option two
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Select Box</label>
                                  <div class="col-lg-2">
                                    <select class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                </div>     

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Select Box</label>
                                  <div class="col-lg-2">
                                    <select multiple="" class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                </div>   

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">CLEditor</label>
                                  <div class="col-lg-6">
                                    <div class="cleditorMain" style="width: auto; height: auto;"><div class="cleditorToolbar" style="height: 53px;"><div class="cleditorGroup" style="width: 145px;"><div class="cleditorButton cleditorDisabled" title="Bold" disabled="disabled"></div><div class="cleditorButton cleditorDisabled" title="Italic" disabled="disabled" style="background-position: -24px center;"></div><div class="cleditorButton cleditorDisabled" title="Underline" disabled="disabled" style="background-position: -48px center;"></div><div class="cleditorButton cleditorDisabled" title="Strikethrough" disabled="disabled" style="background-position: -72px center;"></div><div class="cleditorButton cleditorDisabled" title="Subscript" disabled="disabled" style="background-position: -96px center;"></div><div class="cleditorButton cleditorDisabled" title="Superscript" disabled="disabled" style="background-position: -120px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 73px;"><div class="cleditorButton cleditorDisabled" title="Font" disabled="disabled" style="background-position: -144px center;"></div><div class="cleditorButton cleditorDisabled" title="Font Size" disabled="disabled" style="background-position: -168px center;"></div><div class="cleditorButton cleditorDisabled" title="Style" disabled="disabled" style="background-position: -192px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 73px;"><div class="cleditorButton cleditorDisabled" title="Font Color" disabled="disabled" style="background-position: -216px center;"></div><div class="cleditorButton cleditorDisabled" title="Text Highlight Color" disabled="disabled" style="background-position: -240px center;"></div><div class="cleditorButton cleditorDisabled" title="Remove Formatting" disabled="disabled" style="background-position: -264px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 49px;"><div class="cleditorButton cleditorDisabled" title="Bullets" disabled="disabled" style="background-position: -288px center;"></div><div class="cleditorButton cleditorDisabled" title="Numbering" disabled="disabled" style="background-position: -312px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 49px;"><div class="cleditorButton cleditorDisabled" title="Outdent" disabled="disabled" style="background-position: -336px center;"></div><div class="cleditorButton cleditorDisabled" title="Indent" disabled="disabled" style="background-position: -360px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 97px;"><div class="cleditorButton cleditorDisabled" title="Align Text Left" disabled="disabled" style="background-position: -384px center;"></div><div class="cleditorButton cleditorDisabled" title="Center" disabled="disabled" style="background-position: -408px center;"></div><div class="cleditorButton cleditorDisabled" title="Align Text Right" disabled="disabled" style="background-position: -432px center;"></div><div class="cleditorButton cleditorDisabled" title="Justify" disabled="disabled" style="background-position: -456px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 49px;"><div class="cleditorButton cleditorDisabled" title="Undo" disabled="disabled" style="background-position: -480px center;"></div><div class="cleditorButton cleditorDisabled" title="Redo" disabled="disabled" style="background-position: -504px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 97px;"><div class="cleditorButton cleditorDisabled" title="Insert Horizontal Rule" disabled="disabled" style="background-position: -528px center;"></div><div class="cleditorButton cleditorDisabled" title="Insert Image" disabled="disabled" style="background-position: -552px center;"></div><div class="cleditorButton cleditorDisabled" title="Insert Hyperlink" disabled="disabled" style="background-position: -576px center;"></div><div class="cleditorButton cleditorDisabled" title="Remove Hyperlink" disabled="disabled" style="background-position: -600px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 97px;"><div class="cleditorButton cleditorDisabled" title="Cut" disabled="disabled" style="background-position: -624px center;"></div><div class="cleditorButton cleditorDisabled" title="Copy" disabled="disabled" style="background-position: -648px center;"></div><div class="cleditorButton cleditorDisabled" title="Paste" disabled="disabled" style="background-position: -672px center;"></div><div class="cleditorButton cleditorDisabled" title="Paste as Text" disabled="disabled" style="background-position: -696px center;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup" style="width: 49px;"><div class="cleditorButton" title="Print" style="background-position: -720px center;"></div><div class="cleditorButton" title="Show Source" style="background-position: -744px center; background-color: transparent;"></div></div></div><textarea class="cleditor" name="input" style="display: none; width: 526px;"></textarea><iframe frameborder="0" src="javascript:true;" style="width: 526px;"></iframe></div>
                                  </div>
                                </div>                                 
                                
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="button" class="btn btn-sm btn-default">Default</button>
                                    <button type="button" class="btn btn-sm btn-primary">Primary</button>
                                    <button type="button" class="btn btn-sm btn-success">Success</button>
                                    <button type="button" class="btn btn-sm btn-info">Info</button>
                                    <button type="button" class="btn btn-sm btn-warning">Warning</button>
                                    <button type="button" class="btn btn-sm btn-danger">Danger</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>		
				</div>
				<div class = "col-md-4 col-lg-4">
					<div class = "widget">
						<div class = "widget-head">
							Message/Feedback
						</div>
						<div class = "widget-content">
							<div class = "padd">
								<form class="form-horizontal" role="form">
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Fullname</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Please type your name">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email" class="form-control" placeholder="Please type your email">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Message</label>
                                  <div class="col-lg-8">
                                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                  </div>
                                </div>
								<div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-8">
                                    <button type="button" class="btn btn-sm btn-success btn-block">Send</button>
                                  
                                  </div>
                                </div>
                              </form>

						</div>
						</div>
					</div>		
				</div>
				
				<div class = "col-md-4 pull-right">
					<div class = "widget">
						<div class = "widget-head center">
							 <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>							 
							 <a class="btn btn-social-icon btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-instagram']);"><span class="fa fa-instagram"></span></a>
							 <a class="btn btn-social-icon btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-twitter']);"><span class="fa fa-twitter"></span></a>
						</div>
					</div>
				</div>
			</div>	
		</div>
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
</body>
</html>



