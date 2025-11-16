# SPARK Platform

## Overview

SPARK (Sanjivani Platform for AI, Research & Knowledge) is a full-stack web platform built with PHP and MySQL, featuring a modern black-themed UI with 3D animations and glass-morphism effects. The platform integrates payment processing, email services, and QR code generation capabilities.

## Recent Changes (November 15, 2025)

### Database Schema Fixes
Fixed all references to non-existent `is_active` column in multiple student pages:
- **research.php**: Removed `is_active` and `is_featured` column references from `research_projects` table queries
- **opportunities.php**: Removed `is_active` column references from `opportunities` table queries
- **dashboard.php**: Removed `is_active` from events query
- **gallery.php**: Removed `is_active` column references from `gallery` table queries
- **team.php**: Removed `is_active` column references from `team_members` table queries
- **calendar.php**: Removed `is_active` column references from all event queries
- **events.php**: Removed `is_active` column references from events queries
- **attendance.php**: Removed `is_active` column references from event queries

### Fixed Syntax Errors
- Fixed undefined array key warnings in `research.php` (lines 36-37) by properly placing the null coalescing operator (`??`)
- Fixed undefined array key warnings in `opportunities.php` by using proper syntax for sanitize() function

### Replit Setup (Optional)
A minimal PHP workflow has been configured in this Replit environment for code preview purposes only. **This workflow is NOT required for XAMPP deployment.**
- PHP 8.2 with all required extensions installed
- Composer dependencies installed via `composer install`
- Basic PHP development server configured (for Replit preview only)

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture

**Technology Stack:**
- Vanilla JavaScript with custom 3D animations
- CSS3 with glass-morphism and neon effects
- AOS (Animate On Scroll) library for scroll-triggered animations
- Lazy loading implementation for performance optimization

**Design Pattern:**
- Black theme with neon accent colors (green: #00ff88, blue: #00aaff, pink: #ff00aa)
- Glass-morphism UI components with transparency and backdrop filters
- 3D card animations and particle effects
- Responsive navigation with smooth scrolling
- Loading overlay with fade transitions

**Key Features:**
- Custom particle system for background animations
- Form validation with real-time feedback
- Notification system for user alerts
- Back-to-top functionality
- Lazy loading for images and components

### Backend Architecture

**Core Technology:**
- PHP 8.0+ with object-oriented patterns
- PSR-4 autoloading with namespace `Spark\\`
- PDO (PHP Data Objects) for database abstraction
- Prepared statements for SQL injection prevention

**Database Layer:**
- MySQL 5.7+ / MariaDB 10.2+ compatibility
- InnoDB engine for transaction support
- UTF8MB4 character set for full Unicode support
- Strategic indexing for query optimization
- Foreign key constraints with CASCADE and SET NULL behaviors

**Database Design Decisions:**
- Used `INT UNSIGNED` for all positive ID columns to maximize range and prevent negative values
- Converted boolean fields to `TINYINT(1)` for MySQL compatibility
- Applied `DEFAULT NULL` instead of empty strings for optional fields
- Implemented composite indexes for multi-column search queries
- Set strict SQL mode for data integrity enforcement

**Connection Configuration:**
- Buffered queries enabled for performance
- Connection persistence for reduced overhead
- Timezone set to UTC (+00:00)
- Strict transaction tables mode enabled
- MySQL-specific PDO attributes for optimization

### External Dependencies

**Payment Processing:**
- Razorpay PHP SDK (^2.9) for payment gateway integration
- Handles online transactions and payment verification

**Email Service:**
- Mailjet API v3 PHP SDK (^1.5) for transactional emails
- Supports email campaigns and notifications

**QR Code Generation:**
- Endroid QR Code library (^4.5) for generating QR codes
- Used for tickets, authentication, or sharing features

**Development Tools:**
- PHPUnit (^9.0) for unit testing
- PHPMD (^2.10) for code quality analysis

**Required PHP Extensions:**
- `ext-curl` - HTTP requests and API calls
- `ext-json` - JSON encoding/decoding
- `ext-mbstring` - Multi-byte string handling
- `ext-gd` - Image processing
- `ext-pdo` - Database abstraction
- `ext-pdo_mysql` - MySQL database driver

**Database Service:**
- MySQL 5.7+ or MariaDB 10.2+ required
- JSON function support needed
- Full UTF8MB4 Unicode support required
- InnoDB storage engine mandatory for transactions

**Web Server:**
- Apache 2.4+ with mod_rewrite, mod_headers, mod_ssl enabled
- OR Nginx 1.8+ with equivalent modules
- SSL/TLS certificate required for production
- Minimum 256MB PHP memory limit (512MB+ recommended)

## Running on XAMPP (Primary Deployment Method)

This project is designed to run on XAMPP with the following setup:

1. **Copy Files**: Place all project files in `C:\xampp\htdocs\spark\`

2. **Database Setup**:
   - Start MySQL from XAMPP Control Panel
   - Import the database schema from `database/schema.sql`
   - Update database credentials in `includes/config.php`:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'spark_platform');
     define('DB_USER', 'root');
     define('DB_PASS', ''); // Your MySQL password
     ```

3. **Configure Site URL**:
   - Update `SITE_URL` in `includes/config.php`:
     ```php
     define('SITE_URL', 'http://localhost/spark');
     ```

4. **Install Dependencies** (if needed):
   - Open command prompt in project directory
   - Run: `composer install`

5. **Access the Application**:
   - Start Apache and MySQL from XAMPP Control Panel
   - Open browser: `http://localhost/spark/`
   - Student Portal: `http://localhost/spark/student/`
   - Admin Portal: `http://localhost/spark/admin/`

## Note About Replit Workflow

The PHP server workflow configured in this Replit environment is only for code preview/testing purposes within Replit. It does NOT affect your XAMPP deployment. You can safely ignore it when running on XAMPP.