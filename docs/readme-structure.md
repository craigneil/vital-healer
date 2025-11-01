# Vital Healer Labs - PHP Site Structure

## File Structure

```
/
├── config.php                 # Site configuration and global variables
├── index.php                  # Home page
├── shop.php                   # Shop page (create using template below)
├── products.php               # Products page
├── guides.php                 # Guides page
├── shipping.php               # Shipping page
├── contact.php                # Contact page
├── .htaccess                  # Performance & URL optimization
├── includes/
│   ├── header.php            # Dynamic header with SEO
│   └── footer.php            # Dynamic footer
├── images/
│   ├── peptide_bottle_vital_healer.png
│   └── og-image.jpg          # Default Open Graph image
└── css/
    └── (optional custom CSS)
```

## How to Create New Pages

For any new page, use this template:

```php
<?php
// Load configuration
require_once 'config.php';

// Page-specific SEO settings
$page_title = 'Your Page Title - Vital Healer Labs';
$page_description = 'Your page description here (150-160 characters optimal)';
$page_keywords = 'relevant, keywords, for, this, page';
$page_og_image = SITE_URL . '/images/your-custom-og-image.jpg'; // Optional

// Optional: Add custom CSS
// $additional_css = '<link rel="stylesheet" href="css/custom.css">';

// Optional: Add custom JS
// $additional_js = '<script src="js/custom.js"></script>';

// Include header
include 'includes/header.php';
?>

<!-- Your page content goes here -->
<section class="bg-white py-5">
    <div class="container-md">
        <h1>Your Page Title</h1>
        <p>Your content...</p>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
```

## Configuration Options (config.php)

### Site Settings
- `SITE_NAME` - Site name
- `SITE_TAGLINE` - Site tagline
- `SITE_URL` - Base URL (update for production)
- `SITE_EMAIL` - Contact email

### Default SEO
- `DEFAULT_TITLE` - Default page title
- `DEFAULT_DESCRIPTION` - Default meta description
- `DEFAULT_KEYWORDS` - Default meta keywords
- `DEFAULT_OG_IMAGE` - Default Open Graph image

### Dynamic Arrays
- `$nav_menu` - Navigation menu items
- `$featured_compounds` - Featured compounds on homepage
- `$educational_guides` - Educational guide links
- `$feature_cards` - Feature cards section

## Features

### Performance Optimization
✅ Gzip compression enabled
✅ Browser caching configured
✅ Minimal external dependencies (only Bootstrap & Material Icons)
✅ Clean URLs without .php extension
✅ Security headers configured

### SEO Features
✅ Dynamic page titles and descriptions
✅ Open Graph meta tags for social sharing
✅ Twitter Card meta tags
✅ Canonical URLs
✅ Semantic HTML structure

### Dynamic Components
✅ Reusable header and footer
✅ Active navigation state
✅ Easy content management via config.php
✅ No database required for simple sites

## URL Structure

With the `.htaccess` file, URLs work without `.php` extension:
- `https://vitalhealer.com/` → index.php
- `https://vitalhealer.com/shop` → shop.php
- `https://vitalhealer.com/products` → products.php
- etc.

## Customization

### Adding New Navigation Items
Edit `$nav_menu` array in `config.php`:
```php
$nav_menu = [
    ['url' => 'new-page.php', 'label' => 'New Page'],
    // ...
];
```

### Changing Featured Compounds
Edit `$featured_compounds` array in `config.php`

### Adding Custom CSS/JS to Specific Pages
In your page file before including header:
```php
$additional_css = '<link rel="stylesheet" href="css/custom.css">';
$additional_js = '<script src="js/custom.js"></script>';
```

## Speed Optimization Tips

1. **Optimize Images**: Use WebP format when possible, compress images
2. **Use CDN**: Bootstrap and Material Icons are loaded from CDN
3. **Minimize Custom CSS**: Keep custom styles minimal
4. **Enable OPcache**: Configure PHP OPcache on your server
5. **Use HTTP/2**: Ensure your server supports HTTP/2

## Deployment Checklist

- [ ] Update `SITE_URL` in config.php
- [ ] Create and upload `og-image.jpg` for social sharing
- [ ] Test all internal links
- [ ] Verify .htaccess works on your server
- [ ] Test mobile responsiveness
- [ ] Check page load speed
- [ ] Verify SEO meta tags with browser inspector
- [ ] Test social sharing previews (Facebook Debugger, Twitter Card Validator)

## Server Requirements

- PHP 7.4 or higher
- Apache with mod_rewrite enabled
- mod_deflate for compression (recommended)
- mod_expires for caching (recommended)
- mod_headers for security headers (recommended)
