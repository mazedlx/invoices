@servers(['main' => ['maze@main.mazedlx.net']])

@task('deploy', ['on' => 'main'])
    cd /var/www/html/invoices.mazedlx.net
    git stash
    php artisan down
    git pull
    composer install --no-dev
    npm install
    npm run build
    {{-- php artisan optimize --}}
    php artisan up
@endtask
