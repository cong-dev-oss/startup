# Tạo database thủ công (nếu không dùng Docker)
$root = $PSScriptRoot

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

Write-Host "=== Tạo Database ===" -ForegroundColor Cyan
Write-Host "Database: $DB_NAME" -ForegroundColor Gray
Write-Host "User: $DB_USER" -ForegroundColor Gray
Write-Host ""

$mysqlCmd = Get-Command mysql -ErrorAction SilentlyContinue
if (-not $mysqlCmd) {
    Write-Host "Lỗi: Không tìm thấy MySQL client (mysql.exe)" -ForegroundColor Red
    Write-Host "Cài MySQL hoặc thêm MySQL bin vào PATH" -ForegroundColor Yellow
    exit 1
}

$sql = @"
CREATE DATABASE IF NOT EXISTS \`$DB_NAME\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON \`$DB_NAME\`.* TO '$DB_USER'@'%';
FLUSH PRIVILEGES;
"@

Write-Host "Đang tạo database và user..." -ForegroundColor Yellow
try {
    $sql | & mysql -h $DB_HOST -u root -p"$DB_PASSWORD" 2>&1 | Out-Null
    if ($LASTEXITCODE -eq 0) {
        Write-Host "[OK] Database '$DB_NAME' và user '$DB_USER' đã được tạo" -ForegroundColor Green
    } else {
        Write-Host "Lỗi: Không thể tạo database. Kiểm tra MySQL đang chạy và mật khẩu root đúng" -ForegroundColor Red
        exit 1
    }
} catch {
    Write-Host "Lỗi: $_" -ForegroundColor Red
    Write-Host "Gợi ý: Chạy MySQL với quyền root hoặc dùng Docker: docker compose up -d" -ForegroundColor Yellow
    exit 1
}

Write-Host ""
Write-Host "Hoàn tất. Có thể chạy: .\setup.ps1" -ForegroundColor Green
