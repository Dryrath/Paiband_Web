# Deployment Guide

## Recommended model

Treat GitHub `main` as the approved source for the theme.

Recommended:

```text
local/Cursor
    ↓
feature branch
    ↓
Pull Request
    ↓
main
    ↓
staging WordPress
    ↓
live WordPress
```

## Option A — Hosting Git integration

If the hosting provider supports Git deployment:

1. Connect the repository.
2. Deploy the repository into:

```text
wp-content/themes/paiband-studio-2026-v33-2-repo-ready/
```

3. Activate the theme in WordPress.
4. After future merges, deploy/pull the new commit.
5. Clear all caches.

Exact Git integration steps depend on the hosting provider.

## Option B — Manual ZIP deployment

Create a ZIP of the theme folder and upload through:

```text
Appearance → Themes → Add New → Upload Theme
```

For an already installed theme, WordPress/hosting behavior for replacing the same folder may vary. A safer manual route is often File Manager/FTP after taking a backup.

## Option C — SSH / Git pull

If the server permits SSH:

1. Back up the website.
2. Clone or pull the repo inside the WordPress themes directory.
3. Confirm permissions.
4. Run validation.
5. Clear caches.

Do not keep uncommitted edits only on the live server. Commit them back to Git immediately or they will be lost on the next deployment.

## Database content

Git deployment does not update:

- News posts
- WordPress menus
- Customizer settings
- page editor content

Those live in the database.

## Before live deployment

- PHP syntax check passes
- desktop checked
- mobile checked
- header/footer checked
- game buttons checked
- press-kit links checked
- News page checked
- one News article checked
- legal pages checked
- 404 checked
- backup exists

## After deployment

Clear:

- WordPress cache plugin
- hosting/server cache
- CDN cache
- Elementor Files & Data if Elementor is installed

Then hard refresh and test incognito.
