$(function() {

  $.validator.setDefaults({
  	errorClass: 'help-block',
  	highlight: function(element){
  		$(element)
  		.closest('.form-group')
  		.addClass('has-error');
  	},
  	unhighlight: function(element){
  		$(element)
  		.closest('.form-group')
  		.removeClass('has-error');
  	},
  	errorPlacement: function(error,element){
  		if(element.prop('type') === 'radio'){
  			error.insertAfter(element.parent());
  		}else{
  			error.insertAfter(element);	 
  		}
  	}
  });	

  $.validator.addMethod( "validMobileNumber", function( value, element ) {

	return this.optional( element ) || /^[0-9]{10}$/.test( value );

}, "Please specify a valid mobile number" );

  $.validator.addMethod( "validName", function( value, element ) {

	return this.optional( element ) || /^[a-z]+$/i.test( value );

}, "Letters only please" );


  $("#publicRegistration").validate({

  			rules: {

  				Email: {
  					 required: true,
  					 email: true
  				},

  				MobileNumber:{
  					 required: true,
  					 validMobileNumber: true,
  				},

  				username:{
  					required: true,
  					validName: true
  				}


  			},

  			messages: {
  				Email: {
  					required: 'Please Enter your email,',
  					email: 'Please Enter a valid email address.'

  				},

  				MobileNumber:{
  					required: 'Please Enter your Mobile-Number.',
  					validMobileNumber: 'Please Enter a valid Mobile-Number.'
  				},

  				username:{
  					required: 'Please Enter your Name.',
  					validMobileNumber: 'Please Enter a valid Name.'

  				}
  			}
  });
});