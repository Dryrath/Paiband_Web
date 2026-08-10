#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

required=(style.css index.php functions.php header.php footer.php)

echo "PaiBand theme validation"
echo "========================"

for f in "${required[@]}"; do
  if [[ ! -f "$f" ]]; then
    echo "ERROR: missing required file: $f"
    exit 1
  fi
done

if ! grep -q "Theme Name:" style.css; then
  echo "ERROR: style.css does not contain Theme Name metadata"
  exit 1
fi

if command -v php >/dev/null 2>&1; then
  echo "Running PHP syntax checks..."
  failed=0
  while IFS= read -r -d '' file; do
    if ! php -l "$file" >/dev/null; then
      failed=1
    fi
  done < <(find . -maxdepth 1 -name '*.php' -print0)

  if [[ "$failed" -ne 0 ]]; then
    echo "ERROR: one or more PHP files failed syntax validation"
    exit 1
  fi
else
  echo "WARNING: PHP is not installed; skipping php -l checks."
fi

echo "Validation passed."
