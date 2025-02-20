## Simple CRUD API as a test for Gigatron
This is simple CRUD API for users. There is a middleware forcing request bodies to be application/json and there is also a JWT authentication middleware, which is used only to limit a test route (home).
It was made using Docker.

## Install dependencies and run application

- Install Docker;
- Set the .env;
- Run the following commands to install dependencies:
    ```
    docker build -t image-name . --no-cache
    docker run --rm -v $(pwd):/var/www/html image-name composer install
    ```
- If necessary, grant permissions to your user:
    ```
    sudo chown -R $(whoami):$(whoami) .
    ```
- Run the following command to build (built only once) and run the application:
    ```
    docker compose up -d
    ```
- Migrate the database tables:
    ```
    docker compose exec slim sh
    php database/migrate.php

    ```
- To rollback migrations:
    ```
    docker compose exec slim sh
    php database/migrate.php rollback
    ```