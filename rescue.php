<?php
// Full-width animal rescue request form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Animal Rescue Request</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            width: 100vw;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            height: 100%;
        }

        .image-section {
            width: 50%;
            overflow: hidden;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-section {
            width: 50%;
            padding: 50px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            padding: 15px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #219150;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .image-section, .form-section {
                width: 100%;
                height: 50%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="image-section">
        <img src="images/rescue.jpg" alt="Rescue Animal">
    </div>
    <div class="form-section">
        <h2>Animal Rescue Request</h2>
        <form action="rescue_submit.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="location" placeholder="Animal Location" required>
            <textarea name="details" placeholder="Details" rows="5" required></textarea>
            <button type="submit">Submit Request</button>
        </form>
    </div>
</div>

</body>
</html>
