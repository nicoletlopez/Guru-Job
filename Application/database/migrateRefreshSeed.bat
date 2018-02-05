cd ..
call composer dump-autoload
call php artisan migrate:refresh --seed