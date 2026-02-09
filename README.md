# Startup Theme - WordPress Theme

WordPress theme được chuyển đổi từ HTML template Startup.

---

## 🚀 Demo trên GitHub Pages

**Xem demo:** https://cong-dev-oss.github.io/startup/

Demo được tự động deploy từ thư mục `docs/` lên GitHub Pages.

---

## 📦 Cài đặt & Chạy WordPress

**Yêu cầu:** PHP 7.4+, Docker (cho MySQL).

### Bước 1: Database (tự động)

Chạy Docker để tự động tạo MySQL và database: 
```powershell
docker compose up -d
```

MySQL 8 sẽ tự động tạo database `corepress`, user `corepress` / password `root` (theo `.env` hoặc mặc định). Không cần tạo database thủ công.

### Bước 2: Cấu hình

Lần đầu tiên, copy file cấu hình:
```powershell
copy .env.example .env
```
Sửa `.env` nếu cần thay đổi database name, user, password, host.

### Bước 3: Cài WordPress

Chạy script cài đặt:
```powershell
.\setup.ps1
```
Script sẽ: tải WordPress, giải nén vào `wordpress/`, copy theme + plugin vào `wp-content/`, tạo `wp-config.php`.

### Bước 4: Chạy server

```powershell
.\start-server.ps1
```

### Bước 5: Cài WordPress

Mở trình duyệt: **http://localhost:8080** → làm theo wizard WordPress (chọn ngôn ngữ, site title, user admin, mật khẩu).

### Bước 6: Kích hoạt Theme & Plugin

Sau khi vào Admin:
- **Giao diện → Giao diện**: bật **Startup Theme**
- **Cài đặt → Plugin**: bật **MyCore Plugin**

---

## 🌐 GitHub Pages Setup

### Cách hoạt động:

1. **Tự động deploy:** Khi push code lên GitHub, GitHub Actions sẽ tự động build và deploy lên GitHub Pages
2. **Static HTML:** File trong thư mục `docs/` sẽ được deploy
3. **URL:** https://cong-dev-oss.github.io/startup/

### Cấu hình GitHub Pages:

1. Vào **Settings** → **Pages** trong repository
2. Chọn **Source:** `GitHub Actions` (đã được cấu hình sẵn)
3. Workflow sẽ tự động chạy khi push code

### Cập nhật demo:

Chỉ cần chỉnh sửa file trong thư mục `docs/` và push lên GitHub:

```powershell
git add docs/
git commit -m "Update demo"
git push origin master
```

---

## 📁 Cấu trúc

- `themes/startup-theme/` – WordPress theme (templates, assets, functions)
- `themes/mycore-theme/` – Starter theme
- `plugins/mycore-plugin/` – Core plugin
- `docs/` – Static HTML demo cho GitHub Pages
- `.github/workflows/` – GitHub Actions workflow để deploy

---

## 🔧 Xử lý lỗi

**Lỗi 500 khi mở http://localhost:8080:**
- Nếu gặp lỗi "missing MySQL extension", chạy `.\enable-mysqli.ps1` để bật mysqli extension trong PHP
- Sau đó khởi động lại server: `.\start-server.ps1`

---

## 📝 License

GNU General Public License v2 or later
