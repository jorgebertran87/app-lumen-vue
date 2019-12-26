# App with Lumen + Vue

### **Description**

This will create a dockerized stack for a Vue application with Lumen API, consisted of the following containers:
-  **app**, your PHP application container

        Nginx, PHP7.2 PHP7.2-fpm, Composer, NPM, Node.js v8.x
    
-  **mysql**, MySQL database container ([mysql](https://hub.docker.com/_/mysql/) official Docker image)

-  **client**, Vue application container ([vue](https://vuejs.org/) official page)

-  **behat**, Functional tests for api

-  **cypress**, e2e tests for client

#### **Directory Structure**
```
+-- client
|   +-- Dockerfile
|   +-- app <vue application>
+-- src <project root>
|   +-- tests
|   |	+-- unit <phpunit>
|   |	+-- functional <behat>
|   |	+-- e2e <cypress>
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

2. Prepare the stack with this command (It will take about 8 minutes):

    
    ```
    ./scripts/prepare_stack
    ```

3. Copy your .env file from .env.example in src folder

    ```
    cp src/.env.example src/.env
    ```
    
4. That's it! Navigate to [http://localhost:8080](http://localhost:8080) to access the application.

**Tests**

- Unit
```
docker-compose run --rm --entrypoint "/var/www/html/vendor/bin/phpunit tests" app
```

- Functional
```
./scripts/run_container behat
```    

- e2e
```
./scripts/run_container cypress
```    
