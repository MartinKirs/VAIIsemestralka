<?php
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
        <button class="button button-primary" type="button">+ Pridať</button>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Názov dverí</th>
                <th scope="col">Popis</th>
                <th scope="col">Akcie</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="ID">1</td>
                <th scope="row" data-label="Názov dverí">RB052</th>
                <td data-label="Popis">Počítačová učebňa</td>
                <td data-label="Akcie"><a class="edit-link" href="<?= $link->url('home.doors') ?>">Upraviť</a></td>
            </tr>
            <tr>
                <td data-label="ID">2</td>
                <th scope="row" data-label="Názov dverí">RB053</th>
                <td data-label="Popis">Počítačová učebňa</td>
                <td data-label="Akcie"><a class="edit-link" href="<?= $link->url('home.doors') ?>">Upraviť</a></td>
            </tr>
            <tr>
                <td data-label="ID">3</td>
                <th scope="row" data-label="Názov dverí">RA012</th>
                <td data-label="Popis">Počítačová učebňa</td>
                <td data-label="Akcie"><a class="edit-link" href="<?= $link->url('home.doors') ?>">Upraviť</a></td>
            </tr>
            <tr>
                <td data-label="ID">4</td>
                <th scope="row" data-label="Názov dverí">RA013</th>
                <td data-label="Popis">Počítačová učebňa</td>
                <td data-label="Akcie"><a class="edit-link" href="<?= $link->url('home.doors') ?>">Upraviť</a></td>
            </tr>
            <tr>
                <td data-label="ID">5</td>
                <th scope="row" data-label="Názov dverí">RC009</th>
                <td data-label="Popis">Prednášková miestnosť</td>
                <td data-label="Akcie"><a class="edit-link" href="<?= $link->url('home.doors') ?>">Upraviť</a></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <span>Zobrazených 1–5 z ... záznamov</span>
        <nav class="pagination" aria-label="Stránkovanie">
            <a href="<?= $link->url('home.doors') ?>" aria-label="Predchádzajúca strana">Predchádzajúca</a>
            <a class="page-number is-current" href="<?= $link->url('home.doors') ?>" aria-current="page">1</a>
            <a class="page-number" href="<?= $link->url('home.doors') ?>">2</a>
            <a class="page-number" href="<?= $link->url('home.doors') ?>">3</a>
            <a href="<?= $link->url('home.doors') ?>" aria-label="Nasledujúca strana">Nasledujúca</a>
        </nav>
    </div>
</section>