# ScholarTrack - Scholarship Management System

ScholarTrack is a comprehensive Laravel-based scholarship management application that streamlines the entire scholarship application and management process. The system connects scholarship providers, applicants, and administrators in a secure, efficient workflow.

## 🚀 Quick Start

### Prerequisites

- PHP 8.4+
- Composer
- Node.js & npm
- MySQL/PostgreSQL database

### Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd scholar-track
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database Setup**

    ```bash
    # Configure your database in .env file
    php artisan migrate
    php artisan db:seed
    ```

6. **Build Assets**

    ```bash
    npm run build
    ```

7. **Start the Development Server**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` to access the application.

## 👥 Demo User Accounts

The system comes pre-seeded with demo accounts for testing different user roles:

### Administrator Accounts

- **Admin**: `admin@scholartrack.local` / `password`
- **Staff**: `staff@scholartrack.local` / `password`
- **Municipality**: `municipality@scholartrack.local` / `password`
- **PESO Officer**: `peso@scholartrack.local` / `password`

### Applicant Accounts

- **John Doe**: `applicant@scholartrack.local` / `password`
- **Jane Smith**: `jane.smith@example.com` / `password`
- **Maria Garcia**: `maria.garcia@example.com` / `password`
- **Carlos Rodriguez**: `carlos.rodriguez@example.com` / `password`
- **Sarah Johnson**: `sarah.johnson@example.com` / `password`

## 🎯 Key Features

- **Multi-Role User Management**: Support for applicants, administrators, reviewers, and specialized roles
- **Complete Application Workflow**: From application submission to final approval
- **Advanced Filtering & Search**: Powerful admin tools for managing applications
- **Real-time Status Tracking**: Applicants can monitor their application progress
- **Comprehensive Reporting**: Analytics and insights for administrators
- **Secure Role-Based Access**: Granular permissions for different user types

## 📋 Application Process

### For Students (Applicants)

1. Register and create a profile
2. Browse available scholarships
3. Apply with cover letter and essay
4. Track application status
5. Receive approval/rejection notifications

### For Administrators

1. Review submitted applications
2. Assign applications to reviewers
3. Update application status
4. Add scores and remarks
5. Generate reports

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 📚 Documentation

- [DEMO.md](DEMO.md) - Complete demo guide with flowcharts
- [Laravel Documentation](https://laravel.com/docs) - Framework documentation

## 🛠️ Tech Stack

- **Backend**: Laravel 12, PHP 8.4
- **Frontend**: Blade templates, Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum
- **Authorization**: Spatie Laravel Permission

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**ScholarTrack** - Empowering education through streamlined scholarship management.

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
