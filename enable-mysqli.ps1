# Bật mysqli extension
$ini = (php --ini | Select-String "Loaded Configuration File").ToString().Split(":")[1].Trim()

if (-not (Test-Path $ini)) {
    Write-Host "Không tìm thấy php.ini" -ForegroundColor Red
    exit 1
}

$content = Get-Content $ini -Raw
$content = $content -replace ';extension=mysqli', 'extension=mysqli'
Set-Content $ini $content -Encoding UTF8

Write-Host "[OK] Đã bật mysqli" -ForegroundColor Green
Write-Host "Khởi động lại server" -ForegroundColor Yellow
