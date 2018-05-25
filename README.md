# basic-slim-authentication-app
A simple authentication system that uses Slim micro-framework and Laravel's Eloquent ORM.

A practice for using Slim micro-framework in a website application. This application uses Twig for HTML rendering and Eloquent ORM for database related procedures.

## Installation
1. Clone the repository
2. Run `composer install` to install required dependencies.
3. Change database configuration from line 10 of `bootstrap/app.php`.
4. Create `users` table on your selected database with the following columns:
    1. id
    2. username
    3. password
    4. created_at
    5. updated_at
    
## Basic Authentication
The application follows the simple authentication pattern for signing up and logging in a user in an application. Feel free to modify the application to create more.
