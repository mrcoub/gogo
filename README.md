# Simple application

### Requirements

- PHP 7.1 or newer.
- HTTP Server, Apache.
- MySQL Server 5.x or newer.

### Using

- [Slim Framework 3](http://www.slimframework.com/)
- [Laravel Database](https://github.com/illuminate/database)
- [Slim PHP Renderer](https://github.com/slimphp/PHP-View)
- [Monolog](https://github.com/Seldaek/monolog)
- [Robmorgan Phinx Migrations](https://phinx.org/)
- [Vlucas Valitron Validator](https://github.com/vlucas/valitron)
- [Vlucas phpdotenv](https://github.com/vlucas/phpdotenv)

### Installation

1) Clone the git repository on your computer
    ```
    $ git clone https://github.com/mrcoub/gogo.git
    ```
    You can also download the entire repository as a zip file and unpack in on your computer if you do not have git
2) After cloning the application, you need to install it's dependencies.
    ```
    $ cd gogo
    $ composer install
    ```
3) Open .env in project root dan setting your environment
    ```
    $ cp .env.example .env
    ```
4) chmod folder logs
    ```
    $ sudo chmod -R 777 logs
    ```
5) Run phinx migration 
    ```
    $ php vendor/bin/phinx migrate
    ```
    or
    ```
    $ vendor\bin\phinx migrate
    ```
6) Browse to site

### Key Directory

* `app`: Application code
* `migrations`: Database migration and seeding
* `logs`: Log files
* `templates`: Template files
* `public`: Webserver root
* `vendor`: Composer dependencies

### Key files

* `.env`: Global configuration
* `app/settings.php`: App configuration
* `phinx.php`: Phinx configuration
* `public/index.php`: Entry point to application
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here