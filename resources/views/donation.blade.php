@extends('layouts.app')

 @section('content')

<form action="{{ route('create-payment') }}" method="post">
  @csrf

<input type="text" name="name" id="name" placeholder="leave it blank if you want to be annonymous">
<input type="text" name="amount" id="amount">
<input type="submit" value="Pay Now">
</form>

<div id="paypal-button"></div>

<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ATAWA6JeTzh-x6i1c2vr7t4EZYTjAvTMuzuLQB5TG0dlERLTHwsGRRovTO2QtpSDCpiU7cNu3X7NXVwP',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
     
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        redirect_urls:{
          return_url:'http://petshare1.test/execute-payment'
        },
        transactions: [{
          amount: {
            total: '20',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      // return actions.payment.execute().then(function() {
      //   // Show a confirmation message to the buyer
      //   window.alert('Thank you for your purchase!');
      // });
      return actions.redirect();
      
    }
  }, '#paypal-button');

</script> 
@endsection