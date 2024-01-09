


<!DOCTYPE html>
<html>
<head>
    <title>REQUEST PAGE</title>
    <style>
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    /* background-color:#8FBC8F ; */
    /* background-image: url('img/service1.jpeg'); */
}

.background-image {
    /* background-image: url('service1.jpeg'); */
    /* background-size: cover; /* or contain, depending on your preference */
    /* background-repeat: no-repeat; */ 
    /* Additional styles for positioning, etc. */
  }
.background{
    width: 400px;
    height: 500px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 190px;
    width: 180px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -130px;
    top: -100px;
}

.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -130px;
    bottom: -100px;
}
form{
    height: 700px;
    width: 450px;
    background-color:#8FBC8F ;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
/* /* form *{
    font-family: 'Poppins',sans-serif;
    color: #000000 ;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
} 
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
} */

label {
  display: block;
  margin-top: 30px;
  font-size: 20px;
  font-weight: 500;
}

    input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 16px;
    font-weight: 300;
    }

::placeholder{
    color: #e5e5e5;
}
button {
  margin-top: 50px;
  width: 100%;
  background-color: #ffffff;
  color: #080710;
  padding: 15px 0;
  font-size: 18px;
  font-weight: 600;
  border-radius: 5px;
  cursor: pointer;
}

.social{
  margin-top: 30px;
  display: flex;
}
.social div {
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255, 255, 255, 0.27);
  color: #eaf0fb;
  text-align: center;
}

.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

.bcimg{
    width: 100%;
    filter: blur(10px);

}



    </style>
</head>

<body>

    <img class="bcimg" src="img/service1.jpeg" alt="">


<!-- <div class="background-image"></div> -->
<div class="background">
    <div class="container">

        <form action="submit_service_request.php" method="post">

                <h1>REQUEST PAGE</h1>

                <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>

<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" title="Please enter a valid phone number (exactly 10 digits)">

            <label for="bike_model">Bike Model:</label>
            <select id="bike_model" name="bike_model" required>
                <option value="">Select a bike model</option>
                <option value="hero_splendor">Hero Splendor</option>
                <option value="bajaj_pulsar">Bajaj Pulsar</option>
                <option value="royal_enfield_classic">Royal Enfield Classic</option>
                <option value="tv_apache">TVS Apache</option>
                <option value="honda_cb_shine">Honda CB Shine</option>
                <option value="suzuki_gixxer">Suzuki Gixxer</option>
                <option value="yamaha_fz">Yamaha FZ</option>
                <option value="kawasaki_ninja">Kawasaki Ninja</option>
                <option value="mahindra_mojo">Mahindra Mojo</option>
                <option value="ktm_duke">KTM Duke</option>
            </select>


                <label for="service_type">Service Type:</label>
                <select id="service_type" name="service_type" required>
                    <option value="" disabled selected>Select Service Type</option>
                    <option value="Diagnostic Test">Diagnostic Test</option>
                    <option value="Engine Servicing">Engine Servicing</option> 
                    <option value="Tires Replacement">Tires Replacement</option> 
                    <option value="oil_change">Oil Changing</option>
                </select>

                <label for="service_time">Select Time:</label>
                    <select id="service_time" name="service_time" required>
                        <option value="" disabled selected>Select Service Time</option>
                        <option value="08:00">08:00 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <!-- Add more time options as needed -->
                    </select>

                    <label for="service_date">Service Date:</label>
                <input type="date" id="service_date" name="service_date" min="<?php echo date('Y-m-d'); ?>" required>
                <script>
                // Get a reference to the service_date input field
                const serviceDateInput = document.getElementById('service_date');

                // Add an event listener to the input field for change events
                serviceDateInput.addEventListener('change', function() {
                // Get the selected date as a Date object
                const selectedDate = new Date(serviceDateInput.value);

                // Get today's date as a Date object
                const today = new Date();

                // Calculate a Date object for 5 days in the future
                const fiveDaysInFuture = new Date(today);
                fiveDaysInFuture.setDate(today.getDate() + 5);

                // Check if the selected date is in the past or more than 5 days in the future
                if (selectedDate < today || selectedDate > fiveDaysInFuture) {
                    // Display an error message
                    alert('Please select a date within the next 5 days and not in the past.');
                    // Reset the input field to today's date
                    serviceDateInput.valueAsDate = today;
                        }
                        });
                    </script>
                   <label for="service_price">Service Price:</label>
<select id="service_price" name="service_price" required>
    <option value="" disabled selected>Select Service Price</option>
    <option value="300">Diagnostic Test -300 INR</option>
    <option value="2000">Engine Servicing -2000 INR</option>
    <option value="2500">Tires Replacement -2500 INR</option>
    <option value="600">Oil Changing -600  INR</option>
</select>


                <input type="submit" value="Submit">
      </form>
      </div>
</div>

   
</body>
</html>



