<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

$currentController = strtolower($_GET['c'] ?? 'home');
// Zistíme aktuálnu akciu z URL pre správne zvýraznenie položky v menu (aria-current="page")
$currentAction = $_GET['a'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0)">
    <title>Prístupový systém FRI – správa dverí</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/styl.css') ?>">
</head>
<body>
<header class="topbar">
    <a class="brand" href="<?= $link->url('home.index') ?>" aria-label="Prístupový systém FRI – správa dverí">
        <img src="<?= $link->asset('images/FRI_H_S_sk_cb.png') ?>" alt="Žilinská univerzita v Žiline, Fakulta riadenia a informatiky">
    </a>
    <p class="system-title">Prístupový systém FRI</p>
    <div class="account">
        <span>Prihlásený: Ján Mrkvička / Administrátor</span>
        <a class="logout" href="<?= $link->url('home.index') ?>">Odhlásiť sa</a>
    </div>
</header>

<div class="app-layout">
    <nav class="sidebar" aria-label="Hlavná navigácia">
        <a href="<?= $link->url('home.index') ?>" <?= ($currentController === 'home' && $currentAction === 'index') ? 'aria-current="page"' : '' ?>>Prehľad</a>
        <a href="<?= $link->url('door.index') ?>" <?= $currentController === 'door' ? 'aria-current="page"' : '' ?>>Dvere / Prístupové body</a>
        <a href="<?= $link->url('home.index') ?>">Osoby</a>
        <a href="<?= $link->url('home.index') ?>">Logy</a>
        <a href="<?= $link->url('home.index') ?>">Žiadosti o prístup</a>
    </nav>

    <main class="main-content">
        <?= $contentHTML ?>
    </main>
</div>
</body>
</html>
