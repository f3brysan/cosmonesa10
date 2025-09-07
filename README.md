# Cosmonesa - Beauty & Cosmetics Marketplace

<p align="center">
  <img src="public/frontend/logo.svg" alt="Cosmonesa Logo" width="200">
</p>

<p align="center">
  <strong>Marketplace inovatif untuk dunia kosmetik dan jasa kecantikan di lingkungan Universitas Negeri Surabaya (UNESA)</strong>
</p>

## 📋 Tentang Proyek

**Cosmonesa** adalah marketplace inovatif yang hadir di lingkungan Universitas Negeri Surabaya (UNESA), berfokus pada dunia kosmetik dan jasa kecantikan. Platform ini menjadi wadah yang mempertemukan berbagai brand, pelaku usaha, serta penyedia layanan kecantikan dengan mahasiswa, dosen, maupun masyarakat luas.

## ✨ Fitur Utama

### 🛍️ **E-Commerce**
- **Produk Kosmetik**: Katalog lengkap produk kosmetik dengan kategori
- **Manajemen Stok**: Sistem pengelolaan stok dan inventori
- **Keranjang Belanja**: Fitur cart untuk mengumpulkan produk
- **Checkout & Pembayaran**: Sistem pembayaran terintegrasi
- **Tracking Pengiriman**: Integrasi dengan RajaOngkir untuk ongkir dan tracking

### 💅 **Layanan Kecantikan**
- **Booking Layanan**: Sistem reservasi untuk layanan kecantikan
- **Manajemen Slot**: Pengaturan jadwal dan slot waktu
- **Kategori Layanan**: Berbagai jenis layanan kecantikan
- **Kiosk Management**: Pengelolaan outlet/kiosk penyedia layanan

### 🎉 **Event Management**
- **Event Kosmetik**: Manajemen event dan workshop
- **Pendaftaran Event**: Sistem registrasi peserta
- **Manajemen Kuota**: Pengaturan kapasitas event
- **Jenis Event**: Kategorisasi berbagai tipe event

### 👥 **User Management**
- **Multi-Role System**: Superadmin, Pengelola, Seller, Customer
- **Profile Management**: Pengelolaan profil pengguna
- **Permission System**: Sistem izin berbasis role (Spatie Permission)
- **Google OAuth**: Login dengan Google

### 📊 **Dashboard & Analytics**
- **Dashboard Admin**: Overview sistem untuk superadmin
- **Dashboard Seller**: Panel untuk penjual
- **Dashboard Pengelola**: Interface untuk pengelola kiosk
- **Laporan Transaksi**: Analytics dan reporting

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 10** - PHP Framework
- **MySQL** - Database
- **Laravel Sanctum** - API Authentication
- **Spatie Laravel Permission** - Role & Permission Management
- **Laravel Socialite** - OAuth Integration
- **Guzzle HTTP** - HTTP Client
- **DomPDF** - PDF Generation

### Frontend
- **Blade Templates** - Server-side rendering
- **Bootstrap** - CSS Framework
- **jQuery** - JavaScript Library
- **DataTables** - Table management
- **Vite** - Build tool

### External Services
- **RajaOngkir API** - Shipping cost calculation
- **Google OAuth** - Social authentication

## 📦 Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

### Langkah-langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/your-username/cosmonesa10.git
   cd cosmonesa10
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   ```bash
   # Edit .env file dengan konfigurasi database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cosmonesa
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **RajaOngkir API Key**
   ```bash
   # Tambahkan API key RajaOngkir di .env
   API_KEY_RAJAONGKIR=your_rajaongkir_api_key
   ```

6. **Google OAuth Configuration**
   ```bash
   # Tambahkan Google OAuth credentials di .env
   GOOGLE_CLIENT_ID=your_google_client_id
   GOOGLE_CLIENT_SECRET=your_google_client_secret
   GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
   ```

7. **Database Migration & Seeding**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

8. **Storage Link**
   ```bash
   php artisan storage:link
   ```

9. **Build Assets**
   ```bash
   npm run build
   # atau untuk development
   npm run dev
   ```

10. **Jalankan Server**
    ```bash
    php artisan serve
    ```

## 🚀 Penggunaan

### Akses Aplikasi
- **Frontend**: `http://localhost:8000`
- **Backend Admin**: `http://localhost:8000/admin`

### Default Login
- **Superadmin**: `admin@cosmonesa.com` / `password`
- **Pengelola**: `pengelola@cosmonesa.com` / `password`
- **Seller**: `seller@cosmonesa.com` / `password`

### Role & Permission
- **Superadmin**: Full access ke semua fitur
- **Pengelola**: Mengelola kiosk dan layanan
- **Seller**: Mengelola produk dan transaksi
- **Customer**: Membeli produk dan booking layanan

## 📁 Struktur Proyek

```
cosmonesa10/
├── app/
│   ├── Http/Controllers/
│   │   ├── Backend/          # Admin controllers
│   │   ├── Frontend/         # Customer controllers
│   │   └── API/              # API controllers
│   ├── Models/               # Eloquent models
│   ├── Services/             # Business logic services
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/
│   │   ├── back/             # Admin views
│   │   └── front/            # Customer views
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── public/
│   ├── frontend/             # Frontend assets
│   └── backend/              # Backend assets
└── routes/
    ├── web.php               # Web routes
    ├── back.php              # Admin routes
    └── api.php               # API routes
```

## 🔧 Konfigurasi

### RajaOngkir Integration
```php
// app/Services/RajaOngkirService.php
// Service untuk menghitung ongkir dan tracking
```

### Permission System
```php
// Menggunakan Spatie Laravel Permission
// Role: superadmin, pengelola, seller, customer
// Permission: manage-products, manage-services, manage-events, etc.
```

## 📱 API Endpoints

### Authentication
- `POST /api/login` - User login
- `POST /api/register` - User registration
- `GET /api/user` - Get user profile

### Products
- `GET /api/products` - Get all products
- `GET /api/products/{id}` - Get product detail
- `POST /api/products` - Create product (seller only)

### Services
- `GET /api/services` - Get all services
- `GET /api/services/{id}` - Get service detail
- `POST /api/services/booking` - Book service

### Events
- `GET /api/events` - Get all events
- `POST /api/events/register` - Register for event

## 🤝 Kontribusi

1. Fork repository ini
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

## 👥 Tim Pengembang

- **Backend Developer**: Febry San ([@f3brysan](https://github.com/f3brysan)), Rasyid ([@ranchid](https://github.com/ranchid))
- **Frontend Developer**: Ir. Teguh ([@synysmike](https://github.com/synysmike))

## 📞 Kontak

- **Email**: info@cosmonesa.com
- **Website**: https://cosmonesa.com
- **Instagram**: @cosmonesa_unesa

## 🙏 Ucapan Terima Kasih

- Laravel Framework
- Spatie Laravel Permission
- RajaOngkir API
- Bootstrap
- Dan semua kontributor yang telah membantu pengembangan proyek ini

---

<p align="center">
  Dibuat dengan ❤️ untuk komunitas UNESA
</p>