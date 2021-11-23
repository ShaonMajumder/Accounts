# Cache Clear Script

# NB :
# php artisan clear-compiled
# php artisan optimize:clear
# this two commands mess with your composer install , so you have to run composer install after that.
# And any other commands after composer install needs sudo


sudo php artisan cache:forget spatie.permission.cache 
sudo php artisan cache:clear
sudo php artisan cache:clear
sudo php artisan config:clear
sudo php artisan config:cache
sudo php artisan view:clear
sudo php artisan route:clear
sudo php artisan route:cache
sudo php artisan clear-compiled
sudo php artisan optimize:clear
composer install