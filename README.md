# CARA MENJALANKAN PROJECT

## PERSYARATAN
- PHP (versi 8.2.x atau lebih baru)
- Composer (versi 2.5.7 atau lebih baru) : untuk mengelola dependensi PHP
- Node.js (versi 20.x atau lebih baru) & NPM (versi 10.x atau lebih baru) : untuk mengelola dependensi front-end
- Database (MySQL 5.7.33 atau lebih baru)

# TECH STACK
- Laravel 10
- Frontend CSS: TailwindCSS & Flowbite
- Database: MySQL
- Plugin/Library: JQuery, Select2, Filepond, DataTable

## LANGKAH MENJALANKAN APLIKASI
### 1. Masuk ke folder directory project laravel
### 2. Install Dependensi Laravel
```
composer install
```
### 3. Install Dependensi Frontend
```
npm install
```
### 4. Salin File .env dan Sesuaikan (khususnya pada Database)
```
DB_DATABASE=employee_db
DB_USERNAME=root
DB_PASSWORD=
```
### 5. Jalankan Generate Application Key
```
php artisan key:generate
```
### 6. Jalankan migrasi Database
```
php artisan migrate
```
### 7. Jalankan seeder Database
```
php artisan db:seed
```
### 8. Compile Assets Frontend
```
npm run dev
```
atau jika mode produksi
```
npm run build
```
### 9.  Menjalankan Server Lokal
```
php artisan serve
```

## MENJALANKAN API
### Show All Employee

- **URL:**
  - `/api/employee`
- **Method:**
  - `GET`
- **Description:**
  - Show all employee Data.
- **Response:**
  ```JSON
    {
        "data": [
        {
            "id": 1,
            "name": "Marwata Teguh Sitorus S.Sos",
            "email": "karimah.anggraini@example.com",
            "phone": "+6282894223479",
            "address": "Ki. Reksoninten No. 668, Sungai Penuh 80249, Papua",
            "hire_date": "12-06-0181",
            "position": {
                "id": 3,
                "name": "Marketing Specialist",
                "desc": null,
                "department": {
                "id": 3,
                "name": "Marketing",
                "desc": null
                }
            },
            "status": "active",
            "salary": "7.880.000",
            "photo": "http://127.0.0.1:8000/images/profile/user_profile.jpeg"
        },
        {
            "id": 2,
            "name": "Okta Tampubolon",
            "email": "pradipta.zelaya@example.com",
            "phone": "+6286190587923",
            "address": "Psr. Cokroaminoto No. 74, Pariaman 82781, Jatim",
            "hire_date": "14-12-1981",
            "position": {
                "id": 2,
                "name": "Software Engineer",
                "desc": null,
                "department": {
                    "id": 2,
                    "name": "IT",
                    "desc": null
                }
            },
            "status": "inactive",
            "salary": "7.600.000",
            "photo": "http://127.0.0.1:8000/images/profile/user_profile.jpeg"
        },
        ]
    }
  ```
