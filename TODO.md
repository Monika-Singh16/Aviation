# TODO: Create Careers CRUD Setup

## Steps to Complete

- [x] Create migration: database/migrations/2025_11_14_110354_create_careers_table.php with specified fields (job_description text, key_responsibilities json, etc.)
- [x] Create model: app/Models/Career.php with fillable, casts for json fields, table name 'careers'
- [x] Create controller: app/Http/Controllers/CareerController.php with CRUD methods (index, create, store, edit, update, show, destroy)
- [x] Create blade views:
  - [x] resources/views/admin/pages/careers/index.blade.php (table with actions)
  - [x] resources/views/admin/pages/careers/create.blade.php (form with inputs and dynamic json fields)
  - [x] resources/views/admin/pages/careers/edit.blade.php (similar to create)
  - [x] resources/views/admin/pages/careers/show.blade.php (display details)
- [x] Update routes: Add Route::resource('careers', CareerController::class); in routes/web.php
- [x] Run php artisan migrate to create the table
- [x] Test the admin pages for CRUD functionality
- [x] Add job_title field: Create migration database/migrations/2025_11_14_111344_add_job_title_to_careers_table.php, update model, controller validation, and all blade views (create, edit, index, show)
