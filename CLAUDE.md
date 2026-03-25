# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

ScholarTrack is a Laravel 12 scholarship management application that allows organizations to manage scholarship programs, applicants to apply and track their applications, and scholars to view their disbursements and awards.

## Development Commands

```bash
# Start development server (runs PHP server, queue worker, and Vite concurrently)
composer run dev

# Run all tests
php artisan test --compact

# Run a specific test file
php artisan test --compact tests/Feature/ScholarshipTest.php

# Run tests matching a filter
php artisan test --compact --filter=testName

# Format code (always run before committing)
vendor/bin/pint --dirty --format agent

# Build frontend assets
npm run build

# Initial setup
composer run setup
```

## Architecture

### User Roles (Spatie Permission)

Six roles with hierarchical permissions defined in `database/seeders/RolesAndPermissionsSeeder.php`:

- **applicant**: Can create accounts, apply for scholarships, upload documents
- **scholar**: Approved applicants who can track status, view disbursements, download award notices
- **staff**: Manage scholarship programs, validate documents, assign applications
- **reviewer**: Score applicants, approve/deny applications
- **finance**: Handle disbursements, reconcile budgets
- **admin**: Full system access including user/role management

### Core Models

- `User` - Uses `HasRoles` trait, can have `ApplicantProfile` or `ScholarProfile`
- `Scholarship` - Scholarship programs with amount, criteria, deadline, etc.
- `ApplicantProfile` - User application data (GPA, documents, employment status)
- `ScholarProfile` - Awarded scholar data linked to scholarships

### Route Organization

Routes split by purpose (all required in `routes/web.php`):

- `routes/auth.php` - Authentication (Breeze)
- `routes/public.php` - Public pages (welcome, about, scholarships listing)
- `routes/admin.php` - Admin/profile management, scholarship CRUD

### View Structure

- `resources/views/public/` - Guest-facing pages
- `resources/views/admin/` - Admin dashboard and management
- `resources/views/profile/` - User profile forms
- `resources/views/layouts/` - `app.blade.php` (auth), `guest.blade.php` (public)

## Key Conventions

### UI/Design System

- Use 2-tone color system: white/light sections (`bg-white`, `bg-slate-50`) and dark sections (`bg-slate-900`)
- Accents: `blue-900`/`blue-800` on light backgrounds, `white`/`text-blue-400` on dark
- No gradients, no multiple accent colors - stick to white, slate, and blue only

### Code Style

- Use PHP 8 constructor property promotion
- Always use explicit return type declarations
- Always use curly braces for control structures
- Use Form Request classes for validation (not inline)
- Prefer `Model::query()` over `DB::` facade
- Use named routes with `route()` function

### Testing

- Every change must have tests - use Pest (`php artisan make:test --pest`)
- Use model factories with states when available
- Tests use `RefreshDatabase` trait automatically via `tests/Pest.php`

### Database

⚠️ **CRITICAL: NEVER RUN DESTRUCTIVE COMMANDS** ⚠️

- **DO NOT** use `migrate:fresh`, `migrate:reset`, `db:wipe`, or any destructive database operations
- These commands **DELETE ALL DATA** in the database permanently
- Use only `php artisan migrate` for incremental changes (this is safe and reversible)
- If data is accidentally deleted, it cannot be recovered
- When creating models, also create factories and seeders

### Artisan Commands

- Always pass `--no-interaction` to Artisan commands
- Use `list-artisan-commands` MCP tool to verify available options
- Use `php artisan make:*` commands to create new files

## MCP Tools (Laravel Boost)

This project uses Laravel Boost MCP which provides:

- `search-docs` - Search version-specific Laravel ecosystem documentation (use before implementing)
- `tinker` - Execute PHP code in application context
- `database-query` - Run read-only SQL queries
- `database-schema` - Inspect table structure
- `browser-logs` - Read frontend console output
- `get-absolute-url` - Generate correct project URLs
