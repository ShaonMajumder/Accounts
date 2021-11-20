[ -d "accounts" ] && echo "Directory accounts exists." || echo "Error: Directory accounts does not exists."
cd accounts
php artisan migrate:fresh --seed