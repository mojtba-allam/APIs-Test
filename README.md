# About This Project

This is a RESTful API built with Laravel 11 that provides endpoints for managing users and tickets. The API follows versioning best practices and includes authentication via Laravel Sanctum.

## Key Features

- **RESTful API Design**: Clean, standardized endpoints following REST principles
- **API Versioning**: Version 1 API with structured endpoints
- **Authentication**: Laravel Sanctum for secure API authentication
- **Authorization**: Role-based access control with manager and user permissions
- **Data Filtering**: Query filtering capabilities for tickets and users
- **Resource Management**: Complete CRUD operations for tickets and users
- **API Documentation**: Auto-generated documentation using Scribe

## API Endpoints

### Authentication

- `POST /api/login` - User login
- `POST /api/logout` - User logout

### Tickets

- `GET /api/v1/tickets` - Get all tickets (with filtering support)
- `POST /api/v1/tickets` - Create a new ticket
- `GET /api/v1/tickets/{ticket}` - Get a specific ticket
- `PUT /api/v1/tickets/{ticket}` - Replace a ticket
- `PATCH /api/v1/tickets/{ticket}` - Update a ticket
- `DELETE /api/v1/tickets/{ticket}` - Delete a ticket

### Users

- `GET /api/v1/users` - Get all users (with filtering support)
- `POST /api/v1/users` - Create a new user
- `GET /api/v1/users/{user}` - Get a specific user
- `PUT /api/v1/users/{user}` - Replace a user
- `PATCH /api/v1/users/{user}` - Update a user
- `DELETE /api/v1/users/{user}` - Delete a user

### Authors

- `GET /api/v1/authors` - Get all authors (users who have tickets)
- `GET /api/v1/authors/{author}` - Get a specific author
- `GET /api/v1/authors/{author}/tickets` - Get all tickets for an author
- `POST /api/v1/authors/{author}/tickets` - Create a ticket for an author
- `GET /api/v1/authors/{author}/tickets/{ticket}` - Get a specific ticket for an author
- `PUT /api/v1/authors/{author}/tickets/{ticket}` - Replace a ticket for an author
- `PATCH /api/v1/authors/{author}/tickets/{ticket}` - Update a ticket for an author
- `DELETE /api/v1/authors/{author}/tickets/{ticket}` - Delete a ticket for an author

## Installation

1. Clone the repository
2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install JavaScript dependencies:

   ```bash
   npm install
   ```

4. Copy and configure the environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate application key:

   ```bash
   php artisan key:generate
   ```

6. Create and configure your database in the `.env` file
7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

## Development

To start the development environment with all services:

```bash
composer run dev
```

This command starts the Laravel server, queue listener, log viewer, and Vite development server concurrently.

## Testing

Run tests using Pest:

```bash
./vendor/bin/pest
```

## Technologies Used

- **Laravel 11**: PHP web application framework
- **Laravel Sanctum**: Authentication system for APIs
- **Pest**: Testing framework
- **Scribe**: API documentation generator
- **Vite**: Frontend asset bundling

## Contributing

Thank you for considering contributing to this Laravel API project!

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
