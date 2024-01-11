<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
    <input type="text" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <input type="text" name="amt" id="amt" placeholder="Enter amt"/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>

<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();
        var options = {
            "key": "rzp_test_mzPOhojGDaG2AX", // Enter the Key ID generated from the Dashboard
            "amount": amt * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Bike Service Managment", // your business name
            "description": "Test Transaction",
            "image": "https://www.shutterstock.com/image-vector/mountain-bike-wrench-logo-template-260nw-1939983169.jpg",
            
            "handler": function (response){
                jQuery.ajax({ 
                    type: 'post',
                    url: 'payment_process.php',
                    data: "payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
                    success: function(result){
                        window.location.herf="thank_you.php";
                    }
                });
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>
