# Správa prístupového systému otlačkov prstov na fakulte

Martin Kirschbaum

5ZYI33

## Stručný opis projektu
Pripravovaná webová aplikácia slúži ako centrálny riadiaci a administratívny systém pre správu biometrických prístupov (otlačkov prstov) pri vchode do rôznych miestností, laboratórií a kancelárií na fakulte. Jej hlavným účelom je nahradiť tradičné fyzické kľúče alebo karty moderným, bezpečným a prehľadným systémom, ktorý umožňuje správcom definovať oprávnenia pre jednotlivé dvere a používateľom (študentom, zamestnancom či externým osobám) pohodlne spravovať svoje prístupové údaje. Aplikácia rieši problém efektívneho riadenia bezpečnosti budovy, auditovania prechodov a zjednodušenia schvaľovania prístupov bez nutnosti fyzickej kontroly kľúčov.



## Role v projekte
* **Bežný používateľ (Študent / Zamestnanec):** Osoba s vytvoreným účtom v klientskej zóne. Môže spravovať svoj profil, registrovať svoje biometrické údaje (simuláciu otlačkov prstov), prezerať históriu vlastných prechodov cez dvere a podávať žiadosti o nové prístupové práva k vybraným miestnostiam.
* **Správca (Admin):** Hlavná manažérska rola. Zodpovedá za komplexnú správu používateľov, schvaľovanie alebo zamietanie žiadostí o prístup, správu dverí/zariadení, priraďovanie otlačkov prstov k dverám a monitorovanie celkového bezpečnostného logu prechodov v reálnom čase.



## Prípady použitia podľa rolí

### Bežný používateľ
* Používateľ sa prihlási do systému pomocou svojich prihlasovacích údajov.
* Používateľ si zaregistruje nový otlačok prsta.
* Používateľ odošle žiadosť o prístup k špecifickým dverám (napr. laboratórium).
* Používateľ si prezrie históriu svojich vstupov.

### Správca
* Správca schváli alebo zamietne novú žiadosť používateľa o prístup k dverám.
* Správca vytvorí alebo upraví záznam o dverách/zariadení v systéme.
* Správca vymaže alebo deaktivuje neplatný otlačok prsta.
* Správca filtruje a monitoruje globálny log prechodov všetkých používateľov.



## Plánované entity

* **Používateľ (`User`):**
    * *Účel:* Eviduje informácie o všetkých ľuďoch v systéme.
    * *Atribúty:* ID, meno, priezvisko, e-mail, heslo, rola, stav účtu.
    * *Vzťahy:* 1:N k otlačkom prstov, 1:N k žiadostiam, 1:N k logom prechodov.
* **Dvere / Zariadenie (`Door`):**
    * *Účel:* Reprezentuje fyzické vstupy a čítačky otlačkov prstov na fakulte.
    * *Atribúty:* ID, názov dverí, umiestnenie, stav.
    * *Vzťahy:* M:N k otlačkom prstov, 1:N k logom prechodov.
* **Otlačok prsta (`Fingerprint`):**
    * *Účel:* Uchováva biometrickú šablónu prepojenú s používateľom.
    * *Atribúty:* ID, user_id, hash šablóny, názov prsta, dátum registrácie.
    * *Vzťahy:* N:1 k používateľovi, M:N k dverám.
* **Žiadosť o prístup (`AccessRequest`):**
    * *Účel:* Eviduje požiadavky na získanie prístupu do miestností.
    * *Atribúty:* ID, user_id, door_id, status (čakajúce/schválené/zamietnuté), dátum.
    * *Vzťahy:* N:1 k používateľovi, N:1 k dverám.
* **Log prechodov (`AccessLog`):**
    * *Účel:* Zaznamenáva históriu každého pokusu o vstup.
    * *Atribúty:* ID, fingerprint_id, door_id, timestamp, stav vstupu.
    * *Vzťahy:* N:1 k otlačku prsta, N:1 k dverám.



## Vzťahy medzi entitami

* **Používateľ ↔ Otlačok prsta (1:N):** Jeden používateľ môže mať zaregistrovaných viacero otlačkov prstov, pričom každý otlačok patrí práve jednému používateľovi.
* **Používateľ ↔ Žiadosť o prístup (1:N):** Jeden používateľ môže podať viacero žiadostí o prístup v priebehu času.
* **Dvere ↔ Otlačok prsta (M:N):** Jedny dvere môžu povoliť vstup viacerým otlačkom prstov a zároveň jeden otlačok môže mať oprávnenie otvárať viacero dverí.
* **Dvere ↔ Log prechodov (1:N):** Na jedných dverách sa postupne zaznamenáva veľa rôznych pokusov o prechod.



## Hlavné stránky aplikácie

1. **Domovská a prihlasovacia stránka:** Úvodné rozhranie pre prístup do systému a autentifikáciu.
2. **Používateľský dashboard:** Prehľadová stránka pre prihláseného používateľa.
3. **Správa otlačkov a profilu:** Rozhranie na pridávanie/mazanie otlačkov a správu osobných údajov (vrátane uploadu súborov/fotografie).
4. **Administrátorský panel (Správa dverí a používateľov):** Sekcia pre správcu s kompletnými CRUD operáciami.
5. **Prehľad logov a bezpečnostných záznamov:** Stránka s tabuľkou prechodov, vybavená filtrovaním, stránkovaním a AJAX funkciami.



## Rozdelenie funkcionality

### Základné funkcie (nutné minimum)
* Autentifikácia a autorizácia (prihlásenie, registrácia, bezpečné hashovanie hesiel, oddelenie rolí).
* Minimálne 3 povinné databázové entity a plné CRUD operácie nad dvomi z nich.
* Minimálne 5 dynamických stránok s responzívnym dizajnom a vlastnými CSS pravidlami (min. 20 pravidiel).
* Vlastný zmysluplný JS kód (min. 50 riadkov).
* Minimálne dve zmysluplné asynchrónne AJAX volania (napr. filtrovanie tabuľky logov, odosielanie formulárov).
* Správa a upload súborov.
* Spustiteľnosť v prostredí Docker s automatickým importom ukázkových dát.

### Rozširujúce funkcie (pre extra body)
* Pokročilý dizajn aplikácie s využitím moderných CSS frameworkov alebo SASS/LESS.
* Použitie JS frameworku (napr. React / Vue.js) pre klientsku časť.
* Pokročilá validácia formulárov na strane klienta.
* Integrácia externého API (napr. pre notifikácie alebo mapové podklady).