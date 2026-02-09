# CorePress - Chạy server
$root = $PSScriptRoot
$wpDir = "$root\wordpress"

if (-not (Test-Path $wpDir)) {
    Write-Host "Chưa có wordpress. Chạy: .\setup.ps1" -ForegroundColor Red
    exit 1
}

Write-Host "CorePress Server" -ForegroundColor Cyan
Write-Host "http://localhost:8080" -ForegroundColor Green
Write-Host "Dừng: Ctrl+C" -ForegroundColor Yellow
Write-Host ""

Set-Location $wpDir
php -S localhost:8080
