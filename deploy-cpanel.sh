#!/bin/bash

# Script untuk deployment Laravel di cPanel
# Jalankan script ini di folder ~/bimbel_app

echo "========================================="
echo "Laravel cPanel Deployment Script"
echo "========================================="
echo ""

# Warna untuk output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Function untuk print dengan warna
print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    print_error "Error: File 'artisan' tidak ditemukan!"
    print_error "Pastikan Anda menjalankan script ini di folder bimbel_app"
    exit 1
fi

print_success "Directory check passed"

# Step 1: Set Permissions
echo ""
echo "Step 1: Setting permissions..."
chmod -R 775 storage 2>/dev/null
chmod -R 775 bootstrap/cache 2>/dev/null
print_success "Permissions set for storage and bootstrap/cache"

# Step 2: Create livewire temp directory
echo ""
echo "Step 2: Creating Livewire temporary directory..."
mkdir -p storage/app/private/livewire-tmp
chmod -R 775 storage/app/private/livewire-tmp
print_success "Livewire temp directory created"

# Step 3: Create storage link
echo ""
echo "Step 3: Creating storage symbolic link..."
if php artisan storage:link 2>/dev/null; then
    print_success "Storage link created"
else
    print_warning "Storage link might already exist or failed to create"
fi

# Step 4: Clear all caches
echo ""
echo "Step 4: Clearing all caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
print_success "All caches cleared"

# Step 5: Optimize for production
echo ""
echo "Step 5: Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
print_success "Application optimized"

# Step 6: Optimize Filament
echo ""
echo "Step 6: Optimizing Filament..."
if php artisan filament:optimize 2>/dev/null; then
    print_success "Filament optimized"
else
    print_warning "Filament optimization skipped (command might not exist)"
fi

# Step 7: Check database connection
echo ""
echo "Step 7: Checking database connection..."
if php artisan migrate:status >/dev/null 2>&1; then
    print_success "Database connection OK"
    
    # Ask if user wants to run migrations
    echo ""
    read -p "Do you want to run migrations? (y/n): " -n 1 -r
    echo ""
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        php artisan migrate --force
        print_success "Migrations completed"
    else
        print_warning "Migrations skipped"
    fi
else
    print_error "Database connection failed!"
    print_warning "Please check your .env database configuration"
fi

# Step 8: Check .env configuration
echo ""
echo "Step 8: Checking .env configuration..."

if [ -f ".env" ]; then
    print_success ".env file exists"
    
    # Check important variables
    if grep -q "APP_ENV=production" .env; then
        print_success "APP_ENV is set to production"
    else
        print_warning "APP_ENV is not set to production"
    fi
    
    if grep -q "APP_DEBUG=false" .env; then
        print_success "APP_DEBUG is set to false"
    else
        print_warning "APP_DEBUG should be false in production"
    fi
    
    APP_URL=$(grep "^APP_URL=" .env | cut -d '=' -f2)
    if [ ! -z "$APP_URL" ]; then
        print_success "APP_URL is set to: $APP_URL"
    else
        print_warning "APP_URL is not set"
    fi
else
    print_error ".env file not found!"
    print_warning "Please create .env file from .env.example"
fi

# Final summary
echo ""
echo "========================================="
echo "Deployment Summary"
echo "========================================="
echo ""
print_success "Deployment script completed!"
echo ""
echo "Next steps:"
echo "1. Verify .env configuration (APP_URL, database, etc.)"
echo "2. Test your website in browser"
echo "3. Try uploading files in Filament admin"
echo "4. Check Laravel logs if any errors occur: storage/logs/laravel.log"
echo ""
echo "If you encounter any issues, refer to CPANEL_DEPLOYMENT.md"
echo ""
