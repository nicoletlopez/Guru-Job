call sqlite3 guru.sqlite ".databases"
call cd ..
call php artisan migrate
pause 