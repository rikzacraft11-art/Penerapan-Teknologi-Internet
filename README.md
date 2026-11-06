# MoneyGement

A self-hosted personal finance management app with receipt scanning and AI-assisted budgeting insights.

## Features

- **Transaction Management**: Record income and expenses with custom categories, date filters, and search.
- **Budgeting**: Set monthly spending limits per category with progress tracking and over-budget notifications.
- **Receipt Scanner**: Upload receipt images to automatically extract merchant, date, and totals via Gemini Vision.
- **AI Financial Insights**: Chat with an AI advisor for spending breakdowns, cashflow forecasting, and financial health scoring.
- **Reports & Export**: Export transaction histories to PDF, Excel, and CSV.
- **Admin Panel**: Manage users, toggle roles, and view activity logs.
- **Localization**: Supports English and Indonesian.

## Tech Stack

- **Backend**: Laravel 10 (PHP 8.1+)
- **Frontend**: Blade, Tailwind CSS, Vite
- **Database**: MySQL / MariaDB
- **AI Services**: Google Gemini API, Groq Cloud API
- **Export**: Laravel DomPDF, Maatwebsite Excel

## Getting Started

### Prerequisites

- PHP >= 8.1 (extensions: `pdo_mysql`, `mbstring`, `openssl`, `gd`, `fileinfo`)
- Composer >= 2.x
- Node.js >= 18.x & NPM
- MySQL >= 8.0 / MariaDB

### Installation

```bash
# 1. Clone repository
git clone https://github.com/rikzacraft11-art/Penerapan-Teknologi-Internet.git
cd Penerapan-Teknologi-Internet

# 2. Install dependencies
composer install
npm install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Configure .env with your database credentials and API keys
# DB_DATABASE=moneygement
# DB_USERNAME=root
# DB_PASSWORD=
# GEMINI_API_KEY=your_gemini_api_key

# 5. Run database migrations & seeders
php artisan migrate --seed

# 6. Create storage symlink (for receipt uploads and avatars)
php artisan storage:link

# 7. Build frontend assets and run
npm run dev
php artisan serve
```

Access the app at `http://127.0.0.1:8000`.

## Testing

Run the automated use-case test suite:

```bash
php scripts/testing/test_all_uc.php
```

Results are output to `scripts/testing/test_results.json`.

## Project Structure

```text
├── app/                  # Application core (Controllers, Models, Services)
├── config/               # App configuration
├── database/             # Migrations & seeders
├── docs/
│   ├── diagrams/         # UML class diagrams & HTML viewer
│   ├── interactive/      # Interactive technical spec UI
│   └── reports/          # Audit reports & project documentation
├── resources/views/      # Blade templates & Tailwind views
├── routes/               # Web & auth route definitions
├── scripts/              # Use-case test runner & doc converters
└── tests/                # Feature & unit tests
```

## License

This project is licensed under the [MIT License](LICENSE).
