<?php
/** @var \Framework\Support\LinkGenerator $link */
?>
<h1>Prehľad prístupového systému</h1>

<section class="table-card" aria-label="Rýchly prehľad systému">
    <div class="card-intro">
        <p>Vitajte v administračnom rozhraní prístupového systému Fakulty riadenia a informatiky UNIZA.</p>
        <p>Systém slúži na centrálnu správu dverí, prístupových práv osôb, evidenciu logov prechodov a schvaľovanie žiadostí o prístup.</p>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Modul</th>
                <th scope="col">Stav</th>
                <th scope="col">Akcie</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="ID">1</td>
                <th scope="row" data-label="Modul">Dvere a prístupové body</th>
                <td data-label="Stav">5 evidovaných miestností</td>
                <td data-label="Akcie">
                    <a class="edit-link" href="<?= $link->url('home.doors') ?>">Prejsť na správu dverí</a>
                </td>
            </tr>
            <tr>
                <td data-label="ID">2</td>
                <th scope="row" data-label="Modul">Žiadosti o prístup</th>
                <td data-label="Stav">Žiadne nevybavené žiadosti</td>
                <td data-label="Akcie">
                    <a class="edit-link" href="<?= $link->url('home.index') ?>">Zobraziť</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>