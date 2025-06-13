<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helping Paws - NGO for Injured Animals</title>
    <style>
        /* Existing styles... */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    background-color: lightgoldenrodyellow;
}
header {
    background-color: lightgreen;
    color: white;
    padding: 20px;
    text-align: center;
}
nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    background-color: lightseagreen;
    padding: 10px;
    gap: 10px;
}
@media (max-width: 768px) {
    nav {
        flex-direction: column;
    }

    nav a {
        width: 90%;
        text-align: center;
        font-size: 18px;
    }
}


nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

nav a:hover {
    background-color: #343a40;
}
.hero {
    text-align: center;
    padding: 100px;
    background: url('images/Hero.png') no-repeat center center/cover;
    color: white;
}

section {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}
.services,
.gallery,
.donation-feedback {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
}
.services div,
.gallery img,
.donation-feedback div {
    flex: 1 1 calc(33% - 20px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 5px;
    padding: 15px;
    text-align: center;
}
.gallery {
    gap: 15px;
}
.gallery img {
    height: 300px;
    width: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: transform 0.3s;
}
.gallery img:hover {
    transform: scale(1.05);
}
.services div:hover {
    transform: scale(1.05);
}
.donation-feedback img {
    width: 50%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
    max-width: 500px;
    margin: auto;
}
form input,
form textarea,
form button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}
form button {
    background-color: #6c757d;
    color: white;
    cursor: pointer;
}
form button:hover {
    background-color: #5a6268;
}
footer {
    background-color: #6c757d;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: 20px;
}

/* Modal Styles */
.modal {
    display: none; 
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
.close {
    float: right;
    font-size: 24px;
    cursor: pointer;
}

/* ✅ Mobile Responsive Fixes */
@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: center;
    }

    nav a {
        margin: 5px 0;
        width: 100%;
        text-align: center;
    }

    .services,
    .donation-feedback,
    .gallery {
        flex-direction: column;
        align-items: center;
    }

    .services div,
    .donation-feedback div {
        flex: 1 1 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .gallery img {
        width: 90%;
        height: auto;
        max-width: 200px;
        margin-bottom: 10px;
    }

    form {
        width: 90%;
        max-width: 100%;
        padding: 10px;
    }

    form input,
    form textarea,
    form button {
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    .modal-content {
        width: 95%;
        margin-top: 20%;
    }
}
</style>

</head>
<body>
    <header>
        <h1>Helping Paws</h1>
        <p>Giving Hope to Injured Animals</p>
    </header>
    <nav>
        <a href="#about">About Us</a>
        <a href="#services">Services</a>
        <a href="#gallery">Gallery</a>
        <a href="#contact">Contact Us</a>
        <a href="#donation">Donation</a>

<a href="#" onclick="openModal('loginModal')">Login</a>
<a href="#" onclick="openModal('signupModal')">Signup</a>

    </nav>
    <div class="hero">
        <h2>Join Us in Saving Lives</h2>
        <p>Your small help can make a big difference.</p>
    </div>
    <section id="about">
        <h2>About Us</h2>
        <p>Helping Paws is a non-profit organization dedicated to rescuing and rehabilitating injured animals. Our mission is to provide medical aid, shelter, and a second chance at life for animals in need.</p>
    </section>
    <section id="services">
    <h2>Our Services</h2>
    <div class="services">
        <div onclick="location.href='rescue.php'" style="cursor:pointer;">
            <h3>Animal Rescue</h3>
            <p>Immediate response to rescue injured animals in distress.</p>
        </div>
        <div onclick="location.href='treatment.php'" style="cursor:pointer;">
            <h3>Medical Treatment</h3>
            <p>Providing essential medical care and rehabilitation for injured animals.</p>
        </div>
        <div onclick="location.href='adoption.php'" style="cursor:pointer;">
            <h3>Adoption Services</h3>
            <p>Finding loving homes for rescued animals.</p>
        </div>
    </div>
</section>

    <section id="gallery">
        <h2>Gallery</h2>
        <div class="gallery">
            <img src="images/Gallery1.jpg" alt="Animal 1">
            <img src="images/Gallery2.jpg" alt="Animal 2">
            <img src="images/Gallery3.jpg" alt="Animal 3">
            <img src="images/Gallery4.jpg" alt="Animal 4">
            <img src="images/Gallery5.png" alt="Animal 5">
            <img src="images/Gallery6.png" alt="Animal 6">
            
        </div>
    </section>
    <!-- Donation Section -->
    <section id="donation">
        <h2>Make a Donation</h2>
        <div class="donation-feedback">
            <div>
                <img src="images/donate.jpg" alt="Donate" />
                <h3>Your Contribution Can Save Lives</h3>
                <p>Help us continue our mission by donating. Your donation will go towards providing medical care, shelter, and rehabilitation for injured animals.</p>
            </div>
        </div>
    </section>
    <section id="contact">
    <h2>Contact Us</h2>
    <form action="contact.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="mobile" placeholder="Contact Number" required><br><br>
    <textarea name="message" placeholder="Message" required></textarea><br><br>
    <input type="file" name="image" accept="image/*">Share screenshot of donation or injured Animals<br><br>
    <button type="submit">Submit</button>
</form>

</section>

    <footer>
        <p>&copy; 2025 Helping Paws. All Rights Reserved.</p>
    </footer>
    <script src="script.js"></script>
    <!-- Login Modal -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('loginModal')">&times;</span>
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</div>

<!-- Signup Modal -->
<div id="signupModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('signupModal')">&times;</span>
    <h2>Signup</h2>
    <form action="signup.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Signup</button>
    </form>
  </div>
</div>

<!-- Modal Styles -->
<style>
.modal {
  display: none; 
  position: fixed;
  z-index: 1000;
  left: 0; top: 0;
  width: 100%; height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}
.modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  max-width: 400px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
.close {
  float: right;
  font-size: 24px;
  cursor: pointer;
}
</style>

<!-- Modal Script -->
<script>
function openModal(id) {
  document.getElementById(id).style.display = "block";
}
function closeModal(id) {
  document.getElementById(id).style.display = "none";
}
window.onclick = function(event) {
  ['loginModal', 'signupModal'].forEach(function(id) {
    const modal = document.getElementById(id);
    if (event.target == modal) modal.style.display = "none";
  });
}
</script>

</body>
</html>
