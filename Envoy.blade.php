@servers(['alderaan' => ['maze@mazenet.ath.cx']])

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
