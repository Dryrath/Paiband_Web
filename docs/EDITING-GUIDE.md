# Editing Guide

This guide is the short operational version of the main README.

## Edit a page's text

Find the matching PHP template:

```text
Homepage                     front-page.php
Games                        page-games.php
Restore Your Island          page-restore-your-island.php
Escape By Spoon              page-escape-by-spoon.php
About                        page-about.php
Team                         page-team.php
Press                        page-press.php
Support                      page-support.php
Contact                      page-contact.php
TGS                          page-tgs.php
```

Change text between HTML tags. Preserve classes unless intentionally redesigning.

## Move a section

In a page template, identify the complete:

```html
<section ...>
 ...
</section>
```

Cut and paste the whole section.

Never move a random closing `</div>` independently.

## Edit a button

Typical button:

```html
<a class="btn primary" href="https://example.com">Button text →</a>
```

- edit visible label between `>` and `</a>`
- edit destination inside `href`

## Edit an image

If PHP says:

```php
paiband_asset('restore-01.jpg')
```

the file is:

```text
assets/restore-01.jpg
```

Overwrite that file to keep the PHP unchanged.

## Edit Team

Edit the `$paiband_team` array at the top of `page-team.php`. The current roster contains 9 people and the desktop layout is a balanced 3 × 3 grid.

## Edit social links

Recommended:

```text
WordPress → Appearance → Customize → PaiBand Studio Settings
```

No code edit is required for existing supported social networks.

## Edit visual design

Use `style.css`.

## Edit animation

Use `assets/site.js` and animation CSS in `style.css`.

## Validate

Run the appropriate script in `/scripts/`.
