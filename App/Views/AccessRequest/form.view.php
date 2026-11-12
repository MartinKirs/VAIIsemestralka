<?php

/** @var \App\Models\AccessRequest $accessRequest */
/** @var \App\Models\Door[] $doors */
/** @var array $errors */
/** @var \Framework\Support\LinkGenerator $link */

$isEdit = $accessRequest->getId() !== null;
$statuses = ['Čaká na schválenie', 'Schválené', 'Zamietnuté'];
?>
<h1><?= $isEdit ? 'Upraviť žiadosť o prístup' : 'Nová žiadosť o prístup' ?></h1>

<section class="table-card form-card" aria-label="Formulár žiadosti o prístup">
    <?php if (!empty($errors)) { ?>
        <div class="form-errors" role="alert">
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <form method="post" action="<?= $link->url('accessrequest.save') ?>">
        <?php if ($isEdit) { ?>
            <input type="hidden" name="id" value="<?= (int)$accessRequest->getId() ?>">
        <?php } ?>

        <div class="form-group">
            <label for="applicant-name">Meno a priezvisko žiadateľa</label>
            <input
                type="text"
                id="applicant-name"
                name="applicant_name"
                required
                maxlength="100"
                placeholder="napr. Bc. Peter Novák"
                value="<?= htmlspecialchars((string)$accessRequest->getApplicantName()) ?>"
            >
        </div>

        <div class="form-group">
            <label for="door-id">Prístupové dvere (miestnosť)</label>
            <select id="door-id" name="door_id" required>
                <option value="">-- Vyberte dvere --</option>
                <?php foreach ($doors as $door) { ?>
                    <option
                        value="<?= (int)$door->getId() ?>"
                        <?= $accessRequest->getDoorId() === $door->getId() ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars((string)$door->getName()) ?>
                        (<?= htmlspecialchars((string)$door->getBuilding()) ?> –
                        <?= htmlspecialchars((string)$door->getDescription()) ?>)
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="request-reason">Dôvod žiadosti</label>
            <input
                type="text"
                id="request-reason"
                name="reason"
                required
                maxlength="255"
                placeholder="napr. Vypracovanie bakalárskej práce"
                value="<?= htmlspecialchars((string)$accessRequest->getReason()) ?>"
            >
        </div>

        <div class="form-group">
            <label for="request-status">Stav žiadosti</label>
            <select id="request-status" name="status" required>
                <?php foreach ($statuses as $statusOption) { ?>
                    <option
                        value="<?= htmlspecialchars($statusOption) ?>"
                        <?= $accessRequest->getStatus() === $statusOption ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars($statusOption) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="button button-primary">
                <?= $isEdit ? 'Uložiť zmeny' : 'Odoslať žiadosť' ?>
            </button>
            <a class="button button-secondary" href="<?= $link->url('accessrequest.index') ?>">Zrušiť</a>
        </div>
    </form>
</section>
