# Symfony docker template

## Description
Symfony docker template is a template to start a new symfony project with docker.

- Symfony `6.4`
- PHP `8.3`
- Maria DB `10.11`
- Nginx

## Setup process

- Verify settings in composer.json like the project name and description
- Move .env.example or .env.prod.example to .env and edit parameters to match your project
- Make sure permission are well-defined for 1000:1000 (`sudo chown 1000:1000 /path/ -R`)
- Start containers with `docker-compose up -d`
- Go into the php container with `docker-compose exec php bash`
- Install libs with `composer install`
- Setup nodejs with `yarn install`
- Run either `yarn dev` or `yarn prod`
- Generate application secret key in .env at field `APP_SECRET` with `bin/console key-generate`
- Enjoy :)

## Fast setup

```shell
git clone https://github.com/TheoMeunier/symfony-template.git
sudo chown 1000:1000 symfony-template/ -R
cd symfony-template
cp .env.exemple .env
dockker compose up -d
docker compose exec php composer install
docker compose exec php yarn install
docker compose exec php yarn dev
docker compose exec php bin/console key-generate
```
