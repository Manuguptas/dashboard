<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get in Touch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f2f7 0%, #c8e6f0 100%); /* Soft gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .contact-form-container {
            max-width: 550px; /* Slightly wider form */
            width: 100%;
            background-color: #ffffff;
            padding: 40px; /* More padding */
            border-radius: 15px; /* Softer rounded corners */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* More pronounced shadow */
            position: relative;
            overflow: hidden; /* Ensure no overflow from pseudo-elements */
        }

        .contact-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px; /* Accent bar at the top */
            background: linear-gradient(90deg, #6c5ce7 0%, #a29bfe 100%); /* Gradient accent */
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .contact-form-container h4 {
            color: #4a4a4a;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            font-size: 2rem; /* Larger heading */
            position: relative;
        }

        .contact-form-container h4::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #6c5ce7; /* Underline for heading */
            border-radius: 2px;
        }

        .form-label {
            font-weight: 600;
            color: #555555;
            margin-bottom: 8px; /* Space below label */
        }

        .input-group {
            position: relative;
            margin-bottom: 20px; /* Space between input groups */
        }

        .input-group .form-control {
            padding-left: 45px; /* Space for icon */
            border-radius: 8px; /* Rounded input fields */
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .input-group .form-control:focus {
            border-color: #6c5ce7; /* Purple border on focus */
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25); /* Purple shadow on focus */
        }

        .input-group .form-control::placeholder {
            color: #a0a0a0;
            font-style: italic;
        }

        .input-group-text {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            color: #6c5ce7; /* Icon color */
            font-size: 1.1rem;
            z-index: 2; /* Ensure icon is above input */
        }

        textarea.form-control {
            resize: vertical; /* Allow vertical resizing */
            min-height: 120px; /* Minimum height for textarea */
            padding-left: 15px; /* No icon in textarea, so no left padding adjustment */
        }

        .btn-primary {
            background: linear-gradient(45deg, #6c5ce7 0%, #a29bfe 100%); /* Gradient button */
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 25px; /* More space above button */
            border-radius: 8px; /* Rounded button */
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3); /* Button shadow */
            transition: all 0.3s ease;
            position: relative; /* For the glow effect */
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-3px); /* Lift effect on hover */
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        /* Glow effect on button hover */
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .btn-primary:hover::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        .alert {
            margin-top: 20px;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            padding: 15px;
            border: none;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 5px solid #dc3545;
        }
    </style>
</head>

<body>

    <div class="contact-form-container">
        <form action="email.php" method="post">
            <h4>Get in Touch</h4>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject of your message" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label visually-hidden">Message</label> <textarea class="form-control" id="message" name="message" rows="6" placeholder="Type your message here..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i> Send Message
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
    // The PHP code for sending emails should ideally be in a separate file (e.g., email.php)
    // and handled securely to prevent direct execution in the HTML.
    // For demonstration, I'm keeping it here, but best practice is a separate file.

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']); // Sanitize input
        $email = htmlspecialchars($_POST['email']); // Added email field
        $subject = htmlspecialchars($_POST['subject']); // Sanitize input
        $message = htmlspecialchars($_POST['message']); // Sanitize input

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'manugulta453@gmail.com'; // 🔁 Your Gmail address
            $mail->Password = 'jnsoabcvfgmpjjxs';     // 🔁 App password or real password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom($email, $name); // Set sender's email from the form
            $mail->addAddress('yourgmail@gmail.com'); // 🔁 Or another email to receive

            // Content
            $mail->isHTML(true);
            $mail->Subject = "New Message: $subject";
            $mail->Body = "
                <h4>You have a new message</h4>
                <p><strong>From:</strong> $name ($email)</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
            ";

            $mail->send();
            echo '<div class="alert alert-success mt-3" role="alert"><i class="fas fa-check-circle me-2"></i>Message sent successfully!</div>';
        } catch (Exception $e) {
            echo '<div class="alert alert-danger mt-3" role="alert"><i class="fas fa-exclamation-triangle me-2"></i>Mailer Error: ' . $mail->ErrorInfo . '</div>';
        }
    }
    ?>

</body>

</html>