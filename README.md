# 🚀 Complete E-commerce Website in Laravel 10

A full-featured **eCommerce solution** built on **Laravel 10**, featuring a modern UI, powerful admin panel, seamless payment integration, and a user-friendly shopping experience.

---

## 🎥 Live Demo & Tutorials

### 🔹 Setup & Demo Videos
- **[Setup Tutorial](https://www.youtube.com/watch?v=URX5D1A5XQ4&t=19s)** - Complete installation guide
- **[Live Demo](https://youtu.be/RxyrQQ3oTIE?si=Iq25IuJ8_eB5OJpC)** - See the application in action
- **[Complete Tutorial Series](https://www.youtube.com/watch?v=FdAMucaks64&list=PLIFG3IUe1Zxo8Zvju3_kJJvoKSaIP_SC_&index=1&t=44s)** - Step-by-step development guide

---

## 🌟 Key Features

### 🔹 Frontend Features
- ⚡ **Progressive Web App (PWA) Support** - Offline functionality and app-like experience
- 🎨 **Modern & Responsive Design** - Works seamlessly on all devices
- 🛒 **Shopping Cart & Wishlist** - Complete e-commerce functionality
- 📦 **Order Tracking** - Real-time order status updates
- 🔍 **SEO-Friendly URLs** - Optimized for search engines
- 💳 **PayPal Integration** - Secure payment processing
- 🌐 **Social Login** - Google, Facebook, and GitHub authentication
- 💬 **Multi-level Comments & Reviews** - Community engagement features

### 🔹 Admin Dashboard
- 👥 **Role-Based Access Control** - Granular permission management
- 📊 **Advanced Analytics & Reporting** - Business insights and metrics
- 🛍️ **Product & Order Management** - Complete inventory control
- 🔔 **Real-time Notifications** - Instant alerts and messaging
- 🏷️ **Coupon & Discount System** - Promotional campaign management
- 📰 **Blog & Category Management** - Content management system
- 🖼️ **Media & Banner Manager** - Visual content control

### 🔹 User Dashboard
- 📋 **Order History & Tracking** - Complete order management
- ⭐ **Review & Comment System** - User feedback and ratings
- 🔧 **Profile Customization** - Personal account settings

---

## 🛠️ Installation Guide

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0+ or PostgreSQL 13+
- Node.js 16+ or higher
- Composer
- NPM or Yarn

### Step 1: Clone the Repository
```bash
git clone https://github.com/Prajwal100/Complete-Ecommerce-in-laravel-10.git
cd Complete-Ecommerce-in-laravel-10
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Update `.env` file with your database credentials and other configuration settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=your_username
DB_PASSWORD=your_password

# AI Service Configuration
AI_SERVICE_PROVIDER=openai
AI_API_KEY=your_api_key_here
AI_MODEL=gpt-4
```

### Step 4: Database Configuration
```bash
# Run migrations with seeding
php artisan migrate --seed

# Import database dump (if needed)
# mysql -u your_username -p your_database < database/e-shop.sql
```

### Step 5: Setup Storage
```bash
# Create symbolic link for storage
php artisan storage:link
```

### Step 6: Build Frontend Assets
```bash
# For development
npm run dev

# For production
npm run prod
```

### Step 7: Run the Application
```bash
# Start development server
php artisan serve
```

🔗 **Application URL:** [http://localhost:8000](http://localhost:8000)

### Admin Login Credentials
- **Email:** `admin@gmail.com`
- **Password:** `1111`

---

## 🏗️ Project Structure

```
Complete-Ecommerce-in-laravel-10/
├── app/                    # Application core code
│   ├── Http/              # Controllers, middleware, and requests
│   ├── Models/            # Eloquent models
│   ├── Providers/         # Service providers
│   └── Services/          # Business logic services
├── config/                # Configuration files
├── database/              # Database migrations and seeds
├── public/                # Public assets
├── resources/              # Views, language files, and front-end assets
│   ├── views/             # Blade templates
│   │   ├── backend/       # Admin panel views
│   │   ├── frontend/      # Customer-facing views
│   │   └── user/          # User dashboard views
│   └── js/                # JavaScript files
├── routes/                # Route definitions
├── tests/                 # Test files
└── storage/               # Storage links and logs
```

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines
- Follow the [Code Style Guidelines](AGENTS.md#code-style-guidelines)
- Write tests for new features
- Update documentation as needed
- Ensure all tests pass before submitting

---

## 🧪 Testing

Run the test suite:

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --unit
php artisan test --feature

# Run tests with coverage
php artisan test --coverage
```

---

## 📦 Dependencies

### Core Dependencies
- **Laravel 10** - PHP web framework
- **MySQL/PostgreSQL** - Database systems
- **Vue.js** - JavaScript framework
- **Bootstrap 4** - CSS framework
- **jQuery** - JavaScript library

### Key Packages
- **Laravel Sanctum** - API authentication
- **Laravel Socialite** - Social authentication
- **PayPal** - Payment processing
- **Laravel DomPDF** - PDF generation
- **UniSharp Filemanager** - File management
- **Spatie Laravel Newsletter** - Newsletter management
- **Pusher** - Real-time notifications

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 🙏 Support

If you find this project helpful, please consider:

- ⭐ Starring the repository
- 🐛 Reporting bugs
- 💡 Suggesting features
- 🤔 Contributing code

### Contact Information
- **Email:** Prajwal.iar@gmail.com
- **WhatsApp:** +977-9818441226
- **[Upwork Profile](https://www.upwork.com/freelancers/~01210bb2575a8c05a9)**

### ☕ Support My Work
If you find this project helpful, consider [buying me a coffee](https://buymeacoffee.com/prajwalrai/support-my-work-complete-laravel-e-commerce-project). Your support helps maintain and improve this project! 🚀

---

## 📸 Screenshots

### Admin Panel
![Admin Panel](https://user-images.githubusercontent.com/29488275/90719413-13b82200-e2d4-11ea-8ca0-f0e5551c4c9d.png)

### Product Management
![Product Management](https://user-images.githubusercontent.com/29488275/90719534-61348f00-e2d4-11ea-8a81-409daee0ad94.png)

### User Dashboard
![User Dashboard](https://user-images.githubusercontent.com/29488275/90719563-7a3d4000-e2d4-11ea-9e6a-56caac13b146.png)

---

## 🔄 Changelog

See [CHANGELOG.md](CHANGELOG.md) for details about changes in each version.

---

## 📞 Need Help?

- Check the [documentation](AGENTS.md)
- Watch the [tutorial videos](#-live-demo--tutorials)
- Open an [issue](https://github.com/Prajwal100/Complete-Ecommerce-in-laravel-10/issues)
- Join our community discussions

---

**Made with ❤️ by Hiathemcodes**
