<?php

/** @var \App\Models\Door[] $doors */
/** @var \Framework\Support\LinkGenerator $link */

?>
<h1>Správa dverí a prístupových bodov</h1>

<section class="table-card" aria-label="Zoznam dverí">
    <div class="table-toolbar">
        <label class="search-field">
            <span class="visually-hidden">Hľadať dvere podľa názvu alebo miesta</span>
            <span class="search-icon" aria-hidden="true"></span>
            <input type="search" placeholder="Hľadať dvere podľa názvu/miesta...">
        </label>
        <a class="button button-primary" href="<?= $link->url('door.add') ?>">+ Pridať dvere</a>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Názov dverí</th>
                <th scope="col">Budova</th>
                <th scope="col">Popis</th>
                <th scope="col">Akcie</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($doors)): ?>
                <tr>
                    <td colspan="5">V databáze sa momentálne nenachádzajú žiadne dvere.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($doors as $door): ?>
                    <tr>
                        <td data-label="ID"><?= (int)$door->getId() ?></td>
                        <th scope="row" data-label="Názov dverí"><?= htmlspecialchars((string)$door->getName()) ?></th>
                        <td data-label="Budova"><?= htmlspecialchars((string)$door->getBuilding()) ?></td>
                        <td data-label="Popis"><?= htmlspecialchars((string)$door->getDescription()) ?></td>
                        <td data-label="Akcie" class="actions-cell">
                            <a class="edit-link" href="<?= $link->url('door.edit', ['id' => $door->getId()]) ?>">Upraviť</a>
                            <form method="post" action="<?= $link->url('door.delete') ?>" class="inline-form">
                                <input type="hidden" name="id" value="<?= (int)$door->getId() ?>">
                                <button type="submit" class="delete-link">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <p class="records-count">Celkový počet záznamov: <strong><?= count($doors) ?></strong></p>
    </div>
</section>