# Ymmersion Project

Ymmersion Project is a Symfony web application developed to allow users to create groups (teams) and perform tasks within a given time to earn points and keep their group going.

## Prerequisites

Before starting, make sure you have the following installed on your machine:

- PHP 7.4 or higher
- Composer
- A database (MySQL, PostgreSQL, SQLite, etc.)
- We also used XAMP, which might be useful for you.

## Installation

1. Clone the project repository:

    ```sh
    git clone <https://github.com/EdgarCou/Symfony.git>
    cd Projet_Ymmersion
    ```

2. Install the dependencies with Composer:

    ```sh
    composer install
    ```

    Additionally, we will need other dependencies:

    ```sh
    composer require symfony/web-profiler-bundle
    ```

3. Configure your database in the `.env` file:

    ```env
    DATABASE_URL="mysql://root:@127.0.0.1:3306/projet_final"
    ```

4. Create the database and run the migrations:

    ```sh
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    ```

5. Start the Symfony built-in web server:

    ```sh
    symfony server:start
    ```

6. Access the application in your browser at `http://127.0.0.1:8000`.

## Usage

Once the project is running, you will be able to create an account. 
Create a group or join one if an invitation has been sent to you. 
Create personal habits if you are just a member of a group. However, if you are the group creator, you can create personal or team habits.