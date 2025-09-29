# 🔧 GHID RAPID DE REPARARE - Bitcoinul.ro

## ⚠️ PROBLEME IDENTIFICATE

### 1. Logo-uri Ovale (în loc de rotunde)
**CAUZĂ:** CSS inconsistent pentru logo-urile exchange-urilor
**SOLUȚIE:** Aplicată în `style.css` cu `!important`

### 2. Meniul afișează 404
**CAUZĂ:** Paginile WordPress nu sunt create efectiv
**SOLUȚIE:** Folosește una din metodele de mai jos

## 🚀 SOLUȚII RAPIDE

### Metoda 1: Debug Automat
1. Accesează: `yoursite.com/wp-content/themes/bitcoinul-ro/debug-pages.php`
2. Click pe "🔄 Recreează Paginile"
3. Testează meniul

### Metoda 2: URL Admin
1. Loghează-te în WordPress admin
2. Accesează: `yoursite.com/wp-admin/?recreate_pages=1`
3. Vezi mesajul de confirmare

### Metoda 3: Manual în Functions.php
Adaugă temporar în functions.php (la sfârșitul fișierului):
```php
// DEBUG: Recreează paginile - ȘTERGE DUPĂ FOLOSIRE
add_action('wp_head', function() {
    if (current_user_can('manage_options') && isset($_GET['force_pages'])) {
        bitcoinul_ro_recreate_pages();
        echo '<!-- Pagini recreate cu succes -->';
    }
});
```
Apoi accesează: `yoursite.com/?force_pages=1`

## 🎨 VERIFICARE LOGO-URI

După aplicarea fix-ului, logo-urile exchange-urilor ar trebui să fie:
- ✅ Perfect rotunde (nu ovale)
- ✅ 60x60px dimensiune
- ✅ Border gri subtil
- ✅ `object-fit: cover` pentru aspect corect

Dacă încă sunt ovale, forțează refresh cu `Ctrl+F5` (sau `Cmd+F5` pe Mac).

## 📱 TEST FINAL

1. **Testează meniul:**
   - Exchange-uri → `/exchange-uri/`
   - Ghiduri → `/ghiduri/`
   - Știri → `/stiri/`

2. **Verifică logo-urile:** Toate rotunde pe pagina Exchange-uri

3. **Responsive:** Testează pe mobil

## 🔍 DEBUGGING AVANSAT

### Verifică paginile în WordPress Admin:
- Meniu: `Pagini` → Vezi dacă există: "Exchange-uri Bitcoin România", "Ghiduri Bitcoin & Crypto", "Știri Bitcoin & Crypto"

### Verifică meniul WordPress:
- `Aspect` → `Meniuri` → Setează meniul principal dacă este necesar

### CSS Override (dacă logo-urile rămân ovale):
```css
.exchange-logo img {
    width: 60px !important;
    height: 60px !important;
    border-radius: 50% !important;
    object-fit: cover !important;
}
```

## 📞 SUPPORT
Dacă problemele persistă, verifică:
1. Cache-ul site-ului (curăță cache)
2. Permisiunile fișierelor (755 pentru directoare, 644 pentru fișiere)
3. Erori în log-urile WordPress

---
**Autor:** GitHub Copilot  
**Data:** Septembrie 2025  
**Versiune:** 1.0