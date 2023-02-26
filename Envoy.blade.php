@servers(['alderaan' => ['maze@192.168.1.2']])

@task('deploy', ['on' => 'alderaan'])
    cd /var/www/html/invoices
    git stash
    php artisan down
    git pull
    composer install --no-dev
    npm install
    npm run build
    php artisan optimize
    php artisan up
@endtask
