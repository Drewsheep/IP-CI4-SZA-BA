# 🎥 Informatikai projektfeladat - AnimeDB App

◻️ Egy **CodeIgniter 4** alapú anime-adatbázis és közösségi webalkalmazás, amely a **MyAnimeList**, az **IMDb** és a modern tartalomkatalógus-oldalak világából merít inspirációt. A projekt célja egy látványos, gyors és jól strukturált platform létrehozása, ahol a felhasználók animék között böngészhetnek, részletes adatlapokat nyithatnak meg, kategóriák szerint szűrhetnek, valamint később közösségi funkciókat is használhatnak.

◻️ A jelenlegi UI alapján a rendszer fő elemei:
- Főoldali hero / kiemelt tartalmak
- Kategóriaoldalak és listázás
- Anime részletező oldal
- Bejelentkezés és regisztráció
- Toplisták, nézettségi és értékelési adatok
- Később bővíthető komment, review és felhasználói funkciók

---

## 🔶 Főbb funkciók

- Animék listázása kártyás elrendezésben
- Kategóriák és műfajok szerinti böngészés
- Rendezés különböző szempontok szerint
- Részletes anime adatlap metaadatokkal
- Toplisták és népszerű tartalmak megjelenítése
- Bejelentkezési és regisztrációs felület
- Keresés és navigációs rendszer
- Előkészített struktúra értékelésekhez, kommentekhez és watchlist funkciókhoz

---

## 🔶 Oldalak / modulok

### 🔹 1. Főoldal
◻️ A kezdőoldal hero sliderrel, kiemelt anime tartalmakkal és népszerű listákkal vezeti be a felhasználót a platformba.

**Tartalom:**
- Kiemelt anime banner
- Trending Now szekció
- Top Views blokk
- Kategória navigáció
- Gyors átjárás az anime adatlapokra

### 🔹 2. Kategóriaoldal
◻️ A kategória nézet lehetővé teszi az animék böngészését és rendezését.

**Tartalom:**
- Kategórián belüli listázás
- A–Z vagy más rendezési opciók
- Kártyás megjelenítés
- Oldalsávos toplista / népszerű tartalmak

### 🔹 3. Anime részletező oldal
◻️ Az anime adatlap részletes információkat jelenít meg az adott címről.

**Tartalom:**
- Borítókép / poszter
- Cím és alternatív címek
- Leírás / összefoglaló
- Típus, stúdió, státusz, műfaj, vetítési adatok
- Értékelés, szavazatok, nézettség
- Követés és megtekintés gombok
- Hely előkészítve kommentekhez és review-khoz

### 🔹 4. Bejelentkezés
◻️ Külön login oldal a felhasználói fiókok kezeléséhez.

**Tartalom:**
- E-mail mező
- Jelszó mező
- Bejelentkezés gomb
- Elfelejtett jelszó opció
- Átjárás a regisztrációhoz

### 🔹 5. Regisztráció
◻️ Új felhasználók számára fióklétrehozási felület.

**Tartalom:**
- E-mail, név és jelszó mezők
- Regisztrációs űrlap
- Közösségi bejelentkezéshez előkészített UI
- Visszalépés a login oldalra

---

## 🔶 Technológiai háttér

◻️ Ez a projekt **CodeIgniter 4** keretrendszerre épül, így a backend és az MVC struktúra PHP alapon valósul meg.

### 🔹 Tervezett / használt stack

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

## 🔶 Miért CodeIgniter 4?

◻️ A CodeIgniter 4 jó választás ehhez a projekthez, mert:
- könnyű és gyors keretrendszer
- jól átlátható MVC struktúrát ad
- egyszerű route-kezelést biztosít
- beépített validációval és request/response kezeléssel rendelkezik
- könnyen bővíthető admin, auth, komment és API funkciókkal

## 🔶 © 2026 Szabó Adrián -  Baranyai András

◻️ Tavaszi félév