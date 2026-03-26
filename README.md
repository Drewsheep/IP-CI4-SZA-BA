# Anime Database Web App

Egy **CodeIgniter 4** alapú anime-adatbázis és közösségi webalkalmazás, amely a **MyAnimeList**, az **IMDb** és a modern tartalomkatalógus-oldalak világából merít inspirációt. A projekt célja egy látványos, gyors és jól strukturált platform létrehozása, ahol a felhasználók anime címek között böngészhetnek, részletes adatlapokat nyithatnak meg, kategóriák szerint szűrhetnek, valamint később közösségi funkciókat is használhatnak.

A jelenlegi UI alapján a rendszer fő elemei:
- főoldali hero / kiemelt tartalmak
- kategóriaoldalak és listázás
- anime részletező oldal
- bejelentkezés és regisztráció
- toplisták, nézettségi és értékelési adatok
- később bővíthető komment, review és felhasználói funkciók

---

## Főbb funkciók

- animek listázása kártyás elrendezésben
- kategóriák és műfajok szerinti böngészés
- rendezés különböző szempontok szerint
- részletes anime adatlap metaadatokkal
- toplisták és népszerű tartalmak megjelenítése
- bejelentkezési és regisztrációs felület
- keresés és navigációs rendszer
- előkészített struktúra értékelésekhez, kommentekhez és watchlist funkciókhoz

---

## Oldalak / modulok

### 1. Főoldal
A kezdőoldal hero sliderrel, kiemelt anime tartalmakkal és népszerű listákkal vezeti be a felhasználót a platformba.

**Tartalom:**
- kiemelt anime banner
- "Trending Now" szekció
- "Top Views" blokk
- kategória navigáció
- gyors átjárás az anime adatlapokra

### 2. Kategóriaoldal
A kategória nézet lehetővé teszi az animék böngészését és rendezését.

**Tartalom:**
- kategórián belüli listázás
- A–Z vagy más rendezési opciók
- kártyás megjelenítés
- oldalsávos toplista / népszerű tartalmak

### 3. Anime részletező oldal
Az anime adatlap részletes információkat jelenít meg az adott címről.

**Tartalom:**
- borítókép / poszter
- cím és alternatív címek
- leírás / összefoglaló
- típus, stúdió, státusz, műfaj, vetítési adatok
- értékelés, szavazatok, nézettség
- követés és megtekintés gombok
- hely előkészítve kommentekhez és review-khoz

### 4. Bejelentkezés
Külön login oldal a felhasználói fiókok kezeléséhez.

**Tartalom:**
- e-mail mező
- jelszó mező
- bejelentkezés gomb
- elfelejtett jelszó opció
- átjárás a regisztrációhoz

### 5. Regisztráció
Új felhasználók számára fióklétrehozási felület.

**Tartalom:**
- e-mail, név és jelszó mezők
- regisztrációs űrlap
- közösségi bejelentkezéshez előkészített UI
- visszalépés a login oldalra

---

## Technológiai háttér

Ez a projekt **CodeIgniter 4** keretrendszerre épül, így a backend és az MVC struktúra PHP alapon valósul meg.

### Tervezett / használt stack

**Backend**
- PHP 8+
- CodeIgniter 4
- MVC architektúra
- Session alapú autentikáció

**Frontend**
- HTML5
- CSS3 / SCSS
- JavaScript
- Bootstrap és egyedi stílusozás

**Adatbázis**
- MySQL / MariaDB

---

## Miért CodeIgniter 4?

A CodeIgniter 4 jó választás ehhez a projekthez, mert:
- könnyű és gyors keretrendszer
- jól átlátható MVC struktúrát ad
- egyszerű route-kezelést biztosít
- beépített validációval és request/response kezeléssel rendelkezik
- könnyen bővíthető admin, auth, komment és API funkciókkal

---

## Projekt célja

A projekt célja nem csak egy egyszerű anime-listázó oldal létrehozása, hanem egy olyan stabil alap kiépítése, amely később teljes értékű közösségi és adatbázis-rendszerré bővíthető. A dizájn erősen fókuszál a vizuális élményre, miközben a CodeIgniter 4 hátteret ad a strukturált backend fejlesztéshez.

---