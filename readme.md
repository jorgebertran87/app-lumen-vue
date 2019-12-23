# Docline test

### **Description**

This will create a dockerized stack for a Vue application with Lumen API, consisted of the following containers:
-  **app**, your PHP application container

        Nginx, PHP7.2 PHP7.2-fpm, Composer, NPM, Node.js v8.x
    
-  **mysql**, MySQL database container ([mysql](https://hub.docker.com/_/mysql/) official Docker image)

-  **client**, Vue application container ([vue](https://vuejs.org/) official page)

-  **behat**, Functional tests for api

#### **Directory Structure**
```
+-- client
|   +-- Dockerfile
|   +-- app <vue application>
+-- src <project root>
+-- resources
|   +-- default
|   +-- nginx.conf
|   +-- supervisord.conf
|   +-- www.conf
+-- .gitignore
+-- Dockerfile
+-- docker-compose.yml
+-- readme.md <this file>
```

### **Setup instructions**

**Prerequisites:** 

* Depending on your OS, the appropriate version of Docker Community Edition has to be installed on your machine.  ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))

**Installation steps:** 

1. Create a new directory in which your OS user has full read/write access and clone this repository inside.

2. Create two new textfiles named `db_root_password.txt` and `db_password.txt` and place your preferred database passwords inside:

    ```
    $ echo "myrootpass" > db_root_password.txt
    $ echo "myuserpass" > db_password.txt
    ```

3. Open a new terminal/CMD, navigate to this repository root (where `docker-compose.yml` exists) and execute the following command:

    ```
    $ docker-compose up -d
    ```

    This will download/build all the required images and start the stack containers. It usually takes a bit of time, so grab a cup of coffee.

4. After the whole stack is up, execute the following commands:

    
    ```
    # Migrate db info
    docker-compose run --rm --entrypoint "/scripts/dump_data.sh" app
    # Install node packages in client
    docker-compose run --rm --entrypoint "npm install" client
    # Install vendors in app
    docker-compose run --rm --entrypoint "composer install" app
    ```

5. Create your .env file from .env.example in src folder


- The following values should be replaced in your `.env` file if you're willing to keep them as defaults:
    
    ```
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=appdb
    DB_USERNAME=user
    DB_PASSWORD=myuserpass
    ``` 
    
6. That's it! Navigate to [http://localhost:8080](http://localhost:8080) to access the application.

**Tests**

- Unit
```
docker-compose run --rm --entrypoint "/var/www/html/vendor/bin/phpunit tests" app
```

- Functional
```
docker-compose run behat
```    