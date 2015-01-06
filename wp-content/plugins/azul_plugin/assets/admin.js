jQuery(document).ready(function($){
    
    // WYSIWYG
    $('.wysiwyg').cleditor({
        width: '79.6%',
        height: 200
        
    })
    
    // jQuery UI Date Picker
    $(function() {
        /*$(".date-picker").datepicker();
        $(".date-picker").change(function() {
            $( this ).datepicker( "option", "dateFormat", 'd MM, yy' );
        });*/
    	$(".date-picker").datetimepicker()
    });
    
    // Message
    $(".fade").animate({
        width:'auto'
    }, 2500).slideToggle(350);

    // Delete Confirmation
    $(".fw-delete").click(function(){
        var answer = confirm("Are you sure?")
        if (answer){
            return true;
        }
        else{
            return false;
        }
    })  
    
    //Upload file
    $(".upload_image_button").click(function() {
        
        
        
       formfield = $(this).parent().find(".upload_image").attr('name');
        
        imginputbox = $(this).parent().find(".upload_image").attr('id');
        
        
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        $("#TB_window").attr('style', 'display:block; width:670px; position:fixed; top:100px; left:50%; margin-left:-335px');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = $('img',html).attr('src');
        $('#'+imginputbox).val(imgurl);
        tb_remove();
    }
    	
})