# Symfony docker template
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
