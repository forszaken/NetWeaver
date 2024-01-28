init: docker-down-clear docker-pull docker-build-pull docker-up
down: docker-down-clear
check: lint analyze test
docker-up:
	docker-compose up -d

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build-pull:
	docker-compose build --pull

composer-install:
	docker-compose run --rm php-cli composer install

test:
	docker-compose run --rm php-cli composer test

lint:
	docker-compose run --rm php-cli composer php-cs-fixer fix -- --dry-run --diff

analyze:
	docker-compose run --rm php-cli composer psalm -- --no-diff
cs-fix:
	docker-compose run --rm php-cli composer php-cs-fixer fix
