<?php
require_once 'assets/vendor/autoload.php';

use Facebook\Facebook;

session_start();

$fb = new Facebook([
    'app_id' => '1260935755163657',
    'app_secret' => '9dba69046b8d554b7cedbfd7934985f2',
    'default_graph_version' => 'v16.0', // Gunakan versi terbaru
]);

// URL login Facebook
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Izin yang diperlukan
$floginUrl = $helper->getLoginUrl('http://localhost/Login/fbcallback.php', $permissions);

// Konfigurasi Google OAuth
$client = new Google\Client();
$client->setClientId('565051983693-9e9nlogg2d9osi768eomumegtol9sdo8.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Login/callback.php'); // Ubah dengan URL callback Anda
$client->addScope('email');
$client->addScope('profile');

// Redirect ke URL Google untuk login
$GloginUrl = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to VoluntApp</title>
  <link rel="stylesheet" href="assets/style.css"/>
  <link rel="stylesheet" href="assets/font-awesome/css/all.min.css" />
</head>
<body>
  <div class="container">
    <div class="logo">
      <i class="fa-solid fa-v fa-2xl" style="color: #ffffff;"></i>
    </div>
    <h1 class="app-name">VoluntApp</h1>
    <div class="auth-buttons">
      <a href="signup_email.html" class="auth-button email" style="background-color: #4285f4; color: white;">
        <i class="fa-solid fa-envelope"></i>
        Sign Up with Email
      </a>
      <a href="<?= $floginUrl ?>" class="auth-button facebook" style="background-color: #3b5998; color: white;">
        <i class="fa-brands fa-facebook"></i>
        Sign Up with Facebook
      </a>
      <a href="<?= $GloginUrl ?>" class="auth-button google" style="background-color: #db4437; color: white;">
        <i class="fa-brands fa-google"></i>
        Sign Up with Google
      </a>
    </div>
  </div>
  <footer>
    <p>&copy; 2025 Dwiki Nur Setiyanto. All rights reserved.</p>
  </footer>
</body>
</html>
