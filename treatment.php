<?php
// Form to request animal treatment
?>
<!DOCTYPE html>
<html>
<head>
    <title>Animal Treatment Request</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #eef3f7;
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

        .right-section {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .form-section, .info-section {
            padding: 40px;
            flex: 1;
            overflow-y: auto;
        }

        .form-section {
            background-color: #ffffff;
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

        .info-section {
            background-color: #fefefe;
            border-top: 2px solid #ddd;
        }

        .info-section h3 {
            color: #34495e;
            margin-bottom: 15px;
        }

        .info-section ul {
            list-style-type: disc;
            padding-left: 20px;
            line-height: 1.8;
            font-size: 16px;
            color: #333;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .image-section, .right-section {
                width: 100%;
                height: auto;
            }

            .info-section {
                border-left: none;
                border-top: 2px solid #ddd;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="image-section">
        <img src="images/treatment.webp" alt="Animal Treatment">
    </div>

    <div class="right-section">
        <div class="form-section">
            <h2>Animal Treatment Request</h2>
            <form action="treatment_submit.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="location" placeholder="Animal Location" required>
                <textarea name="details" placeholder="Details" rows="5" required></textarea>
                <button type="submit">Submit Request</button>
            </form>
        </div>

        <div class="info-section">
            <h3>Basic Animal Treatment Steps</h3>
            <ul>
                <li>Keep the animal calm and avoid sudden movements.</li>
                <li>Provide clean drinking water, if safe.</li>
                <li>Stop any visible bleeding using a clean cloth.</li>
                <li>Do not give human medicines to animals.</li>
                <li>Avoid feeding until a vet checks the animal.</li>
                <li>Keep the injured animal in a quiet and warm area.</li>
                <li>Note symptoms like limping, bleeding, or vomiting.</li>
                <li>Contact a veterinarian or animal rescue service immediately.</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
