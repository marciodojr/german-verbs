up:
	docker-compose up
php:
	docker exec -it dv-api bash
db:
	mysql -u root -p deutsch --port 13306 -h 127.0.0.1
install:
	composer install
fresh:
	php artisan migrate:fresh
down:
	docker-compose down