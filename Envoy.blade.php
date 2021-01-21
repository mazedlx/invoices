@servers(['alderaan' => ['maze@192.168.0.100']])

@task('deploy', ['on' => 'alderaan'])
    cd /var/www/html/invoices
    git stash
    php artisan down
    git pull
    composer install
    npm install
    npm run prod
    php artisan optimize
    php artisan up
@endtask
