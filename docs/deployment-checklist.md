# Vital Healer Labs - Deployment Checklist

## Pre-Deployment (Before Upload)

### Configuration Files
- [ ] Update `SITE_URL` in config.php to `https://vitalhealer.com`
- [ ] Update `SITE_EMAIL` to your actual email address
- [ ] Update `DEFAULT_OG_IMAGE` path in config.php
- [ ] Review and update all navigation menu items
- [ ] Verify contact information in footer

### Content
- [ ] Replace placeholder images with actual product images
- [ ] Upload og-image.jpg (1200x630px) for social sharing
- [ ] Create and upload logo files (SVG recommended)
- [ ] Verify all product information is accurate
- [ ] Check all internal links work
- [ ] Proofread all content for typos

### Legal Pages (Create these)
- [ ] Privacy Policy page
- [ ] Terms & Conditions page  
- [ ] Refund/Return Policy page
- [ ] Shipping Policy page
- [ ] Research Use Disclaimer page

## Server Setup

### Hosting Environment
- [ ] PHP 7.4+ installed (8.0+ recommended)
- [ ] Apache mod_rewrite enabled
- [ ] mod_deflate enabled (for compression)
- [ ] mod_expires enabled (for caching)
- [ ] mod_headers enabled (for security headers)
- [ ] SSL certificate installed and active
- [ ] HTTPS forced via .htaccess

### File Upload
- [ ] Upload all files via FTP/SFTP
- [ ] Verify directory structure is intact
- [ ] Check that .htaccess file uploaded (not hidden)
- [ ] Ensure config.php uploaded with correct settings

### File Permissions
```bash
# Execute these commands via SSH
chmod 644 config.php
chmod 644 .htaccess
chmod 644 robots.txt
chmod 644 sitemap.xml
chmod 755 includes/
chmod 755 products/
chmod 755 images/
chmod 755 css/
chmod 755 js/
```

### Test URLs
- [ ] https://vitalhealer.com/ (homepage loads)
- [ ] https://vitalhealer.com/products/bpc-tb500-blend (product page loads)
- [ ] https://vitalhealer.com/shop (navigation link works)
- [ ] Test clean URLs work (no .php extension needed)

## Post-Deployment Testing

### Functionality Tests
- [ ] Homepage loads without errors
- [ ] Navigation menu works on desktop
- [ ] Navigation menu works on mobile
- [ ] All internal links function correctly
- [ ] Product page loads with all tabs working
- [ ] Variant selection works (10mg/20mg)
- [ ] Quantity selector works (+/- buttons)
- [ ] Price calculator updates correctly
- [ ] Add to cart button responds
- [ ] Images load properly (no broken images)
- [ ] Forms work (if contact form added)

### Mobile Testing
- [ ] Test on iPhone (Safari)
- [ ] Test on Android (Chrome)
- [ ] Test on tablet (iPad)
- [ ] Check touch targets are large enough
- [ ] Verify text is readable
- [ ] Ensure buttons are tappable
- [ ] Test landscape and portrait modes

### Browser Testing
- [ ] Google Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Microsoft Edge (latest)
- [ ] Check for console errors in each browser

### Performance Testing
- [ ] Run PageSpeed Insights: https://pagespeed.web.dev/
  - Target: 90+ score on mobile
  - Target: 95+ score on desktop
- [ ] Run GTmetrix: https://gtmetrix.com/
- [ ] Check Core Web Vitals pass
- [ ] Verify images are compressed
- [ ] Check Gzip compression is active

### SEO Testing
- [ ] Verify title tags appear correctly
- [ ] Check meta descriptions display
- [ ] Test structured data: https://search.google.com/test/rich-results
- [ ] Validate schema markup: https://validator.schema.org/
- [ ] Check robots.txt is accessible: https://vitalhealer.com/robots.txt
- [ ] Verify sitemap loads: https://vitalhealer.com/sitemap.xml
- [ ] Test mobile-friendly: https://search.google.com/test/mobile-friendly
- [ ] Check canonical URLs are correct
- [ ] Verify Open Graph tags (share on Facebook to test)
- [ ] Test Twitter Card tags (share on Twitter to test)

### Security Testing
- [ ] HTTPS is enforced (HTTP redirects to HTTPS)
- [ ] Security headers present (X-Frame-Options, etc.)
- [ ] Directory browsing is disabled
- [ ] config.php cannot be accessed directly in browser
- [ ] No sensitive information exposed in source code
- [ ] Test form submissions for XSS vulnerabilities
- [ ] Verify file upload restrictions (if applicable)

## SEO Configuration

### Google Search Console
- [ ] Add property for https://vitalhealer.com
- [ ] Verify ownership (HTML file or DNS)
- [ ] Submit sitemap.xml
- [ ] Request indexing for key pages
- [ ] Set up email alerts for issues

### Bing Webmaster Tools
- [ ] Add site to Bing Webmaster
- [ ] Verify ownership
- [ ] Submit sitemap
- [ ] Configure preferences

### Google Analytics
- [ ] Create GA4 property
- [ ] Add tracking code to header.php
- [ ] Test that pageviews are recorded
- [ ] Set up key goals/conversions
- [ ] Link to Search Console

### Optional: Google Tag Manager
- [ ] Create GTM account
- [ ] Install container code
- [ ] Configure tags (Analytics, etc.)
- [ ] Test in preview mode
- [ ] Publish container

## Email Configuration

### SMTP Setup (if using contact forms)
- [ ] Configure SMTP settings in config.php
- [ ] Test email delivery
- [ ] Set up autoresponders
- [ ] Configure SPF records
- [ ] Configure DKIM
- [ ] Verify DMARC policy

### Professional Emails
- [ ] service@vitalhealer.com created
- [ ] info@vitalhealer.com created
- [ ] orders@vitalhealer.com created (if needed)
- [ ] support@vitalhealer.com created (if needed)

## Monitoring & Analytics

### Uptime Monitoring
- [ ] Set up UptimeRobot or Pingdom
- [ ] Configure alert emails/SMS
- [ ] Set check interval (5 minutes recommended)
- [ ] Add status page (optional)

### Error Tracking
- [ ] Enable PHP error logging
- [ ] Set up log rotation
- [ ] Configure error notification emails
- [ ] Review logs weekly

### Backups
- [ ] Set up automated daily backups
- [ ] Test backup restoration
- [ ] Store backups off-site
- [ ] Document backup procedure

## Marketing Setup

### Social Media
- [ ] Create/update Facebook page
- [ ] Create/update Instagram account
- [ ] Create/update Twitter account
- [ ] Add social media links to footer
- [ ] Test social sharing buttons

### Email Marketing (Optional)
- [ ] Set up email service (Mailchimp, etc.)
- [ ] Create welcome email sequence
- [ ] Add newsletter signup form
- [ ] Create abandoned cart emails (if e-commerce)

## Legal & Compliance

### Required Pages
- [ ] Privacy Policy published and linked
- [ ] Terms of Service published and linked
- [ ] Refund Policy published and linked
- [ ] Shipping Policy published and linked
- [ ] Cookie Policy (if EU traffic expected)

### Disclaimers
- [ ] Research use disclaimer on all product pages
- [ ] FDA disclaimer where required
- [ ] Age verification implemented (if required)
- [ ] Export restrictions noted (if applicable)

### Business Compliance
- [ ] Business license valid
- [ ] Sales tax collection configured (if applicable)
- [ ] Payment processor terms accepted
- [ ] Merchant account active

## Launch Day

### Final Checks
- [ ] Clear all caches (browser, server, CDN)
- [ ] Test one more time end-to-end
- [ ] Verify contact form works
- [ ] Check payment processing (if e-commerce)
- [ ] Ensure inventory counts accurate (if applicable)

### Go Live
- [ ] Point DNS to new server
- [ ] Wait for DNS propagation (up to 48 hours)
- [ ] Monitor for issues during propagation
- [ ] Verify old site redirects (if replacing existing site)

### Post-Launch (Day 1)
- [ ] Monitor analytics for traffic
- [ ] Check for 404 errors in Search Console
- [ ] Review server logs for issues
- [ ] Test all functionality again
- [ ] Make note of any user-reported issues

## Week 1 Tasks

### Monitoring
- [ ] Check analytics daily
- [ ] Review Search Console for crawl errors
- [ ] Monitor uptime alerts
- [ ] Check page load speeds
- [ ] Review error logs

### Content
- [ ] Fix any typos or errors discovered
- [ ] Add additional product pages
- [ ] Publish first blog post/guide
- [ ] Update social media with launch announcement

### SEO
- [ ] Request indexing for new pages
- [ ] Check keyword rankings (baseline)
- [ ] Submit site to relevant directories
- [ ] Reach out for initial backlinks
- [ ] Set up Google Business Profile (if local)

## Month 1 Tasks

### Analytics Review
- [ ] Review traffic sources
- [ ] Identify top-performing pages
- [ ] Check bounce rates
- [ ] Analyze user flow
- [ ] Review conversion rates

### Optimization
- [ ] Optimize underperforming pages
- [ ] A/B test key elements
- [ ] Improve page speed if needed
- [ ] Fix any discovered issues
- [ ] Update content based on analytics

### Growth
- [ ] Develop content calendar
- [ ] Build email list
- [ ] Grow social media following
- [ ] Pursue backlink opportunities
- [ ] Consider paid advertising

## Ongoing Maintenance

### Weekly
- [ ] Review analytics
- [ ] Check for broken links
- [ ] Monitor uptime
- [ ] Review and respond to customer inquiries
- [ ] Post on social media

### Monthly
- [ ] Update content/products
- [ ] Review SEO performance
- [ ] Check security updates
- [ ] Backup verification
- [ ] Performance audit

### Quarterly
- [ ] Comprehensive SEO audit
- [ ] Security audit
- [ ] Performance optimization
- [ ] Content refresh
- [ ] User experience review

## Emergency Contacts

### Hosting Support
- Provider: _____________________
- Support URL: __________________
- Phone: ________________________
- Account #: ____________________

### Domain Registrar
- Provider: _____________________
- Support URL: __________________
- Phone: ________________________
- Account #: ____________________

### Technical Support
- Developer: ____________________
- Email: ________________________
- Phone: ________________________

## Notes Section

### Issues Encountered:
_________________________________________________
_________________________________________________
_________________________________________________

### Solutions Applied:
_________________________________________________
_________________________________________________
_________________________________________________

### Future Enhancements:
_________________________________________________
_________________________________________________
_________________________________________________

---

**Deployment Date**: _______________
**Deployed By**: _______________
**Version**: 1.0.0
**Next Review Date**: _______________