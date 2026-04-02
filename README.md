# SubManager 📊

SubManager is a high-performance, modern subscription management application designed to help users track, manage, and optimize their recurring expenses. Featuring a sleek, glassmorphic dark-mode interface and real-time financial forecasting, it’s built for users who want total control over their digital spending.

---

## ✨ Features

- **Intelligence Dashboard:** Instant access to your Monthly Spend, Active Subscriptions, and your next upcoming Bill.
- **Spending Forecast:** A dynamic 6-month visual chart powered by Chart.js to help you plan your future finances.
- **Smart Management:** Full CRUD (Create, Read, Update, Delete) for subscriptions with a built-in "Type-to-Confirm" safety feature for deletions.
- **Advanced Filtering:** Lightning-fast search by service name and date-range filtering.
- **Data Vault:** Your data stays yours. Export your entire database to a portable JSON file and restore it anytime without needing a server.
- **Security First:** Manage your profile details and update your password through a secure settings portal.

---

## 🚀 Tech Stack

- **Backend:** [Laravel](https://laravel.com)
- **Frontend:** [Livewire 4](https://livewire.laravel.com) & [Alpine.js](https://alpinejs.dev)
- **Styling:** [Tailwind CSS](https://tailwindcss.com) (Modern Dark Mode UI)
- **Database:** SQLite (Default) / MySQL
- **Visualization:** [ApexCharts](https://apexcharts.com/)

---

## 📦 Installation

To set up **SubManager** on your local machine, follow these steps:

### 1. Clone the Repository
git clone [https://github.com/salman089/SubscriptionManager.git](https://github.com/salman089/SubscriptionManager.git)
cd SubscriptionManager

### 2. Install PHP dependencies:
composer install

### 3. Install Frontend dependencies:
npm install && npm run build

### 4. Setup Environment:
cp .env.example .env
php artisan key:generate

### 5. Run Migrations:
php artisan migrate

### 6. Start the Server:
npm run dev

## 🔐 The Data Vault
SubManager is built with a Privacy-First philosophy. We do not store your financial data on external servers.

- **Exporting:** Creates a secure .json snapshot of your current data.
- **Importing:** Allows you to restore your library instantly, making it easy to migrate devices or keep manual backups on Google Drive or iCloud.
