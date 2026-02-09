# CorePress - Cài đặt WordPress
$ErrorActionPreference = "Stop"
$root = $PSScriptRoot
$wpDir = "$root\wordpress"
$zip = "$root\wordpress-latest.zip"

# Cấu hình database (mặc định hoặc từ .env)
$DB_NAME = "corepress"
$DB_USER = "corepress"
$DB_PASSWORD = "root"
$DB_HOST = "localhost"

if (Test-Path "$root\.env") {
    Get-Content "$root\.env" | ForEach-Object {
        if ($_ -match '^DB_NAME=(.+)$') { $DB_NAME = $matches[1].Trim() }
        if ($_ -match '^DB_USER=(.+)$') { $DB_USER = $matches[1].Trim() }
        if ($_ -match '^DB_PASSWORD=(.+)$') { $DB_PASSWORD = $matches[1].Trim() }
        if ($_ -match '^DB_HOST=(.+)$') { $DB_HOST = $matches[1].Trim() }
    }
}

Write-Host "=== CorePress Setup ===" -ForegroundColor Cyan

# Tải WordPress
if (-not (Test-Path $zip)) {
    Write-Host "Tải WordPress..." -ForegroundColor Yellow
    Invoke-WebRequest -Uri "https://wordpress.org/latest.zip" -OutFile $zip -UseBasicParsing
}
Write-Host "[OK] WordPress" -ForegroundColor Green

# Giải nén
if (Test-Path $wpDir) { Remove-Item $wpDir -Recurse -Force }
Expand-Archive -Path $zip -DestinationPath $root -Force
Write-Host "[OK] Giải nén" -ForegroundColor Green

# Copy theme & plugin
Copy-Item "$root\themes\mycore-theme" "$wpDir\wp-content\themes\" -Recurse -Force
Copy-Item "$root\themes\startup-theme" "$wpDir\wp-content\themes\" -Recurse -Force -ErrorAction SilentlyContinue
Copy-Item "$root\plugins\mycore-plugin" "$wpDir\wp-content\plugins\" -Recurse -Force
Write-Host "[OK] Theme & Plugin" -ForegroundColor Green

# Lấy salts
try {
    $salts = (Invoke-WebRequest -Uri "https://api.wordpress.org/secret-key/1.1/salt/" -UseBasicParsing).Content.Trim()
}
catch {
    $salts = "define('AUTH_KEY',''); define('SECURE_AUTH_KEY',''); define('LOGGED_IN_KEY',''); define('NONCE_KEY',''); define('AUTH_SALT',''); define('SECURE_AUTH_SALT',''); define('LOGGED_IN_SALT',''); define('NONCE_SALT','');"
}

# Tạo wp-config.php
$config = @"
<?php
define('DB_NAME', '$DB_NAME');
define('DB_USER', '$DB_USER');
define('DB_PASSWORD', '$DB_PASSWORD');
define('DB_HOST', '$DB_HOST');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
`$table_prefix = 'wp_';
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
$salts
define('WP_POST_REVISIONS', 5);
if (!defined('ABSPATH')) { define('ABSPATH', __DIR__ . '/'); }
require_once ABSPATH . 'wp-settings.php';
"@
Set-Content "$wpDir\wp-config.php" $config -Encoding UTF8
Write-Host "[OK] wp-config.php" -ForegroundColor Green
Write-Host ""
Write-Host "Xong! Chạy: .\start-server.ps1" -ForegroundColor Cyan
