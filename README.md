# Code Judge System | سیستم داوری کد

This Laravel package provides a Code Judge system for evaluating programming solutions. Participants can submit their code, and the system will automatically test it against predefined test cases, returning a score and a log of the results. It supports Laravel 11 and is designed to be easily integrated into existing projects.

این پکیج لاراول سیستم داوری کد را برای ارزیابی راه‌حل‌های برنامه‌نویسی فراهم می‌کند. شرکت‌کنندگان می‌توانند کد خود را ارسال کنند و سیستم آن را با استفاده از نمونه‌های از پیش تعریف‌شده آزمایش کرده و در نهایت نمره و گزارش نتایج را برمی‌گرداند. این پکیج برای لاراول 11 طراحی شده و به راحتی قابل ادغام در پروژه‌های موجود است.

## 📋 Requirements | پیش‌نیازها

You need the following to run the package: (برای اجرای پکیج نیاز به موارد زیر دارید)

- PHP 8.1 or higher
- Laravel 11.x
- Composer for dependency management
- A Linux or Mac OS environment for code execution (Windows may require additional configuration)

## 🚀 Installation and Setup | نصب و راه‌اندازی

Follow these steps to set up the package: (برای راه‌اندازی پکیج مراحل زیر را دنبال کنید)

1. Install the package via Composer: (نصب پکیج از طریق Composer)

```bash
composer require your-vendor/code-judge
```

2. Publish the package assets: (انتشار منابع پکیج)

```bash
php artisan vendor:publish --provider="YourVendor\CodeJudge\CodeJudgeServiceProvider"
```
3. Run the migrations to create the necessary database tables: (اجرای میگریشن‌ها برای ایجاد جداول دیتابیس مورد نیاز)

```bash
php artisan migrate
```


## 🧑‍💻 Author | نویسنده

Mohammad Sajad Poorajam (محمد سجاد پورعجم)
