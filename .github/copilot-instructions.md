# Scholar Track - AI Coding Guidelines

## Project Overview

This is a Laravel 12 application built with PHP 8.4.13, featuring modern development practices including Pest testing, Tailwind CSS v4 styling, and Laravel Boost tooling.

## Architecture & Structure

### Laravel 12 Framework

- **Configuration**: Uses `bootstrap/app.php` for routing, middleware, and service registration (Laravel 12 streamlined structure)
- **Models**: Standard Eloquent with factories and seeders
- **Views**: Blade templates with Tailwind CSS v4 integration
- **Assets**: Vite bundling with concurrent development servers

### Key Directories

- `app/` - Application code (Models, Controllers, Providers)
- `bootstrap/app.php` - Application configuration and routing
- `resources/views/` - Blade templates
- `resources/css/app.css` - Tailwind CSS with v4 `@theme` directive
- `tests/` - Pest test suite
- `database/factories/` - Model factories for testing

## Development Workflow

### Setup & Running

```bash
# Initial setup
composer run setup

# Development servers (concurrent)
composer run dev  # Runs: php artisan serve + queue:listen + npm run dev

# Individual commands
php artisan serve
php artisan queue:listen --tries=1
npm run dev
```

### Testing

- **Framework**: Pest 4 (not PHPUnit directly)
- **Commands**:
    - `php artisan test --compact` - Run all tests
    - `php artisan test --compact --filter=testName` - Run specific test
- **Test Structure**: Feature tests in `tests/Feature/`, Unit tests in `tests/Unit/`
- **Assertions**: Use specific Pest assertions (`assertSuccessful()`, `assertNotFound()`) over generic `assertStatus()`

### Code Quality

- **Linting**: `vendor/bin/pint --dirty --format agent` (Laravel Pint)
- **Standards**: Follow existing patterns in sibling files
- **Imports**: Use specific Pest functions: `use function Pest\Laravel\mock;`

## Frontend Development

### Tailwind CSS v4

- **Configuration**: CSS-first with `@theme` directive in `resources/css/app.css`
- **Import**: `@import 'tailwindcss';` (not `@tailwind` directives)
- **Build**: `npm run build` or `npm run dev`
- **Integration**: Inline styles in `welcome.blade.php` for critical CSS

### Asset Bundling

- **Tool**: Vite with Laravel plugin
- **Entry Points**: `resources/css/app.css`, `resources/js/app.js`
- **Watch Ignore**: `storage/framework/views/**`

## Laravel-Specific Patterns

### Models & Factories

- **Factories**: Always create factories for new models
- **Relationships**: Use Eloquent relationships over raw queries
- **Fillable**: Define `$fillable` arrays explicitly

### Controllers & Validation

- **Form Requests**: Use dedicated Form Request classes for validation
- **Responses**: Leverage Laravel's built-in response methods

### Authentication

- **System**: Laravel's built-in auth with Sanctum-ready structure
- **Routes**: Named routes for auth endpoints

## Tooling Integration

### Laravel Boost

- **Available Tools**: Database queries, schema inspection, Tinker execution, Artisan commands
- **Search**: Use `search-docs` for version-specific Laravel/Pest/Tailwind documentation
- **Debugging**: Browser logs, error inspection, and performance monitoring

### Development Commands

- **Artisan**: `php artisan make:model --factory` - Create model with factory
- **Testing**: `php artisan make:test --pest {name}` - Create Pest test
- **Code Style**: `vendor/bin/pint --dirty` - Check/fix code formatting

## Best Practices

### Code Organization

- Follow Laravel conventions: Models in `app/Models/`, Controllers in `app/Http/Controllers/`
- Use descriptive variable/method names (e.g., `isRegisteredForDiscounts`, not `discount()`)
- Prefer PHPDoc blocks over inline comments

### Type Declarations

- Always use explicit return types for methods
- Use PHP 8 constructor property promotion: `public function __construct(public User $user)`

### Testing Strategy

- Write feature tests for HTTP endpoints and user interactions
- Use factories for test data creation
- Prefer Pest's expressive syntax over PHPUnit assertions

### Frontend Patterns

- Extract repeated Tailwind classes into reusable components
- Follow existing responsive design patterns
- Use CSS custom properties in `@theme` for brand colors

## Common Pitfalls

### Build Issues

- **Vite Manifest Error**: Run `npm run build` if assets don't update
- **Queue Issues**: Use `--tries=1` for development queue workers

### Testing Gotchas

- Import Pest-specific functions explicitly
- Use `fake()` helper (not `$this->faker`)
- Run minimal test sets during development

### Laravel 12 Changes

- Middleware configured in `bootstrap/app.php`, not `app/Http/Kernel.php`
- Console commands auto-registered from `app/Console/Commands/`

## Reference Files

- `composer.json` - Dependencies and scripts
- `AGENTS.md` - Laravel Boost guidelines
- `tests/Pest.php` - Test configuration
- `resources/css/app.css` - Tailwind configuration
- `vite.config.js` - Asset bundling setup</content>
  <parameter name="filePath">.github/copilot-instructions.md
