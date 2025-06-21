# WooCommerce-Sync Laravel Project

This is a Laravel-based application designed to sync data with a WooCommerce store via the WooCommerce REST API.

---

## 🚀 Features

* WooCommerce API Integration
* Product synchronization
* Seeded test user
* Laravel 10+ setup
* REST API-ready

---

## 📁 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
.env.example ✅
README.md
```

---

## ⚙️ Requirements

* PHP >= 8.1
* Composer
* Laravel 10+
* MySQL or SQLite
* WooCommerce store with API keys

---

## 💠 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/thetechweb-mahesh/Laravel-woocommerce.git
cd Laravel-woocommerce
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

Create a `.env` file from the provided `.env.example`:

```bash
cp .env.example .env
```

Update the WooCommerce API credentials in `.env`:

```env
WOOCOMMERCE_STORE_URL=https://your-store-url.com
WOOCOMMERCE_CONSUMER_KEY=ck_xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
WOOCOMMERCE_CONSUMER_SECRET=cs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations and Seed Test Data

```bash
php artisan migrate --seed
```

### 6. Serve the Application

```bash
php artisan serve
```

---

## 👤 Seeded Test User

Use the following login credentials:

* **Email:** `test@example.com`
* **Password:** `password`

> *(You can modify this in `DatabaseSeeder.php` or `UserSeeder` if needed)*

---

## 🌐 WooCommerce API Setup

1. Go to your WooCommerce admin dashboard.
2. Navigate to **WooCommerce > Settings > Advanced > REST API**.
3. Click **Add Key**, and generate Consumer Key & Secret.
4. Copy them into your `.env` file as shown above.

---

## 🧪 Optional: Postman Collection

You can test the API endpoints using Postman. (You can include a link to the collection here if you have one.)

---

## 🌍 Optional: Public Testing via ngrok

If you want to test webhooks or expose your local Laravel server:

```bash
ngrok http 8000
```

Then access Laravel via the provided public URL.

---

## 📃 About `.env` and `.env.example`

* ✅ `.env.example` is included for guidance.
* ❌ `.env` is ignored in `.gitignore` for security.
* 👉 Copy `.env.example` to `.env` and update credentials.

---

## 📃 License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).
