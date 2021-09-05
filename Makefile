start:
	docker-compose -f $(path_local) up -d
stop:
	docker-compose -f $(path_local) stop
init-local:
	docker-compose -f $(path_local) up -d
	docker-compose -f $(path_local) exec php composer install 	# зависимости
	docker exec php php yii migrate/up --interactive=0			# миграции

rebuild-php-local:
	docker-compose -f $(path_local) build php

path_local := Docker/local/docker-compose.yml
