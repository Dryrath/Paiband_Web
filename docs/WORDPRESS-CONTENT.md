# WordPress Content vs Git Content

A common source of confusion is that a WordPress website has both files and a database.

## Stored in Git / theme files

- page templates
- homepage hard-coded marketing copy
- game page hard-coded marketing copy
- Team member array
- CSS
- JavaScript
- theme images
- header/footer structure
- News layout/templates
- 404/search/archive styling

## Stored in the WordPress database

- News post text
- News post titles
- Featured Images selected through WordPress
- page-editor content
- menus
- Customizer settings
- social-link URLs entered in Customizer
- contact/location/TGS settings entered in Customizer

## Adding a News post

Use:

```text
WordPress Admin → Posts → Add New
```

Do not create a new PHP file for each News post.

## WordPress pages that must exist

Recommended pages/slugs:

```text
Home
/games/
/games/restore-your-island/
/games/mouse-chef-dig-out/   (rename the existing escape-by-spoon page to this slug)
/about/
/team/
/news/
/press/
/support/
/contact/
/tgs/
/privacy-policy/
/terms-of-use/
/cookie-policy/
/sitemap/
```

Set:

```text
Settings → Reading
Homepage = Home
Posts page = News
```

## Important

A Git deployment will not create News posts stored in another site's database.

If moving the entire website to a different WordPress installation, migrate the database/content separately.
