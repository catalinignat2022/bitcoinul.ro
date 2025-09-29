# Bitcoinul.ro - WordPress Site

Acest repository conține codul sursă pentru site-ul bitcoinul.ro, un site WordPress dedicat informațiilor despre Bitcoin în România.

## 🚀 Caracteristici

- Site WordPress cu tema personalizată "bitcoinul-ro"
- Conținut specializat pe Bitcoin și criptomonede
- Ghiduri și informații pentru piața din România

## 📋 Cerințe

- PHP 8.0+
- MySQL 5.7+ sau MariaDB 10.3+
- WordPress 6.0+

## ⚡ Instalare Rapidă

1. **Clonează repository-ul:**
```bash
git clone https://github.com/catalinignat2022/bitcoinul.ro.git
cd bitcoinul.ro
```

2. **Configurează baza de date:**
```bash
# Creează baza de date MySQL
mysql -u root -e "CREATE DATABASE bitcoinul_ro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;"

# Importă datele (dacă ai un backup SQL)
mysql -u root bitcoinul_ro < your_database_backup.sql
```

3. **Configurează WordPress:**
```bash
# Copiază și editează fișierul de configurație
cp wp-config-sample.php wp-config.php
# Editează wp-config.php cu datele tale de bază de date
```

4. **Pornește serverul de dezvoltare:**
```bash
# Folosind wp-cli (recomandat)
wp server --host=localhost --port=8080

# Sau folosind PHP built-in server
php -S localhost:8080
```

## 🛠️ Dezvoltare cu WP-CLI

Acest proiect este optimizat pentru dezvoltare cu WP-CLI:

```bash
# Verifică statusul WordPress
wp core is-installed

# Actualizează URL-urile pentru mediul local
wp search-replace 'https://bitcoinul.ro' 'http://localhost:8080'

# Listează utilizatorii
wp user list

# Verifică tema activă
wp theme list

# Verifică plugin-urile
wp plugin list
```

## 📁 Structura Proiectului

```
bitcoinul.ro/
├── wp-admin/           # Panoul de administrare WordPress
├── wp-content/         # Conținut personalizat
│   ├── themes/         # Teme WordPress
│   │   └── bitcoinul-ro/ # Tema personalizată
│   ├── plugins/        # Plugin-uri
│   └── uploads/        # Fișiere încărcate
├── wp-includes/        # Core WordPress
├── wp-config.php       # Configurația WordPress (nu în git)
└── README.md          # Acest fișier
```

## 🔧 Configurare Avansată

### Variabile de Mediu

Pentru diferite medii (dezvoltare, staging, producție), poți configura:

```php
// În wp-config.php
define('WP_ENVIRONMENT_TYPE', 'development'); // sau 'staging', 'production'
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

### Tema Personalizată

Tema "bitcoinul-ro" se află în `wp-content/themes/bitcoinul-ro/` și conține:
- Design responsiv
- Integrare cu Bitcoin APIs
- Funcționalități personalizate pentru conținut crypto

## 🚀 Deploy

Pentru deploy pe server live:

1. Actualizează URL-urile:
```bash
wp search-replace 'http://localhost:8080' 'https://bitcoinul.ro'
```

2. Dezactivează debug mode în wp-config.php

3. Configurează .htaccess pentru optimizări

## 📝 Contribuții

Pentru contribuții la acest proiect:

1. Fork repository-ul
2. Creează o branch pentru feature-ul tău
3. Commit modificările
4. Push la branch
5. Deschide un Pull Request

## 📄 Licență

Acest proiect este licențiat sub [Licența ta aici].

## 📞 Contact

Pentru întrebări sau support: [Detaliile tale de contact]