# PaiBand Studio Website Theme

Official custom WordPress theme for **PaiBand Studio**.

This repository is intended to make the website easy to maintain with **GitHub + Cursor** while keeping WordPress as the CMS for news posts and legal-page content.

Current theme version: **v3.3.7**

---

## 1. What belongs in this repository

This repository should contain **only the custom PaiBand WordPress theme**.

Recommended repository root:

```text
paiband-studio-theme/
├── README.md
├── CONTRIBUTING.md
├── CHANGELOG.md
├── .gitignore
├── .cursor/
│   └── rules/
│       └── paiband-theme.mdc
├── docs/
│   ├── EDITING-GUIDE.md
│   ├── WORDPRESS-CONTENT.md
│   └── DEPLOYMENT.md
├── scripts/
│   ├── validate-theme.sh
│   └── validate-theme.ps1
├── assets/
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── page-*.php
├── home.php
├── single.php
├── archive.php
├── search.php
├── 404.php
├── index.php
└── style.css
```

Do **not** commit:

- `wp-config.php`
- WordPress core
- database exports containing private data
- server passwords
- API keys
- hosting credentials
- `/wp-content/uploads/`
- cache directories
- plugin-generated cache files

The Git repository controls the **theme code**. WordPress still controls database content such as Posts, page-editor content, menus, and Customizer values.

---

# 2. Architecture at a glance

Use this rule:

> **PHP = page structure/content**  
> **CSS = appearance**  
> **JavaScript = animation/interactions**  
> **assets/ = images/logos**  
> **WordPress Admin = posts, menus, legal content, site settings**

Important files:

| What you want to edit | File |
|---|---|
| Homepage | `front-page.php` |
| Games overview | `page-games.php` |
| Restore Your Island | `page-restore-your-island.php` |
| Mouse Chef: Dig Out | `page-mouse-chef-dig-out.php` |
| About | `page-about.php` |
| Team | `page-team.php` |
| Press | `page-press.php` |
| Support | `page-support.php` |
| Contact | `page-contact.php` |
| TGS page | `page-tgs.php` |
| Header | `header.php` |
| Footer | `footer.php` |
| News listing | `home.php` |
| Individual news article | `single.php` |
| Search results | `search.php` |
| Archives | `archive.php` |
| 404 | `404.php` |
| Global styling | `style.css` |
| Animations | `assets/site.js` |
| Settings/helpers/socials | `functions.php` |

---

# 3. First GitHub setup

## Recommended branches

Use:

```text
main
```

for the version that is approved for the live site.

Create short-lived branches for changes:

```text
feature/team-update
feature/homepage-copy
feature/new-social-links
fix/mobile-menu
fix/contrast
```

Example workflow:

```bash
git checkout main
git pull
git checkout -b feature/team-update

# make changes

git add .
git commit -m "Update team members and portraits"
git push -u origin feature/team-update
```

Open a Pull Request, review it, then merge into `main`.

For a small team, this is enough. Avoid having multiple people directly edit `main` at the same time.

---

# 4. Opening the project in Cursor

Clone the repository:

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
cd YOUR_REPOSITORY
```

Then open that folder in Cursor.

Cursor should see the repository documentation and the rule under:

```text
.cursor/rules/paiband-theme.mdc
```

Before asking Cursor to change something, be specific.

Good prompt:

```text
Update the Restore Your Island hero paragraph in
page-restore-your-island.php.

Do not change the layout, CSS classes, buttons, or Press Kit URL.
Run PHP syntax validation after editing.
```

Good layout prompt:

```text
In front-page.php, move the Studio profile section so it appears
immediately after the Games section.

Do not rewrite either section. Only change their order.
```

Good CSS prompt:

```text
In style.css, reduce homepage section vertical padding on mobile only.
Do not change desktop spacing.
```

Avoid vague prompts like:

```text
Make the website cooler.
```

That encourages unnecessary redesigns.

---

# 5. Editing normal text

Open the PHP file that controls the page.

Example in `front-page.php`:

```html
<h1>Games with a strong hook.</h1>
```

Change only the text:

```html
<h1>Your new headline.</h1>
```

Paragraph:

```html
<p>Existing paragraph.</p>
```

becomes:

```html
<p>New paragraph.</p>
```

Keep the HTML tags unless you intentionally want to change the page structure.

### Safe rule

If you only want to change wording, edit **between the opening and closing tags**.

---

# 6. Editing or moving homepage blocks

The homepage is built from `<section>` blocks in:

```text
front-page.php
```

A typical block looks like:

```html
<section class="paper">
 <div class="wrap">
  ...
 </div>
</section>
```

## Move a block

Cut the **entire `<section> ... </section>` block** and paste it above or below another complete section.

Do not move only part of the block.

## Delete a block

Delete from its opening:

```html
<section ...
```

through the matching:

```html
</section>
```

## Duplicate a block

Copy the complete section, paste it where wanted, then edit the duplicated content.

### Important

After changing PHP structure, run:

```bash
php -l front-page.php
```

or use the repository validation script.

---

# 7. Editing the Games cards

Homepage cards are inside:

```text
front-page.php
```

The dedicated game pages are:

```text
page-restore-your-island.php
page-mouse-chef-dig-out.php
```

Typical image code:

```php
<img src="<?php echo paiband_asset('restore-keyart.jpg'); ?>">
```

This loads:

```text
assets/restore-keyart.jpg
```

To replace the picture without touching PHP, overwrite the file with another image using exactly the same filename.

---

# 8. Game assets and filenames

Important assets include:

```text
assets/restore-keyart.jpg
assets/restore-logo.png
assets/restore-01.jpg
assets/restore-02.jpg
assets/restore-03.jpg
assets/restore-04.jpg

assets/escape-keyart.jpg
assets/mouse-chef-logo.png
assets/escape-01.jpg
assets/escape-02.jpg
assets/escape-03.jpg
assets/escape-04.jpg

assets/paiband-flower.png
assets/paiband-studio-logo.png
```

If you use a new filename, update the PHP reference too.

Example:

```php
paiband_asset('restore-new-keyart.jpg')
```

---

# 9. Editing team members

The Team page is deliberately centralized in:

```text
page-team.php
```

At the top is one array:

```php
$paiband_team = [
 [
  'name' => 'Arash Negahban',
  'role' => 'Creative Director and CEO',
  'photo' => 'team-01-arash-negahban.jpg',
  'initials' => 'AN',
 ],
 ...
];
```

## Change a role

Edit:

```php
'role' => 'Old Role',
```

to:

```php
'role' => 'New Role',
```

## Reorder people

Move the complete member array block up or down.

The visual order follows the PHP array order.


### Current Team baseline

The current website Team order is:

1. Arash Negahban — Creative Director and CEO
2. Mohammadreza Aboutalebi — Technical Director and CTO
3. Mojataba Zamani — Art Director
4. Saeed Abbasi — Senior Programmer
5. Saeed Namdari — Senior Programmer
6. Siavash Negahban — Composer and Sound Designer
7. Erfan Jamali — Marketing Manager
8. Mojtaba Ataeifar — 3D Artist
9. Mohammad Nikandish — Animator

The desktop grid is intentionally 3 × 3 for this nine-person roster.

## Add a new person

Copy one member:

```php
[
 'name' => 'New Person',
 'role' => 'New Role',
 'photo' => 'team-09-new-person.jpg',
 'initials' => 'NP',
],
```

Put their photo in:

```text
assets/team-09-new-person.jpg
```

## Remove someone

Delete their complete array entry.

## Current portrait files

```text
team-01-arash-negahban.jpg
team-02-mohammadreza-aboutalebi.jpg
team-03-mojataba-zamani.jpg
team-04-saeed-abbasi.jpg
team-05-saeed-namdari.jpg
team-06-siavash-negahban.jpg
team-07-erfan-jamali.jpg
team-08-mojtaba-ataeifar.jpg
team-09-mohammad-nikandish.jpg
```

If a photo file is missing, the theme automatically displays the person's initials.

---

# 10. Adding News posts

**Do not add normal news articles by editing PHP.**

News posts are WordPress database content.

In WordPress Admin:

```text
Posts → Add New
```

Recommended workflow:

1. Enter the article title.
2. Write the article.
3. Add a Featured Image.
4. Add an Excerpt if you want precise card text.
5. Choose categories/tags if needed.
6. Publish.

The theme automatically displays posts through:

```text
home.php
```

Individual posts use:

```text
single.php
```

## Change the News listing design

Edit:

```text
home.php
```

## Change individual article design

Edit:

```text
single.php
```

## Important Git limitation

WordPress posts are stored in the WordPress database, **not this Git repository**.

Git will track how News looks, but not the actual article text added in WordPress Admin.

---

# 11. Menus / navigation

The header is:

```text
header.php
```

However, the navigation items normally come from the WordPress menu system.

Go to:

```text
Appearance → Menus
```

or the relevant WordPress navigation screen and assign a menu to:

```text
Primary Menu
```

If no menu is assigned, the fallback menu in `functions.php` is used.

The fallback is inside:

```php
function paiband_menu_fallback()
```

Edit it only if you want to change the automatic fallback.

---

# 12. Editing social links

Social links are intentionally managed from WordPress rather than hard-coded repeatedly.

Go to:

```text
Appearance → Customize → PaiBand Studio Settings
```

Available fields:

```text
LinkedIn URL
X / Twitter URL
Instagram URL
YouTube URL
TikTok URL
Discord invite URL
```

Leave a field blank to hide that network.

Configured social links automatically appear in the footer.

## Editing social networks in code

The social network definitions are in:

```text
functions.php
```

Search for:

```php
function paiband_social_links()
```

If you want to add Bluesky, for example:

1. Add a Customizer setting in `$url_settings`.
2. Add the network to `$definitions`.
3. The footer loop will render it automatically.

---

# 13. Contact email, studio location and TGS information

These are also editable in:

```text
Appearance → Customize → PaiBand Studio Settings
```

Current settings include:

```text
Public contact email
Studio location
TGS 2026 area / booth
TGS meeting URL
```

The templates access these through helper functions:

```php
paiband_email()
paiband_location()
paiband_booth()
paiband_meeting()
```

This is intentional: changing the value once can update multiple pages.

---

# 14. Editing the footer

Footer layout:

```text
footer.php
```

Footer columns currently include:

- Studio
- Games
- Help & Legal
- Social links when configured

You can rename or reorder columns directly in `footer.php`.

Do not hard-code the email when a helper already exists.

Use:

```php
<?php echo antispambot(paiband_email()); ?>
```

instead.

---

# 15. Editing colors

Open:

```text
style.css
```

The main palette is defined near the beginning using CSS variables.

Example:

```css
:root{
 --bg:#0a0b0e;
 --paper:#f1eee7;
 --orange:#f0a12b;
 ...
}
```

Use these variables wherever possible instead of adding unrelated new colors.

## Contrast rule

This project intentionally enforces:

- **light/paper background → dark text**
- **dark background → light text**
- **game cards over images → white text + dark gradient**

Do not remove the v3.3.1 contrast rules near the bottom of `style.css` unless you replace them with an equally readable solution.

---

# 16. Editing font sizes and spacing

Search `style.css` for the selector controlling the element.

Examples:

```css
.hero h1
.section-head h2
.page-hero h1
section
```

Responsive typography often uses:

```css
font-size:clamp(52px,7vw,96px);
```

Meaning:

```text
minimum / responsive / maximum
```

For section spacing:

```css
section{
 padding:110px 0;
}
```

Use the mobile media queries near the bottom for phone-specific changes.

---

# 17. Animations

Animations are split between:

```text
style.css
assets/site.js
```

`style.css` controls animation appearance/transitions.

`assets/site.js` controls behavior such as:

- scroll reveals
- parallax
- pointer glow
- card tilt
- header scroll state
- progress indicator

If you change JavaScript or CSS, also update the version string in:

```text
functions.php
```

Example:

```php
wp_enqueue_style(..., '3.3.3');
wp_enqueue_script(..., '3.3.3', true);
```

Incrementing it helps prevent users from seeing cached old CSS/JS.

---

# 18. Press Kit links

The current official Press Kit links should remain:

## Restore Your Island

```text
https://drive.google.com/drive/folders/1cvdHpmj0IRikvvCCURtEChOYvtuOnShp?usp=drive_link
```

## Mouse Chef: Dig Out

```text
https://drive.google.com/drive/folders/1JbNNS0LDzA3Q5TTRCQKJAApBtNp8cCVt?usp=drive_link
```

They are used on:

```text
page-restore-your-island.php
page-mouse-chef-dig-out.php
page-press.php
```

`page-escape-by-spoon.php` still loads that same template while the WordPress page slug is `escape-by-spoon`.

If a press-kit URL changes, search the repository for the old URL and replace every intended occurrence.

---

# 19. Game facts that should not be casually changed

Current website facts used by this theme:

### Restore Your Island

```text
Release: 9 April 2026
Developer: PaiBand Studio
Platforms: Windows and macOS on Steam
```

### Mouse Chef: Dig Out

```text
Release year: 2027
Platform: PC / Steam
Genre wording: First-Person Adventure Exploration
```

When factual game information changes, update every relevant occurrence, not just one card.

Search the repository for:

```text
2027
9 April 2026
Restore Your Island
Mouse Chef: Dig Out
```

---

# 20. TGS page

TGS belongs primarily in:

```text
page-tgs.php
```

The studio homepage should stay **studio-first**.

Do not turn the global homepage into a TGS microsite.

Current booth:

```text
SELECTED INDIE 80 area · Booth E-26
```

The booth value should normally be changed through the WordPress Customizer rather than repeated manually.

---

# 21. Legal pages

Templates:

```text
page-privacy-policy.php
page-terms-of-use.php
page-cookie-policy.php
```

The templates are designed to render WordPress page content.

Do not replace legal text with invented copy in PHP.

Edit legal text through the corresponding WordPress Page editor unless legal counsel instructs otherwise.

---

# 22. Creating a new normal page

For a normal WordPress page, use:

```text
page.php
```

If you need a special page with its own layout:

```text
page-example.php
```

WordPress can automatically use it for the `/example/` slug.

A minimal template:

```php
<?php /* Template Name: Example */ get_header(); ?>

<main class="site-main">
 <section class="page-hero">
  <div class="wrap">
   <div class="eyebrow">Example</div>
   <h1>Page title.</h1>
  </div>
 </section>

 <section class="paper">
  <div class="wrap">
   <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
  </div>
 </section>
</main>

<?php get_footer(); ?>
```

---

# 23. Safe PHP rules for Cursor

When editing PHP:

- keep `<?php ... ?>` valid
- escape URLs with `esc_url()`
- escape normal output with `esc_html()`
- escape HTML attributes with `esc_attr()`
- use `antispambot()` for displayed email where appropriate
- do not remove `wp_head()`
- do not remove `wp_footer()`
- do not remove `wp_body_open()`
- do not rename WordPress template files casually
- do not change URL slugs without planning redirects
- run PHP lint after changes

---

# 24. Validation before committing

Linux/macOS:

```bash
bash scripts/validate-theme.sh
```

Windows PowerShell:

```powershell
./scripts/validate-theme.ps1
```

The scripts check required theme files and run PHP syntax checks when PHP is installed.

Also test manually:

- `/`
- `/games/`
- `/games/restore-your-island/`
- `/games/mouse-chef-dig-out/`
- `/about/`
- `/team/`
- `/news/`
- `/press/`
- `/support/`
- `/contact/`
- `/tgs/`
- `/privacy-policy/`
- a single News post
- 404 page
- mobile navigation

---

# 25. Deployment options

The safest process is:

```text
Cursor → Git branch → Pull Request → merge to main → staging → live
```

Do not use the live server as the primary source of truth after GitHub is established.

See:

```text
docs/DEPLOYMENT.md
```

for deployment options.

---

# 26. WordPress cache after deployment

If CSS/JS/PHP appears unchanged:

1. Clear WordPress cache plugin.
2. Clear host/server cache.
3. Clear CDN cache.
4. Clear Elementor Files & Data if Elementor is installed.
5. Hard refresh browser.
6. Test private/incognito mode.

---

# 27. Elementor header/footer warning

This theme has its own:

```text
header.php
footer.php
```

If Elementor Theme Builder has an old Header or Footer assigned to:

```text
Entire Site
```

it can override the theme.

Fix:

```text
Elementor → Theme Builder
→ Header / Footer
→ Display Conditions
→ remove Entire Site
```

or set the old templates to Draft.

Then clear Elementor Files & Data and all caches.

---

# 28. Recommended content workflow

Use **Git/Cursor** for:

- layout changes
- text baked into custom templates
- game page structure
- team structure
- theme design
- animations
- CSS
- header/footer layout
- reusable settings/functions

Use **WordPress Admin** for:

- News posts
- Featured images for News
- menu order
- legal-page text
- site settings/customizer values
- social URLs
- contact email/location/TGS setting

This division avoids storing database content in theme files and keeps the codebase maintainable.

---

# 29. Before asking Cursor to edit

A good task should say:

1. **which file**
2. **what exact content/layout should change**
3. **what must not change**
4. **whether the change should be responsive**
5. **run validation afterward**

Example:

```text
Edit page-team.php.

Add a ninth team member after Mohammad Nikandish.
Use photo assets/team-09-name.jpg.
Do not change the existing eight people or Team page layout.
Run PHP lint when finished.
```

---

# 30. Project design rules

Please preserve these decisions:

- PaiBand Studio is the website's main focus.
- TGS is important but is not the identity of the whole website.
- Restore Your Island and Mouse Chef: Dig Out can have very different aesthetics.
- The overall studio site remains dark/editorial with cream and orange accents.
- Keep strong contrast.
- Do not use white text on cream/white backgrounds.
- Do not use dark text directly over dark game artwork.
- Use the official PaiBand logos already in `/assets/`.
- Do not invent team roles, release dates, platforms, social accounts, press-kit links, or legal content.


# 32. Official social links

The footer currently renders these official PaiBand social links with inline SVG icons:

```text
YouTube   https://www.youtube.com/@Paibandstudio
Discord   https://discord.com/invite/GAfHQmZzfk
Instagram https://www.instagram.com/paibandstudio?igsh=MXdkOW40dHl3Mmc2ag==
TikTok    https://www.tiktok.com/@paiband
X         https://x.com/RestoreIsland
LinkedIn  https://www.linkedin.com/company/paiband-studio
```

The default URLs are centralized in:

```text
functions.php
```

Search for:

```php
function paiband_social_links()
```

The SVG icon markup is centralized in:

```php
function paiband_social_icon($key)
```

Do not paste social URLs repeatedly into `footer.php`.

They are also exposed through:

```text
Appearance → Customize → PaiBand Studio Settings
```

If a URL must change, updating the Customizer is normally preferred for the live website. For a repository-level default change, update `functions.php`.


## Support page

The old **FAQ / Common Questions** section was intentionally removed in v3.3.5.

Current Support flow:

```text
Support hero
→ Restore Your Island support card
→ Mouse Chef: Dig Out support card
→ Still need help? contact CTA
```

Do not restore the FAQ unless explicitly requested.
