# Code Judge System

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4.svg?style=flat&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20.svg?style=flat&logo=laravel" alt="Laravel Version">
  <img src="https://img.shields.io/badge/Composer-Required-885630.svg?style=flat&logo=composer" alt="Composer Required">
  <img src="https://img.shields.io/badge/Platform-Linux%20%7C%20macOS-lightgrey.svg?style=flat" alt="Platform">
  <img src="https://img.shields.io/badge/License-MIT-green.svg?style=flat" alt="License">
  <img src="https://img.shields.io/badge/Version-1.0.0-blue.svg?style=flat" alt="Version">
  <img src="https://img.shields.io/badge/Status-Stable-brightgreen.svg?style=flat" alt="Status">
</p>

This Laravel package provides a Code Judge system for evaluating programming solutions. Participants can submit their code, and the system will automatically test it against predefined test cases, returning a score and a log of the results. It supports Laravel 11 and is designed to be easily integrated into existing projects.

## ✨ Features

- **Automated Code Testing**: Evaluate code submissions against predefined test cases
- **Score Calculation**: Automatic scoring based on test results
- **Detailed Logging**: Comprehensive logs of test execution and results
- **Laravel 11 Support**: Built specifically for Laravel 11.x
- **Easy Integration**: Simple setup and integration into existing projects
- **Multi-Language Support**: Execute code in various programming languages

## 📋 Requirements

You need the following to run the package:

- PHP 8.1 or higher
- Laravel 11.x
- Composer for dependency management
- A Linux or Mac OS environment for code execution (Windows may require additional configuration)

## 🚀 Installation and Setup

Follow these steps to set up the package:

**1. Install the package via Composer:**
```bash
composer require sajad-dev/code-judge
```

**2. Publish the package assets:**
```bash
php artisan vendor:publish --provider="SajadDev\CodeJudge\CodeJudgeServiceProvider"
```

**3. Run the migrations to create the necessary database tables:**
```bash
php artisan migrate
```



**Mohammad Sajad Poorajam** 👨‍💻🚀

</p>
