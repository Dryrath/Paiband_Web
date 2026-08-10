$ErrorActionPreference = "Stop"
$Root = Split-Path -Parent $PSScriptRoot
Set-Location $Root

Write-Host "PaiBand theme validation"
Write-Host "========================"

$Required = @(
    "style.css",
    "index.php",
    "functions.php",
    "header.php",
    "footer.php"
)

foreach ($File in $Required) {
    if (-not (Test-Path $File)) {
        throw "Missing required theme file: $File"
    }
}

if (-not (Select-String -Path "style.css" -Pattern "Theme Name:" -Quiet)) {
    throw "style.css does not contain Theme Name metadata"
}

$Php = Get-Command php -ErrorAction SilentlyContinue
if ($null -ne $Php) {
    Write-Host "Running PHP syntax checks..."
    Get-ChildItem -File -Filter "*.php" | ForEach-Object {
        & php -l $_.FullName
        if ($LASTEXITCODE -ne 0) {
            throw "PHP syntax validation failed: $($_.Name)"
        }
    }
}
else {
    Write-Warning "PHP is not installed or not in PATH; skipping php -l checks."
}

Write-Host "Validation passed."
