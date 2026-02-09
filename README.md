# CorePress

Starter theme + plugin core cho WordPress.

---

## Cài đặt & Chạy

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
- **Giao diện → Giao diện**: bật **MyCore Theme**
- **Cài đặt → Plugin**: bật **MyCore Plugin**

---

## Kiểm tra Database

```powershell
docker exec corepress-mysql mysql -u corepress -proot -e "SHOW DATABASES;"
```

---

## Xử lý lỗi

**Lỗi 500 khi mở http://localhost:8080:**
- Nếu gặp lỗi "missing MySQL extension", chạy `.\enable-mysqli.ps1` để bật mysqli extension trong PHP
- Sau đó khởi động lại server: `.\start-server.ps1`

---

## Cấu trúc

- `themes/mycore-theme/` – Starter theme (templates, assets, menu, widget)
- `plugins/mycore-plugin/` – CPT (product, portfolio, event), taxonomies, custom fields, SEO meta, security, performance, REST API, user roles

Sau khi chạy `setup.ps1`, WordPress nằm trong `wordpress/`; theme và plugin đã được copy vào `wordpress/wp-content/`.
