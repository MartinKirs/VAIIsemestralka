<?php

/** @var \App\Models\Door $door */
/** @var array $errors */
/** @var \Framework\Support\LinkGenerator $link */

$isEdit = $door->getId() !== null;
?>
<h1><?= $isEdit ? 'Upraviť dvere' : 'Pridať nové dvere' ?></h1>

<section class="table-card form-card" aria-label="Formulár dverí">
    <?php if (!empty($errors)): ?>
        <div class="form-errors" role="alert">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $link->url('door.save') ?>">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= (int)$door->getId() ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="door-name">Názov dverí (miestnosť)</label>
            <input
                type="text"
                id="door-name"
                name="name"
                required
                maxlength="50"
                placeholder="napr. RB052"
                value="<?= htmlspecialchars((string)$door->getName()) ?>"
            >
        </div>

        <div class="form-group">
            <label for="door-building">Budova / Pavilón</label>
            <input
                type="text"
                id="door-building"
                name="building"
                required
                maxlength="50"
                placeholder="napr. RB"
                value="<?= htmlspecialchars((string)$door->getBuilding()) ?>"
            >
        </div>

        <div class="form-group">
            <label for="door-description">Popis miestnosti</label>
            <input
                type="text"
                id="door-description"
                name="description"
                required
                maxlength="255"
                placeholder="napr. Počítačová učebňa"
                value="<?= htmlspecialchars((string)$door->getDescription()) ?>"
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="button button-primary">
                <?= $isEdit ? 'Uložiť zmeny' : 'Pridať dvere' ?>
            </button>
            <a class="button button-secondary" href="<?= $link->url('door.index') ?>">Zrušiť</a>
        </div>
    </form>
</section>