# Assignment

## Install a WordPress project in localhost
WordPress Project is "** swivel ** "<br>
Install Git: If you don't have Git installed on your computer, download and install it from the Git website.

Install XAMPP: If you don't have a local web server installed, download and install XAMPP from the Apache Friends website.

Clone the Git repository: Open Git Bash or your preferred terminal and navigate to the directory where you want to install the project. Run the following command to clone the repository:

```bash
git clone https://github.com/sandunwijerathne/Assignment.git
```
Install WordPress: Move the WordPress files to the root directory of the cloned repository.


Configure the database: Open XAMPP and start Apache and MySQL. Navigate to http://localhost/phpmyadmin/ in your web browser and restore the database for your WordPress project.

Database backups are inside the SQLBACKUP Folder

Configure WordPress: file wp-config.php and edit the settings to match your local database.

Start the web server

Access your project: Open your web browser and navigate to http://localhost/swivel to access your WordPress project.


Wordpress Admin Access Details
```bash
un - swivel
pw - Poiuy@123
```


## Install a Github Laravel project in localhost
Laravel Project is "** Assignment ** "<br>
Install Git: If you don't have Git installed on your computer, download and install it from the Git website.

Install XAMPP: If you don't have a local web server installed, download and install XAMPP from the Apache Friends website.

Clone the Git repository: Open Git Bash or your preferred terminal and navigate to the directory where you want to install the project. Run the following command to clone the repository:

```bash
git clone https://github.com/sandunwijerathne/Assignment.git
```

Install Composer: If you don't have Composer installed on your computer, download and install it from the <a href="https://getcomposer.org/">Composer</a> website.

Install project dependencies: Navigate to the cloned repository directory in your terminal and run the following command to install the project dependencies:

i used this pakage  https://github.com/mikemclin/laravel-wp-password this package provides an easy way to create and check against WordPress password hashes. WordPress is not required.

install the pakage 
`composer require mikemclin/laravel-wp-password`  

Begin by installing this package through Composer. Edit your project's composer.json file to require mikemclin/laravel-wp-password.
update like this
```bash
"require": {
 "mikemclicomposer updaten/laravel-wp-password": "~2.0.1"
} 
```
to 
```bash
"require": {
  "mikemclin/laravel-wp-password": "~2.0.1"
}
```
Next, update Composer from the Terminal:

```bash
composer install
```

Update the necessary database and application settings in the .env file. Put the above WordPress database name to .env 
`(in my project Larevel and wordpress using same database)`

Migrate the database: Run the following command to migrate the database tables:
```bash
php artisan migrate
```
Start the web server: Navigate to the root directory of the cloned repository in your terminal and start the web server by running the following command:

```bash
php artisan serve
```
Access your project: Open your web browser and navigate to http://127.0.0.1:8000/ to access your Laravel project.

Laravel Access Details
```bash
un - iwdsandun@gmail.com
pw - Poiuy@123
```
