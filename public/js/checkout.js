Stripe.setPublishableKey('pk_test_4imEmLA13YPxH2nU8TSfcM1P');

 var $form = $('#checkout-form');

 $form.submit(function(event){

    $('#err').addClass('hidden');
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken({
        number: $('#card').val(),
        cvc: $('#cvc').val(),
        exp_month: $('#card-exp-month').val(),
        exp_year: $('#card-exp-year').val(),
        name: $('#card-holder').val()
      }, stripeResponseHandler);


      return false;
 });

 function stripeResponseHandler(status, response){
    if(response.error){
        $('#err').removeClass('hidden');
        $('#err').text(response.error.message);
        $form.find('button').prop('disabled',false);
     
    }
    else{
        var token = response.id;
        $form.append($('<input type="hidden" name="token" />').val(token));
        
        $form.get(0).submit();
    }
 }
