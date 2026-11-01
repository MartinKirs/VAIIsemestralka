<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

// Zistíme aktuálnu akciu z URL pre správne zvýraznenie položky v menu (aria-current="page")
$currentAction = $_GET['a'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Správa dverí a prístupových bodov Fakulty riadenia a informatiky.">
    <title>Prístupový systém FRI</title>
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
        <a href="<?= $link->url('home.index') ?>" <?= $currentAction === 'index' ? 'aria-current="page"' : '' ?>>Prehľad</a>
        <a href="<?= $link->url('home.doors') ?>" <?= $currentAction === 'doors' ? 'aria-current="page"' : '' ?>>Dvere / Prístupové body</a>
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
