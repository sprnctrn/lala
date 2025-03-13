<?php
function isFacebookBot() {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $botPatterns = [
        'facebookexternalhit', 'facebookbot', 'crawler', 'spider', 'robot', 'crawling',
        'googlebot', 'bingbot', 'yandexbot', 'duckduckbot'
    ];
    
    foreach ($botPatterns as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            return true;
        }
    }

    // Deteksi IP Facebook Crawler
    $fbIps = [
        '69.171.', '31.13.', '66.220.', '173.252.', '204.15.20.', '69.63.', '157.240.'
    ];
    
    foreach ($fbIps as $ip) {
        if (strpos($_SERVER['REMOTE_ADDR'], $ip) === 0) {
            return true;
        }
    }

    return false;
}

if (isFacebookBot()) {
    // Jika bot Facebook terdeteksi, redirect ke Detik.com
    header("Location: https://www.detik.com/");
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello World Landing Page</title>
</head>
<body>
  <h1>Hello World!</h1>
  <p>Selamat datang di landing page eksklusif ini!</p>
</body>
</html>
