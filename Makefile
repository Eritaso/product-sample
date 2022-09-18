initial:
	git submodule init
	git submodule update
	cp .env.example .env
	cp .env.laradock laradock/.env
	cd laradock && docker-compose up -d --build nginx mysql
	cd laradock && docker-compose exec workspace composer install
	cd laradock && docker-compose exec workspace npm install
	cd laradock && docker-compose exec workspace php artisan key:generate
	cd laradock && docker-compose exec workspace php artisan migrate
	cd laradock && docker-compose exec workspace php artisan db:seed --class=ProductionDatabaseSeeder
	cd laradock && docker-compose exec mysql mysql -u root -proot -e'drop database if exists `test_product-sample`;' && docker-compose exec mysql mysql -u root -proot -e'create database `test_product-sample`;' && docker-compose exec mysql mysql -u root -proot -e'GRANT ALL PRIVILEGES ON *.* TO "default";' && docker-compose exec workspace php artisan --env=testing migrate --seed
up:
	cd laradock && docker-compose up -d nginx mysql
	@make migrate
	@make dump-autoload
down:
	cd laradock && docker-compose down
migrate:
	cd laradock && docker-compose exec workspace php artisan migrate
dump-autoload:
	cd laradock && docker-compose exec workspace composer dump-autoload
test-fresh:
	cd laradock && docker-compose exec workspace php artisan migrate:fresh --env=testing --seed
test:
	cd laradock && docker-compose exec workspace php artisan test
test-unit:
	cd laradock && docker-compose exec workspace php artisan test --testsuite=Unit
test-feature:
	cd laradock && docker-compose exec workspace php artisan test --testsuite=Feature
test-integration:
	cd laradock && docker-compose exec workspace php artisan test --configuration /var/www/phpunit_integration.xml
command:
	cd laradock && docker-compose exec workspace ${COMMAND}
