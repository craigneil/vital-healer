# Vital Healer Labs - Website Deployment Package

## 📦 Package Overview

This is a complete, production-ready website for **vitalhealer.com** - a research peptides e-commerce platform optimized for SEO and conversions.

**Version**: 1.0.0  
**Last Updated**: January 2025  
**PHP Version**: 7.4+ (8.0+ recommended)  
**Server**: Apache 2.4+ or Nginx 1.18+

---

## 🎯 What's Included

### Core Files Created:
1. ✅ **config.php** - Central configuration
2. ✅ **index.php** - Homepage
3. ✅ **includes/header.php** - Dynamic header with SEO
4. ✅ **includes/footer.php** - Dynamic footer
5. ✅ **products/bpc-tb500-blend.php** - Complete product page
6. ✅ **.htaccess** - Performance & security settings
7. ✅ **robots.txt** - Search engine directives
8. ✅ **sitemap.xml** - XML sitemap
9. ✅ **DEPLOYMENT-CHECKLIST.md** - Step-by-step launch guide
10. ✅ **SEO-STRATEGY.md** - Complete SEO documentation

### Features Implemented:
- ✅ Mobile-responsive Bootstrap 5 design
- ✅ SEO-optimized page structure
- ✅ Schema.org structured data (Product + FAQ)
- ✅ Clean URLs (no .php extensions)
- ✅ Performance optimization (Gzip, caching, minification)
- ✅ Security headers configured
- ✅ Open Graph & Twitter Cards
- ✅ Breadcrumb navigation
- ✅ Dynamic navigation system
- ✅ Modular PHP structure

---

## 🚀 Quick Installation (5 Steps)

### Step 1: Extract Files
```bash
unzip vitalhealer-deployment.zip
cd vitalhealer-site/
```

### Step 2: Update Configuration
Edit `config.php` and change:
```php
define('SITE_URL', 'https://vitalhealer.com');
define('SITE_EMAIL', 'service@vitalhealer.com');
```

### Step 3: Upload to Server
Via FTP/SFTP, upload all files to your web root (`public_html` or `www`):
```
/public_html/
  ├── config.php
  ├── index.php
  ├── .htaccess
  ├── robots.txt
  ├── sitemap.xml
  ├── includes/
  ├── products/
  └── images/
```

### Step 4: Set Permissions
```bash
chmod 644 config.php .htaccess robots.txt sitemap.xml
chmod 755 includes/ products/ images/ css/ js/
```

### Step 5: Test
Visit: `https://vitalhealer.com` and verify everything loads.

---

## 📁 Complete File Structure

```
vitalhealer-site/
│
├── 📄 config.php                      # MUST EDIT: Update SITE_URL and SITE_EMAIL
├── 📄 index.php                       # Homepage
├── 📄 .htaccess                       # Apache configuration
├── 📄 robots.txt                      # SEO robots file
├── 📄 sitemap.xml                     # XML sitemap (update as you add pages)
│
├── 📁 includes/
│   ├── header.php                     # Dynamic header with navigation
│   └── footer.php                     # Dynamic footer
│
├── 📁 products/
│   └── bpc-tb500-blend.php           # BPC-157 TB-500 product page
│   # Add more product pages here following the same template
│
├── 📁 images/
│   ├── peptide_bottle_vital_healer.png
│   ├── logo.svg                       # TODO: Add your logo
│   ├── og-image.jpg                   # TODO: Add 1200x630px social image
│   └── products/
│       ├── bpc-tb500-blend.jpg       # TODO: Add actual product images
│       ├── bpc-157-solo.jpg
│       ├── tb-500-solo.jpg
│       ├── ghk-cu.jpg
│       └── ipamorelin-cjc.jpg
│
├── 📁 css/
│   └── custom.css                     # Optional: Additional styles
│
├── 📁 js/
│   └── custom.js                      # Optional: Additional scripts
│
└── 📁 docs/
    ├── README.md                      # This file
    ├── DEPLOYMENT-CHECKLIST.md        # Complete deployment checklist
    └── SEO-STRATEGY.md                # SEO optimization guide
```

---

## ⚙️ Server Requirements

### Minimum Requirements:
- **PHP**: 7.4 or higher (8.0+ recommended)
- **Web Server**: Apache 2.4+ with mod_rewrite
- **SSL Certificate**: Required (HTTPS)
- **Storage**: 100MB minimum
- **Bandwidth**: Depends on traffic

### Required Apache Modules:
```bash
# Check if enabled:
apache2ctl -M | grep rewrite
apache2ctl -M | grep deflate
apache2ctl -M | grep expires
apache2ctl -M | grep headers
```

### Required PHP Extensions:
- json
- mbstring
- curl
- gd (for image processing)

---

## 🔧 Configuration Guide

### 1. Update config.php

**CRITICAL**: You MUST update these values:

```php
// Line 3-5: Update with your domain
define('SITE_URL', 'https://vitalhealer.com');
define('SITE_EMAIL', 'service@vitalhealer.com');

// Optional: Update if you have custom OG image
define('DEFAULT_OG_IMAGE', SITE_URL . '/images/og-image.jpg');
```

### 2. Update Navigation Menu

In `config.php`, find `$nav_menu` array:

```php
$nav_menu = [
    ['url' => 'shop.php', 'label' => 'Shop'],
    ['url' => 'products.php', 'label' => 'Products'],
    // Add or remove items as needed
];
```

### 3. Add Your Images

Replace placeholder images in `/images/`:
- **logo.svg** - Your company logo
- **og-image.jpg** - Social sharing image (1200x630px)
- **peptide_bottle_vital_healer.png** - Product hero image

In `/images/products/`:
- Add all product images (recommended: 800x800px, optimized)

---

## 📄 Creating Additional Pages

### To Add a New Page:

1. **Copy an existing page template**:
```bash
cp index.php about.php
```

2. **Update the page-specific variables** at the top:
```php
$page_title = 'About Us - Vital Healer Labs';
$page_description = 'Learn about Vital Healer Labs...';
$page_keywords = 'about, peptides, research';
```

3. **Replace content** between `include 'includes/header.php';` and `include 'includes/footer.php';`

4. **Add to navigation** in `config.php`:
```php
$nav_menu = [
    // existing items...
    ['url' => 'about.php', 'label' => 'About'],
];
```

5. **Add to sitemap.xml**:
```xml
<url>
    <loc>https://vitalhealer.com/about</loc>
    <lastmod>2025-01-01</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
</url>
```

### To Add a New Product:

1. **Copy the product template**:
```bash
cp products/bpc-tb500-blend.php products/your-product-slug.php
```

2. **Update the product array** at the top with your product data

3. **Update SEO variables** (title, description, keywords)

4. **Add product images** to `/images/products/`

5. **Add to sitemap.xml**

---

## 🎨 Customization

### Change Brand Colors

Edit `includes/header.php` in the `<style>` section:

```css
:root {
    --bs-primary: #2d65c7;  /* Change this - Primary Blue */
    --bs-primary-rgb: 45, 101, 199;  /* RGB equivalent */
}

.text-accent {
    color: #b136c7;  /* Change this - Accent Purple */
}
```

### Add Custom CSS

Create `/css/custom.css` and add to header.php:
```php
$additional_css = '<link rel="stylesheet" href="/css/custom.css">';
```

### Add Custom JavaScript

Create `/js/custom.js` and add to footer.php:
```php
$additional_js = '<script src="/js/custom.js"></script>';
```

---

## 🔍 SEO Setup (After Deployment)

### 1. Google Search Console
1. Go to: https://search.google.com/search-console
2. Add property for `https://vitalhealer.com`
3. Verify ownership (HTML file method recommended)
4. Submit sitemap: `https://vitalhealer.com/sitemap.xml`
5. Request indexing for key pages

### 2. Google Analytics
1. Create GA4 property at: https://analytics.google.com
2. Get tracking code
3. Add to `includes/header.php` before `</head>`:
```html
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

### 3. Bing Webmaster Tools
1. Go to: https://www.bing.com/webmasters
2. Add site and verify
3. Submit sitemap

### 4. Schema Testing
1. Test structured data: https://search.google.com/test/rich-results
2. Paste URL: `https://vitalhealer.com/products/bpc-tb500-blend`
3. Verify Product and FAQ schemas appear

---

## 🛡️ Security Checklist

- ✅ SSL certificate installed and forced via .htaccess
- ✅ Security headers configured (X-Frame-Options, CSP, etc.)
- ✅ Directory browsing disabled
- ✅ Sensitive files protected
- ✅ File permissions set correctly
- ⚠️ **TODO**: Add CAPTCHA to contact forms
- ⚠️ **TODO**: Implement rate limiting
- ⚠️ **TODO**: Set up regular security scans

---

## 📊 Performance Optimization

### Already Implemented:
- ✅ Gzip compression (.htaccess)
- ✅ Browser caching (.htaccess)
- ✅ Minimal external dependencies
- ✅ Optimized image loading
- ✅ Clean, semantic HTML

### Additional Recommendations:
1. **Compress Images**: Use TinyPNG or ImageOptim
2. **Enable CDN**: Cloudflare (free tier available)
3. **Enable OPcache**: PHP opcode caching
4. **Monitor**: Use GTmetrix or PageSpeed Insights

---

## 🐛 Troubleshooting

### "404 Not Found" on product pages
**Solution**: Ensure mod_rewrite is enabled:
```bash
sudo a2enmod rewrite
sudo service apache2 restart
```

### Images not loading
**Solution**: Check permissions:
```bash
chmod -R 755 images/
```

### .htaccess not working
**Solution**: Ensure AllowOverride is set in Apache config:
```apache
<Directory /var/www/html>
    AllowOverride All
</Directory>
```

### Page loads slowly
**Solution**: 
1. Check image sizes (compress with TinyPNG)
2. Enable Gzip (should be automatic with .htaccess)
3. Clear browser cache
4. Use CDN

---

## 📞 Support & Documentation

### Documentation Files:
- **README.md** (this file) - Overview and quick start
- **DEPLOYMENT-CHECKLIST.md** - Complete step-by-step deployment
- **SEO-STRATEGY.md** - Detailed SEO optimization guide

### Online Resources:
- **PHP Manual**: https://www.php.net/manual/
- **Bootstrap Docs**: https://getbootstrap.com/docs/5.3/
- **Apache Docs**: https://httpd.apache.org/docs/
- **Schema.org**: https://schema.org/

### Testing Tools:
- **PageSpeed**: https://pagespeed.web.dev/
- **Mobile-Friendly**: https://search.google.com/test/mobile-friendly
- **Rich Results**: https://search.google.com/test/rich-results
- **Schema Validator**: https://validator.schema.org/

---

## 📋 Pre-Launch Checklist

Before going live, ensure:

- [ ] config.php updated with correct domain
- [ ] All placeholder images replaced
- [ ] Logo and og-image uploaded
- [ ] SSL certificate installed
- [ ] All pages tested on mobile
- [ ] Forms working (if applicable)
- [ ] Analytics installed
- [ ] Search Console verified
- [ ] Sitemap submitted
- [ ] Privacy Policy added
- [ ] Terms & Conditions added
- [ ] Contact information verified

---

## 🚀 Next Steps

### Immediate (Week 1):
1. Deploy to staging environment first
2. Test all functionality
3. Fix any issues discovered
4. Deploy to production
5. Monitor analytics and errors

### Short-term (Month 1):
1. Add more product pages
2. Create blog/guides section
3. Build email list
4. Start content marketing
5. Pursue initial backlinks

### Long-term (Ongoing):
1. Regular content updates
2. SEO monitoring and optimization
3. User feedback implementation
4. Performance improvements
5. Security updates

---

## 📝 Notes for Developers

### Code Style:
- PHP: PSR-12 standard
- HTML: Semantic, accessible markup
- CSS: Bootstrap 5 utilities preferred
- JavaScript: Vanilla JS, minimal dependencies

### Best Practices Followed:
- ✅ DRY principle (Don't Repeat Yourself)
- ✅ Separation of concerns (config, logic, presentation)
- ✅ Mobile-first responsive design
- ✅ Progressive enhancement
- ✅ Accessibility (ARIA labels, semantic HTML)
- ✅ SEO best practices
- ✅ Security headers and validation

### Extending the Site:
- All configuration in `config.php`
- Page templates use consistent structure
- Easy to add new products/pages
- Modular components (header, footer)
- Well-documented code

---

## 📄 License

This code is proprietary to Vital Healer Labs. All rights reserved.

**Third-party components**:
- Bootstrap 5.3: MIT License
- Google Material Icons: Apache License 2.0

---

## 📧 Contact

**Technical Support**: service@vitalhealer.com  
**Website**: https://vitalhealer.com  
**Version**: 1.0.0  
**Release Date**: January 2025

---

**Ready to deploy?** Follow the DEPLOYMENT-CHECKLIST.md for step-by-step instructions!