build:
	docker compose build
up:
	docker compose up --detach
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
laravel:
	docker compose exec app bash
db:
	docker compose exec db bash
