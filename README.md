<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# URLShortly Backend - Laravel API

URLShortly is a URL shortener service built using Laravel for the backend, which handles URL storage, slug generation, and redirection.

## Requirements

- [PHP 8.2 or higher](https://www.php.net/downloads.php)
- [Laravel 11](https://www.laravel.com/)
- [Laragon](https://laragon.org/download/) (Optional, for local development)
- [Node.js](https://nodejs.org/en)
- [Composer](https://getcomposer.org/download/)
- [Postman](https://www.postman.com/downloads/) (for API testing)

## Features
- **Create short URLs:** Users can provide a long URL and an optional custom slug.
- **Redirect to the original URL:** Users are redirected to the original long URL when accessing the short link.
- **Error handling:** Provides appropriate error messages when the URL creation fails or the slug doesn't exist.

## Technologies Used
- **Laravel 11:** The PHP framework used for routing, validation, and API responses.
- **MySQL:** Database used to store URLs and slugs.

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/handikatriarlan/urlshortly-be.git
```

### 2. Navigate to the Project Directory
```bash
cd urlshortly-be
```

### 3. Install PHP Dependencies
Run the following command to install the required PHP dependencies using Composer:
```bash
composer install
```

### 4. Configure Environment Variables
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```

### 5. Generate Application Key
Generate the application key:
```bash
php artisan key:generate
```

### 6. Setup the Database
Run the migrations to set up the database tables:
```bash
php artisan migrate
```
If you encounter any database connection issues, edit your `.env` file to match your local database credentials.
#### Example Before:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Example After:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shortlink
DB_USERNAME=handikatriarlan
DB_PASSWORD=arlan123
```

### 7. Install Node.js Dependencies
You will also need to install the Node.js dependencies for asset compilation:
```bash
npm install
```

### 8. Serve the Application
Run the application using the built-in Laravel server:
```bash
php artisan serve
```
The application will be available at `http://127.0.0.1:8000`.

### 9. Compile JavaScript and CSS Assets
In a separate terminal, run the following command to compile your assets:
```bash
npm run dev
```

## API Testing
To test the API, you can use [Postman](https://www.postman.com) or any other API testing tool. Be sure to add the `Access-Token` header with the correct token value (`abc` in this case) for routes protected by the `VerifyAccessToken` middleware.

### Create a Short URL
POST `/api/short-link` <br>
Request body:
```json
{
  "url": "https://your-long-url.com",
  "slug": "your-slug"
}
```
Response:
```json
{
  "message": "Link created successfully"
}
```
### Redirect to Original URL
GET `/your-slug` <br>
Redirects to the original long URL associated with the provided slug.

## Error Handling
- 404 Not Found: When a non-existent slug is accessed.
- 500 Internal Server Error: For database or other server-side issues.