<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('car-repair-html-template.jpeg'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
        }

        .feedback-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h2>Customer Feedback Form</h2>
        <form action="submit_feedback.php" method="post">
            <div class="form-group">
                <label for="customer_name">Your Name:</label>
                <input type="text" id="customer_name" name="customer_name">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            
            <div class="form-group">
                <label for="feedback_text">Feedback:</label>
                <textarea id="feedback_text" name="feedback_text" rows="4" cols="50"></textarea>
            </div>
            
            <div class="form-group">
                <label for="rating">Rating (1-10):</label>
                <input type="number" id="rating" name="rating" min="1" max="10">
            </div>
            
            <input type="submit" value="Submit Feedback">
        </form>
    </div>

    <script>
    // Slide-in animation for input fields
    document.addEventListener("DOMContentLoaded", function() {
        const formContainer = document.querySelector(".feedback-container");
        formContainer.style.opacity = 0;
        formContainer.style.transform = "translateY(-20px)";

        setTimeout(function() {
            formContainer.style.opacity = 1;
            formContainer.style.transform = "translateY(0)";

            // Get all input elements
            const inputFields = document.querySelectorAll('.form-group input, .form-group textarea');

            // Apply slide-in animation to input fields
            inputFields.forEach((input, index) => {
                input.style.transitionDelay = `${index * 100}ms`;
                input.style.transform = "translateX(0)";
            });

            // Apply scale-up animation to submit button
            const submitBtn = document.querySelector('input[type="submit"]');
            submitBtn.style.transitionDelay = `${inputFields.length * 100}ms`;
            submitBtn.style.transform = "scale(1)";
        }, 100);
    });
</script>

</body>
</html>
