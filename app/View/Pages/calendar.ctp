<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <div class="buzz-right-page buzz-inner-page">
        <div class="Calendar index">
			<div id="calendar"></div>
        </div>
    </div>
    <div id="calendarModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="" class="modal-title">Event</h4>
                </div>
                <div id="modalBodyqq" class="modal-body"> 
                    <div class="row">
	                   <div class="col-xs-4">Title</div>
	                   <div class="col-xs-6" id="modalTitle"></div>
                    </div>
                    <div class="row">
	                   <div class="col-xs-4">Description</div>
	                   <div class="col-xs-6" id="modalBody"></div>
                    </div>
                    <div class="row">
	                   <div class="col-xs-4">Start Date</div>
	                   <div class="col-xs-6" id="start"></div>
    	           </div>
                    <div class="row">
	                   <div class="col-xs-4">End Date</div>
	                   <div class="col-xs-6" id="end"></div>
    	           </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <?php echo $this->start('footer_js');?>
    <script type="text/javascript"></script>
<?php echo $this->end();?>