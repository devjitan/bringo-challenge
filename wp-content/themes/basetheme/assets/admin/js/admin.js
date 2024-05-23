// Admin Script
jQuery( document ).ready(function($) {
    

    // Post Expiration Script
    var enableExp = $('#id_post_expiration input[name="enable-expiration"]:checked').length > 0;
    // Disabled
    if(!enableExp){
        $("#id_post_expiration .expiration-date input").prop('disabled', true);
        $("#id_post_expiration .expiration-date select").prop('disabled', true);
    }
    $('#id_post_expiration input[name="enable-expiration"]').change(function() {
        if(this.checked) {
            var returnVal = confirm("Are you sure you want to enable expiration on this post?");
            $(this).prop("checked", returnVal);
        }
        if(this.checked){
            $(this).val(1);    
            $("#id_post_expiration .expiration-date input").prop('disabled', false);
            $("#id_post_expiration .expiration-date select").prop('disabled', false);
        }else{
            $(this).val(0);   
            $("#id_post_expiration .expiration-date input").prop('disabled', true);
            $("#id_post_expiration .expiration-date select").prop('disabled', true);
        }
    });

    // Update Post Status
    if($('.expiration_post_status').length){
        
        var selected = $('.expiration_post_status').val() == 'expired' ? 'selected':'';
        $("select#post_status").append('<option value="expired" '+selected+'>Expired</option>');
        if(selected){
            $(".misc-pub-section #post-status-display").text("Expired");
            setTimeout(function(){
                if($('.components-panel').length){
                    $('.edit-post-post-status h2').after('<div class="components-panel__row edit-post-post-visibility"><span>Status</span><div><strong>Expired</strong></div></div>');
                }
            }, 500);
        }

    }



    


});