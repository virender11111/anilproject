/**
 * document ready
 *
 * @return void
 */
$(document).ready(function() {
    $(document).on("click", ".email_tick_all", function(e) {
        if (this.checked) { // check select status
            $('.email_tick').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        } else {
            $('.email_tick').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });
        }
    });
    
});