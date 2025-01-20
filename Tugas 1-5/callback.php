<?php
require_once 'assets/vendor/autoload.php';

session_start();

// Konfigurasi Google OAuth
$client = new Google\Client();
$client->setClientId('565051983693-9e9nlogg2d9osi768eomumegtol9sdo8.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Login/callback.php'); // Ubah dengan URL callback Anda

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Ambil informasi pengguna
    $oauth = new Google\Service\Oauth2($client);
    $userInfo = $oauth->userinfo->get();
    $peopleService = new Google\Service\PeopleService($client);
    $profile = $peopleService->people->get('people/me', ['personFields' => 'names,emailAddresses,photos']);

    $_SESSION['name'] = $profile->getNames()[0]->getDisplayName();
    $_SESSION['email'] = $profile->getEmailAddresses()[0]->getValue();
    $_SESSION['picture'] = $profile->getPhotos()[0]->getUrl();

    header('Location: dashboard.php'); // Redirect ke halaman profil
    exit();
} else {
    echo "Error: Tidak dapat mendapatkan kode autentikasi.";
}
