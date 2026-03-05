<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-API%20Boilerplate-red" alt="Laravel API Boilerplate">
<img src="https://img.shields.io/badge/PHP-%5E8.2-blue" alt="PHP Version">
<img src="https://img.shields.io/badge/License-MIT-green" alt="License">
</p>

# Laravel API Boilerplate (User–Policy Pattern)

This repository provides a **Laravel API Boilerplate Template** designed to accelerate backend development and enforce a clean and maintainable architecture.

The project follows **Laravel best practices for RESTful API development**, including structured controllers, request validation, resource responses, and policy-based authorization.

It implements the **User–Policy authorization pattern**, allowing fine-grained access control using Laravel Policies while keeping controllers clean and business logic organized.

This boilerplate serves as a **solid starting point for building secure, scalable APIs** for web or mobile applications.

---

# Features

- RESTful API architecture
- Standardized API response format
- **User–Policy authorization pattern**
- Authentication-ready setup
- Request validation using Form Requests
- API Resources for response transformation
- Clean and scalable folder structure
- Environment-based configuration
- Easy integration with frontend frameworks or mobile apps

---

# Architecture Overview

The project follows a structured approach to keep the codebase scalable and maintainable.
app/
├── Http/
│ ├── Controllers/
│ ├── Requests/
│ └── Resources/
│
├── Models/
│
├── Policies/
│
├── Services/
│
└── Providers/

### Key Components

**Controllers**
- Handle incoming HTTP requests
- Delegate business logic to services

**Requests**
- Validate incoming API data

**Services**
- Contain business logic
- Keep controllers thin and clean

**Policies**
- Implement **User–Policy pattern** for authorization

**Resources**
- Transform models into standardized API responses

---

# Authorization (User–Policy Pattern)

Authorization is handled using **Laravel Policies**, allowing clear and maintainable permission rules.

Example:

```php
public function update(User $user, Post $post)
{
    return $user->id === $post->user_id;
}
Controller usage:

$this->authorize('update', $post);

This approach ensures:

Clean controller logic

Centralized permission rules

Easy role and permission management

Getting Started
1. Clone the repository
git clone https://github.com/your-repo/laravel-api-boilerplate.git
2. Install dependencies
composer install
3. Setup environment
cp .env.example .env
php artisan key:generate
4. Run migrations
php artisan migrate
5. Start development server
php artisan serve
Example API Response Format
{
  "success": true,
  "message": "Request successful",
  "data": {}
}
Use Cases

This boilerplate is ideal for:

SaaS platforms

Mobile app backends

Microservices

Admin dashboards

API-first applications

License

This project is open-sourced software licensed under the MIT license.
