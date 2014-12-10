$( document ).ready(function() {

	var url = 'http://localhost/cimanagment/index.php';
	var username_free = false;
	var email_address_free = false;

	$('#user_form').validationEngine({
        scroll: false,
        promptPosition: 'topLeft',
        //autoHidePrompt : true,
        //autoHideDelay : 20000,
    });

	$('#search').keyup(function(){
		if($('#search').val().length > 3) {
			$.ajax({
				type: "POST",
				url: url+"/index/search",
				data: { keyword: $("#search").val()},
                dataType: "json",
                success: function(response){
                	$('#finalResult').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
							var items=[]; 	
							$.each(obj, function(i,val){											
							    items.push($('<li/>').text(val.username + " " + val.email));
							});
							console.log(items);	
							$('#finalResult').append.apply($('#finalResult'), items);
						}catch(e) {		
							alert('Exception while request..');
						}		
					} else {
						$('#finalResult').html($('<li/>').text("No Data Found"));		
					}
                },
				error: function(){						
					alert('Error while request..');
				}

			})
		}
	});

	$("#add_user_menu").on("click", function() {
		$(".modal-title").html("Add New User");
		if(!$("#password").hasClass("validate[required]"))
		{
			$("#password").addClass("validate[required]");
		}
	});

	$(".table-row").on( "click", function() {
	  	// console.log($(this).attr('user-id'));
	  	if($(this).attr('user-id') > 0){
	  		var user_id = $(this).attr('user-id');
	  		$.ajax({
	  			type: "POST",
	  			url: url+"/index/getUserData",
	  			data: {user_id:user_id},
	  			success: function(response)
	  			{
	  				if(response != "Do not repeat this request!") 
	  				{
	  					var obj = JSON.parse(response);
		  				if(obj.length > 0)
		  				{
		  					if($("#password").hasClass("validate[required]"))
		  					{
		  						$("#password").removeClass("validate[required]");
		  					}
		  					$(".modal-title").html("Update User data");

		  					$("#id").val(obj[0].id);
		  					$("#username").val(obj[0].username);
		  					$("#firstname").val(obj[0].firstname);
		  					$("#lastname").val(obj[0].lastname);
		  					// password
		  					$("#email").val(obj[0].email);
		  					$("#phone").val(obj[0].phone);

		  					if(obj[0].user_type == "user")
		  					{
		  						$('#user').prop('selected', true);
		  					}
		  					else
		  					{
		  						$('#admin').prop('selected', true);	
		  					}
		  					//$("#user_type").val(obj[0].user_type);

		  					//console.log(obj[0].username);

		  				}
	  				} 
	  				else 
	  				{
	  					alert("Do not repeat this request!");
	  				}
	  				
	  			}
	  		})
	  	}
	});

	$("#username").keyup(function(){
		
        if($("#username").val().length >= 4)
        {
        	var username = $("#username").val();
			$.ajax({
	            type: "POST",
	            url: url+"/index/check_user",
	            data: {username:username},
	            success: function(msg){
	            	console.log(msg);
	                if(msg=="true")
	                {
	                	username_free = true;
	                    $("#username").closest(".form-group").removeClass('has-error has-feedback');
	                    $("#email").closest(".glyphicon").addClass('hidden');
	                }
	                else
				    {
				    	console.log("foglalt"+$("#username").closest(".form-group").attr('id'));
				    	username_free = false;
	                    $("#username").closest(".form-group").addClass('has-error has-feedback');
	                    $("#email").closest(".glyphicon").removeClass('hidden');
	                }
	            }
	        });
		 
		}
    });
	
	$("#email").keyup(function(){
        
        if($("#email").val().length >= 4)
        {
        	var email = $("#email").val();
			$.ajax({
	            type: "POST",
	            url: url+"/index/check_email",
	            data: {email:email},
	            success: function(msg){
	            	console.log(msg);
	                if(msg=="true")
	                {
	                	email_address_free = true;
	                    $("#email").closest(".form-group").removeClass('has-error has-feedback');
	                    $("#email").closest(".glyphicon").addClass('hidden');
	                }
	                else
				    {
				    	// console.log("foglalt email "+$("#email").closest(".form-group").attr('id'));
				    	email_address_free = false;
	                    $("#email").closest(".form-group").addClass('has-error has-feedback');
	                    $("#email").closest(".glyphicon").removeClass('hidden');
	                }
	            }
	        });
		 
		}

    });

    $('#user_form_submit').on("click", function(e) {
        e.preventDefault();
        if ($("#user_form").validationEngine('validate') && username_free == true) {
        	
            $("#user_form").submit();
        }
    });

    $('[data-dismiss=modal]').on('click', function (e) {
    	var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

	  $(target)
	    .find("input,textarea,select")
	       .val('')
	       .end()
	    .find("input[type=checkbox], input[type=radio]")
	       .prop("checked", "")
	       .end();
	});

	$(".delete_btn").on('click', function (){

		var user_id = $(this).attr('user-id');
		if(user_id > 0){
			$.ajax({
	            type: "POST",
	            url: url+"/index/delete_user",
	            data: {user_id:user_id},
	            success: function(msg){
	                if(msg=="true")
	                {
	                    $("#row-"+user_id).remove();
	                }
	                else
				    {
	                    alert("Delete failed!");
	                }
	            }
	        });
	    } else {
	    	alert('Delete failed!');
	    }
	});
    
});