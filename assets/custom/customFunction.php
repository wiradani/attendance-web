<script type="text/javascript">
    var id = null;
    var URL = window.location.href;

    function effect_msg_form() {    
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
        $('.msg').show(2000);
        setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
    }

    function effect_msg() {     
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
        $('.msg').show(1000);
        setTimeout(function() { $('.msg').fadeOut(2000); }, 2000);
            
    }

    function effect_msg2(timer) {     
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
        $('.msg').show(1000);
        setTimeout(function() { $('.msg').fadeOut(2000); }, timer);
            
    }
    
    function sendRequest(e,formdata, urlrequest, urlpass){
        console.log(formdata);
         e.preventDefault();
        $.ajax({
                method: 'POST',
                cache: false,
                contentType : false,
                processData : false,
                secureuri   :false,
                url: '<?php echo site_url() ?>'+urlrequest,
                data: formdata
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            console.log(data);
            if (out.status === 'form') {
                    $('.msg').html(out.msg); effect_msg();
            } else {
                $('.msg').html(out.msg); effect_msg();
                setTimeout(function() {window.location.href = '<?php echo site_url() ?>'+urlpass;} ,3000);
            }
        }); e.preventDefault();
    } 
    
    function sendRequest2(e,formdata, urlrequest, urlpass, timer){
         e.preventDefault();
        $.ajax({
                method: 'POST',
                cache: false,
                contentType : false,
                processData : false,
                secureuri   :false,
                url: '<?php echo site_url() ?>'+urlrequest,
                data: formdata
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status === 'form') {
                    $('.msg').html(out.msg); effect_msg2(timer);
            } else {
                $('.msg').html(out.msg); effect_msg2();
                setTimeout(function() {window.location.href = '<?php echo site_url() ?>'+urlpass;} ,3000);
            }
        }); e.preventDefault();
    } 
    
    
    function sendRequestSPBUPriorityExcel(e,formdata, urlrequest, urlpass){
         e.preventDefault();
        $.ajax({
                method: 'POST',
                cache: false,
                contentType : false,
                processData : false,
                secureuri   :false,
                url: '<?php echo site_url() ?>'+urlrequest,
                data: formdata
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status === 'form') {
                    $('.msg').html(out.msg); effect_msg();
            } else {
                if (out.int_duplicate === '1') {
                    $('.msg').html(out.msg); effect_msg();
                    setTimeout(function() {
                        window.location.href = '<?php echo site_url() ?>'+urlpass;
                    } ,3000);
                    // setTimeout($.ajax({
                    //     method: 'POST',
                    //     cache: false,
                    //     contentType : false,
                    //     processData : false,
                    //     secureuri   :false,
                    //     url: '<?php echo site_url("alert/SPBUPriority/Delete_SPBU_Duplicate") ?>',
                    //     data: formdata
                    // }), 10000);
                }else if(out.int_duplicate === '0') {
                    $('.msg').html(out.msg); effect_msg();
                    setTimeout(function() {
                        window.location.href = '<?php echo site_url("alert/SPBUPriority") ?>';
                    } ,3000);
                }
            }

        }); e.preventDefault();
    } 
    
    function sendRequestImportBatch(e,formdata, urlrequest, urlpass){
         e.preventDefault();
        $.ajax({
                method: 'POST',
                cache: false,
                contentType : false,
                processData : false,
                secureuri   :false,
                url: '<?php echo site_url() ?>'+urlrequest,
                data: formdata
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status === 'form') {
                $('.msg').html(out.msg); 
                effect_msg();
            } else {
                $('.msg').html(out.msg); 
                effect_msg();
                setTimeout(function() {
                    window.location.href = '<?php echo site_url() ?>'+urlpass;
                } ,3000);
            }
        }); e.preventDefault();
    } 

    function sendRequestLog(e,formdata, urlrequest){
        e.preventDefault();
        $.ajax({
                method: 'POST',
                cache: false,
                contentType : false,
                processData : false,
                secureuri   :false,
                url: '<?php echo site_url() ?>'+urlrequest,
                data: formdata
        });
    }
    
    function sendDeleteRequest(id,urlrequest,urlpass,popupid){
        $.ajax({
                method: "POST",
                url: "<?php echo site_url(); ?>"+urlrequest,
                data: "id=" +id,
                success: function(data){
                    $('#'+popupid).modal('hide');
                    $('.msg').html(data);
                    effect_msg();
                    setTimeout(function(){window.location.href = '<?php echo site_url() ?>'+urlpass;}
                    , 2200);
                }
        });
    }
	
	    var MyTable = $('.table-general').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

</script>