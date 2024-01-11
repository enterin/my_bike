<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            max-width: 800px; /* Increased max-width for a wider form */
            padding: 40px; /* Increased padding for more height */
            background: #6495ED; /* Darker Blue Background Color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            color: #000; /* Black Text Color */
        }

        input[type="text"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #000; /* Black Text Color */
        }

        input[type="button"] {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        input[type="button"]:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <form>
        <h2>Payment Process</h2>
        <input type="text" name="name" id="name" placeholder="Enter your name"/><br/><br/>
        <input type="text" name "amount" id="amt" placeholder="Enter amt"/><br/><br/>
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
    </form>
</body>
</html>


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
