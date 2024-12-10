**Porównywarka cen paliw** to aplikacja umożliwiająca użytkownikom przeglądanie listy oraz mapy stacji paliwowych z filtrami według m.in. marki, rodzaju paliwa i ceny. Użytkownicy mogą zgłaszać ceny paliw a administratorzy zarządzają użytkownikami, stacjami oraz zgłoszonymi cenami. Aplikacja umożliwia nagradzanie użytkowników dodatkowymi punktami.

---

## Wymagania

Aby uruchomić projekt lokalnie, potrzebujesz następujących programów i wersji:

- **XAMPP**: 8.2.12  
  [Pobierz XAMPP](https://www.apachefriends.org/index.html)

- **Composer**: 2.8.3  
  [Pobierz Composer](https://getcomposer.org/)

  ---

## Instalacja i uruchomienie

Wykonaj poniższe kroki, aby zainstalować i uruchomić projekt lokalnie:

### 1. Klonowanie repozytorium
```bash
git clone https://github.com/danielmosakowski/stacjapaliw.git
cd SklepKomputerowy
```

### 2. Instalacja zależności PHP
```bash
composer install
```

### 3. Utworzenie pliku `.env`
Skopiuj przykładowy plik `.env`:
```bash
cp .env.example .env
```

Następnie dostosuj ustawienia w pliku `.env`:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stacjapaliw
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Wygenerowanie klucza aplikacji
```bash
php artisan key:generate
```

### 5. Migracje bazy danych
```bash
php artisan migrate
```

### 6. Zapełnienie bazy danych
```bash
php artisan db:seed
```

### 7. Uruchomienie serwera aplikacji
```bash
php artisan serve
```

Aplikacja będzie dostępna pod adresem:
```
http://127.0.0.1:8000
```
