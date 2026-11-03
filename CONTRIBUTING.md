# Contributing to the PaiBand Studio Website

## Branches

- `main` = approved/stable
- create one branch per change

Examples:

```text
feature/team-member
feature/restore-copy
fix/mobile-nav
fix/homepage-contrast
```

## Before editing

1. Pull latest `main`.
2. Create a branch.
3. Read `README.md`.
4. Check `.cursor/rules/paiband-theme.mdc`.

## Before committing

Run:

```bash
bash scripts/validate-theme.sh
```

or on Windows:

```powershell
./scripts/validate-theme.ps1
```

Then manually check the affected page on desktop and mobile.

## Commit messages

Prefer clear messages:

```text
Update Mouse Chef: Dig Out press copy
Add studio LinkedIn footer link
Fix mobile Team grid spacing
Move homepage gallery below Games
```

Avoid:

```text
stuff
changes
update
fix
```

## Pull requests

Include:

- what changed
- screenshots for visible design changes
- pages affected
- mobile tested: yes/no
- PHP validation: pass/fail
- any WordPress Admin steps needed after deployment

## Do not commit

- secrets
- credentials
- database dumps with user/private data
- `wp-config.php`
- `wp-content/uploads`
- cache files
