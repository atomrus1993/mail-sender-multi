start:
	docker-compose -f $(path_local) up -d
stop:
	docker-compose -f $(path_local) stop
init-local:
	docker-compose -f $(path_local) up -d
	docker-compose -f $(path_local) exec php composer install
	docker-compose -f $(path_local) exec php yii migrate/up --interactive=0 # todo need bug fix

rebuild-php-local:
	docker-compose -f $(path_local) build php

path_local := Docker/local/docker-compose.yml
