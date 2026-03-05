<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-%5E8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/License-MIT-22c55e?style=for-the-badge" alt="License">
  <img src="https://img.shields.io/badge/Pattern-User–Policy-3b82f6?style=for-the-badge" alt="Pattern">
</p>

<h1 align="center">Laravel API Boilerplate</h1>
<p align="center">A clean, scalable starting point for building secure RESTful APIs with the <strong>User–Policy authorization pattern</strong>.</p>

---

## ✨ Features

| Feature | Description |
|---|---|
| 🔐 **User–Policy Auth** | Fine-grained authorization using Laravel Policies |
| 📦 **Structured Architecture** | Controllers, Services, Requests, Resources, Policies |
| ✅ **Form Request Validation** | Dedicated request classes for clean validation |
| 🔄 **API Resources** | Standardized, consistent response transformation |
| 🚀 **Auth-Ready Setup** | Authentication scaffolding included out of the box |
| ⚙️ **Environment Config** | Clean `.env`-based configuration |
| 📱 **Frontend-Agnostic** | Works seamlessly with any frontend or mobile client |

---

## 🏗️ Architecture Overview

```
app/
├── Http/
│   ├── Controllers/     # Handle HTTP requests, delegate to services
│   ├── Requests/        # Validate incoming API data
│   └── Resources/       # Transform models into API responses
│
├── Models/              # Eloquent models
│
├── Policies/            # User–Policy authorization rules
│
├── Services/            # Business logic layer
│
└── Providers/           # Service providers and bindings
```

### Key Components

- **Controllers** — Thin, focused on request/response. Business logic lives in services.
- **Requests** — Dedicated Form Request classes handle all validation rules.
- **Services** — Encapsulate business logic, keeping controllers clean.
- **Policies** — Centralized authorization logic via the User–Policy pattern.
- **Resources** — Consistent, versioned API response transformation.

---

## 🔐 Authorization: User–Policy Pattern

Authorization is handled using **Laravel Policies**, providing clear, maintainable, and testable permission rules.

**Defining a policy:**
```php
// app/Policies/PostPolicy.php

public function update(User $user, Post $post): bool
{
    return $user->id === $post->user_id;
}
```

**Using it in a controller:**
```php
// app/Http/Controllers/PostController.php

public function update(UpdatePostRequest $request, Post $post)
{
    $this->authorize('update', $post);

    return new PostResource($this->postService->update($post, $request->validated()));
}
```

**Benefits of this pattern:**
- ✔ Clean, readable controller logic
- ✔ Centralized and reusable permission rules
- ✔ Easy to extend for roles and permissions
- ✔ Fully testable in isolation

---

## 📬 Standardized API Response Format

All endpoints return a consistent JSON structure:

**Success:**
```json
{
  "success": true,
  "message": "Request successful",
  "data": { }
}
```

**Error:**
```json
{
  "success": false,
  "message": "Unauthorized",
  "errors": { }
}
```

---

## 🚀 Getting Started

### 1. Clone the repository
```bash
git clone https://github.com/josecabalquinto/api-boiler-template.git
cd laravel-api-boilerplate
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure your database
Update `.env` with your database credentials, then run:
```bash
php artisan migrate
```

### 5. Start the development server
```bash
php artisan serve
```

Your API will be available at `http://localhost:8000`.

---

## 💡 Use Cases

This boilerplate is ideal for:

- 🏢 **SaaS platforms** — Multi-tenant APIs with role-based access
- 📱 **Mobile app backends** — Clean, versioned API endpoints
- 🧩 **Microservices** — Lightweight, focused service APIs
- 🖥️ **Admin dashboards** — Secure, policy-driven data access
- 🌐 **API-first applications** — Headless backends for any frontend

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).
