<?php include '../Globalheader/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Global Tour and Travel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
        }

        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container p {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .contact-form button {
            padding: 15px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #4cae4c;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            .contact-form input,
            .contact-form textarea {
                padding: 12px;
                margin: 8px 0;
            }

            .contact-form button {
                padding: 12px;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 10px;
                padding: 10px;
            }

            .contact-form input,
            .contact-form textarea {
                padding: 10px;
                margin: 6px 0;
            }

            .contact-form button {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us. We would love to hear from you!</p>
        <p>Address: Ghorahi Dang, Nepal</p>
        <p>Email: contact@globaltourandtravel.com</p>
        <p>Phone: +123 456 7890</p>
        <form id="contactForm" class="contact-form">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="phone" placeholder="Your Phone (optional)">
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('contactustestandcss.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        this.reset();
                    }
                })
                .catch(error => {
                    alert('An error occurred. Please try again.');
                    console.error('Error:', error);
                });
        });
    </script>
</body>
<?php include '../global footer/footer.php'; ?>

</html>