# System Rekrutacji do Prestiżowej Szkoły Średniej

## Opis projektu
Aplikacja do rekrutacji online do prestiżowej szkoły średniej automatyzuje proces aplikowania, oceny kandydatów oraz zarządzania rekrutacją. Kandydaci mają dostęp do strony internetowej, gdzie mogą zapoznać się z podstawowymi informacjami o szkole, ofertą edukacyjną, misją oraz wartościami. Mogą również zarejestrować się, założyć konto i uzupełnić swoje dane osobowe, w tym wyniki egzaminów oraz załączyć zdjęcie do legitymacji.

Po rejestracji użytkownicy mogą logować się na swoje konto, a administrator ma dostęp do panelu administracyjnego, który umożliwia edycję i zarządzanie użytkownikami oraz profilami klas. Administrator sprawdza poprawność danych wprowadzonych przez kandydatów i potwierdza płatności, jeśli są wymagane.

Aplikacja oblicza punktację kandydatów na podstawie wyników egzaminów i ustala ich miejsce w rankingu. Po zakończeniu rekrutacji, kandydaci z najwyższą punktacją są zakwalifikowani na odpowiednie profile klas. Administrator ma również możliwość edytowania i usuwania użytkowników oraz zarządzania rekrutacją i danymi użytkowników.

## Spis Treści
1. [Narzędzia i technologie](#narzędzia-i-technologie)
2. [Diagram ERD](#diagram-erd)
3. [Modele](#modele)
4. [Opis przykładowej migracji](#opis-przykładowej-migracji)
5. [Opis seederów](#opis-seederów)
6. [Projekt GUI](#projekt-gui)
7. [Uruchomienie aplikacji](#uruchomienie-aplikacji)
8. [Funkcjonalności aplikacji](#funkcjonalności-aplikacji)
9. [Licencja](#licencja)
10. [Szczegółowa dokumentacja](#szczegółowa-dokumentacja)
11. [Źródła](#źródła)
12. [Kontakt](#kontakt)

## Narzędzia i technologie
- **Laravel Framework 10.9.0**: [Strona](https://laravel.com), [Dokumentacja](https://laravel.com/docs)
- **PHP 8.2.4**: [Strona](https://www.php.net), [Dokumentacja](https://www.php.net/docs.php)
- **Bootstrap v5.2**: [Strona](https://getbootstrap.com), [Dokumentacja](https://getbootstrap.com/docs)
- **Node.js**: [Strona](https://nodejs.org), [Dokumentacja](https://nodejs.org/docs)
- **Visual Studio Code**: [Strona](https://code.visualstudio.com)
- **XAMPP 8.0.28**: [Strona](https://www.apachefriends.org), [Dokumentacja](https://www.apachefriends.org/docs)

## Diagram ERD
Diagram przedstawiający relacje między tabelami w bazie danych.

![Diagram ERD](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/8b2869a8-eb2e-4ab4-8a99-91a24398090c)

## Modele
![image](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/e0281578-c899-4e24-ad78-189393311f1f)

### Model Application
- **use HasFactory**: Umożliwia generowanie danych testowych.
- **$fillable**: Pola, które mogą być uzupełniane masowo.
- **candidate()**: Relacja "belongsTo" z modelem Candidate.
- **profile()**: Relacja "belongsTo" z modelem Profile.
- **calculateScore()**: Oblicza wynik aplikacji na podstawie ocen kandydata i mnożników profilu.

### Pozostałe modele
Analogicznie wygląda reszta modeli. Każdy z nich reprezentuje tabelę o tej samej nazwie w bazie danych. Dodatkowo model Candidate posiada funkcję **generateUniqueCandidateIndex()**, która generuje unikalny indeks dla kandydata.

## Opis przykładowej migracji
Migracja `create_candidates_table` tworzy tabelę "candidates" w bazie danych z kolumnami:
- `id`: Identyfikator.
- `candidate_index`: Unikalny indeks kandydata.
- `mathematics_score`, `polish_score`, `english_score`: Wyniki z egzaminów.
- `timestamps`: Automatyczne znaczniki czasu.
- `user_id`: Klucz obcy odnoszący się do tabeli "users".

## Opis seederów
Każda nowo tworzona tabela posiada swój własny seeder odpowiedzialny za generowanie przykładowych danych.

![Diagram seederów](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/8ac44c78-c204-43c8-bddf-ad32a9609aec)

### Opis przykładowego seedera UserSeeder
Dodaje dane do tabeli "users". Generuje początkowe dane użytkowników, w tym administratora i losowych użytkowników.

## Projekt GUI

### Widok homepage.blade.php
Strona główna dostępna dla wszystkich użytkowników, zawiera nagłówek, nawigację, karuzelę z obrazkami i opisy szkoły.

![Widok homepage](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/1363c5ae-5d04-4f6e-84f3-343109af59b8)
![Widok homepage](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/f0f32553-0240-4c5c-abf9-585249297c85)

### Widok profiles.blade.php
Strona z profilami kierunków, dostępna dla zalogowanych użytkowników, umożliwia aplikowanie na wybrane kierunki.

#### Widok dla gościa

![Widok dla gościa](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/c5076c79-357a-41e0-bdc1-a76357f02b10)

#### Widok dla kandydata

![Widok dla kandydata](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/2a25e06e-d922-41ba-89ec-cf5265cbb6cc)

### Widok user-profile.blade.php
Strona profilu użytkownika, zawiera informacje o użytkowniku i jego aplikacjach.

![Widok user-profile](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/dc612b8c-22a0-4d3c-8d66-542e2c2f0684)
![Widok user-profile](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/88e76cb9-672b-44a3-9202-72a43180e992)


## Uruchomienie aplikacji
1. Zainstaluj Node.js, PHP, XAMPP i Visual Studio Code.
2. Uruchom `start.bat`, który skonfiguruje środowisko i uruchomi projekt.
3. W przypadku problemów, ręcznie wykonaj:
   ```bash
   composer install
   php artisan migrate:fresh --seed
   php artisan key:generate
   php artisan storage:link
   php artisan serve

## Funkcjonalności aplikacji

### Logowanie
- **User:** `jan.kowal@email.com`, `password123`
- **Admin:** `szymon.mazur@example.com`, `password123`

![Logowanie](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/2ab3ee19-8152-4585-a443-ba79aeafd23b)

Po zalogowaniu użytkownik zostanie przekierowany do widoku `user-profile.blade.php`.

![Widok user-profile](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/2daa6f92-e6a5-474c-9544-d8f912540a9a)

### Rejestracja
![Rejestracja - krok 1](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/552c5467-cd95-4690-bf13-48ede232edb7)

![Rejestracja - krok 2](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/d1f575de-2e57-48d4-9200-4d0c1928bd45)


### CRUD przeprowadzany przez administratora aplikacji
Po zalagowaniu się na konto administratora i kliknięciu w przycisk **Admin** użytkownik zostanie przeniesiony do panelu administracyjnego.

![Panel administracyjny](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/71b12ac0-1c3f-497b-9cce-420a3504d4e0)

#### Panel administracyjny dla użytkowników
![image](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/80a284f3-6dde-40b1-9d14-42399d70bddb)

![image](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/70c209d7-9a08-4ed1-a5c4-d8c0e778d0f6)

![image](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/d4068382-a72f-4364-bf4a-2d2e49683fcd)

#### Panel administracyjny dla profili klas
![Lista profili klas](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/014e1991-a25c-42a3-89b4-abc1f36a60be)

![szczegóły profilu klasy](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/29fde8b1-8745-4dbb-a08b-de9941ee831c)


#### Panel administracyjny aplikacji

![Panel administracyjny](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/4fb0fd71-c728-4403-9ca6-b4daeb4d4ff5)

W tej części panelu administracyjnego wyświetlani są wszyscy kandydaci, którzy złożyli aplikacje na dany profil. Wyświetlane są nazwy kierunków, a pod nimi wszyscy użytkownicy, którzy na ten kierunek się zgłosili.

##### Widok edycji danej aplikacji

![Widok edycji aplikacji](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/71aa60fe-8a69-40f4-b111-8315067413ff)
![Edycja aplikacji](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/39bfaec2-9e84-4f27-91cd-0d27e874a2ab)

W tym widoku administrator ma możliwość zatwierdzenia poprawności zdjęcia oraz ustawienia statusu płatności. Po ustawieniu obu tych pól na "uznane", zostaje wywołane zdarzenie, które oblicza punkty dla danego kandydata.

#### Zarządzanie swoimi zasobami i danymi przez użytkownika aplikacji

Użytkownik ma dostęp do wszystkich swoich danych, jakie podał, i może je edytować po kliknięciu w przycisk "Edytuj swoje dane". Po kliknięciu zostanie przeniesiony do widoku `edit.blade.php`, gdzie może zmienić swoje dane oraz wyniki z egzaminów.

![Edycja danych użytkownika](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/d40d10ef-3d89-415b-a39f-ef96474aa92c)
![Edycja danych](https://github.com/Szynol00/System_rekrutacjiv2/assets/104465225/ffd24add-d3a1-435e-8b0f-d8c5d849eed2)

W powyższym przykładzie, po kliknięciu przycisku „Zapisz”, edycji uległo zdjęcie oraz punktacja kandydata. Po tych zmianach administrator musi na nowo przeglądnąć aplikację.


## Szczegółowa dokumentacja

Szczegółowe informacje na temat projektu, w tym opis logiki biznesowej, walidacji danych oraz inne techniczne detale, znajdują się w dokumentacji PDF dołączonej do repozytorium. Możesz ją znaleźć [tutaj](dokumentacja.pdf).


## Licencja
Projekt jest licencjonowany na podstawie MIT License.


## Źródła

Zdjęcia wykorzystane w projekcie zostały pobrane z Adobe Stock oraz Pixers na bazie darmowej licencji:
- [Adobe Stock](https://stock.adobe.com)
- [Pixers](https://pixers.pl/)


## Kontakt
calka.szymek@gmail.com
