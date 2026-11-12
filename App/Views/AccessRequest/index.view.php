<?php

/** @var \App\Models\AccessRequest[] $requests */
/** @var \Framework\Support\LinkGenerator $link */

?>
<h1>Žiadosti o prístup k dverám</h1>

<section class="table-card" aria-label="Zoznam žiadostí o prístup">
    <div class="table-toolbar">
        <p class="records-count">Prehľad priradených prístupových žiadostí k jednotlivým dverám</p>
        <a class="button button-primary" href="<?= $link->url('accessrequest.add') ?>">+ Nová žiadosť</a>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Žiadateľ</th>
                <th scope="col">Dvere (Budova)</th>
                <th scope="col">Dôvod žiadosti</th>
                <th scope="col">Stav</th>
                <th scope="col">Akcie</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($requests)) { ?>
                <tr>
                    <td colspan="6">V databáze sa momentálne nenachádzajú žiadne žiadosti o prístup.</td>
                </tr>
            <?php } else { ?>
                <?php foreach ($requests as $req) { ?>
                    <?php $door = $req->getDoor(); ?>
                    <tr>
                        <td data-label="ID"><?= (int)$req->getId() ?></td>
                        <th scope="row" data-label="Žiadateľ">
                            <?= htmlspecialchars((string)$req->getApplicantName()) ?>
                        </th>
                        <td data-label="Dvere (Budova)">
                            <?php if ($door !== null) { ?>
                                <?= htmlspecialchars((string)$door->getName()) ?>
                                (<?= htmlspecialchars((string)$door->getBuilding()) ?>)
                            <?php } else { ?>
                                Neznáme dvere
                            <?php } ?>
                        </td>
                        <td data-label="Dôvod žiadosti">
                            <?= htmlspecialchars((string)$req->getReason()) ?>
                        </td>
                        <td data-label="Stav">
                            <?= htmlspecialchars((string)$req->getStatus()) ?>
                        </td>
                        <td data-label="Akcie" class="actions-cell">
                            <a class="edit-link"
                               href="<?= $link->url('accessrequest.edit', ['id' => $req->getId()]) ?>">Upraviť</a>
                            <form method="post"
                                  action="<?= $link->url('accessrequest.delete') ?>"
                                  class="inline-form">
                                <input type="hidden" name="id" value="<?= (int)$req->getId() ?>">
                                <button type="submit" class="delete-link">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <p class="records-count">Celkový počet žiadostí: <strong><?= count($requests) ?></strong></p>
    </div>
</section>
