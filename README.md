1- Clone repository to local
2- Go to folder and execute "composer install"
3- Edit file ".env" and modify the line "DATABASE_URL" with your database data (you can use the same database that I used if you want, I used only for the test)
4- Execute migrations "php bin/console doctrine:migrations:migrate"
5- Execute server "php bin/console server:run" and go to the listening server direction
