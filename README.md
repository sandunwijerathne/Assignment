# Assignment

## Install a WordPress project in localhost
WordPress Project is "** swivel ** "<br>
Install Git: If you don't have Git installed on your computer, download and install it from the Git website.

Install XAMPP: If you don't have a local web server installed, download and install XAMPP from the Apache Friends website.

Clone the Git repository: Open Git Bash or your preferred terminal and navigate to the directory where you want to install the project. Run the following command to clone the repository:

```bash
git clone https://github.com/sandunwijerathne/Assignment.git
```
Install WordPress: If you haven't already, download and extract the latest version of WordPress from the WordPress website. Move the WordPress files to the root directory of the cloned repository.


Configure the database: Open XAMPP and start Apache and MySQL. Navigate to http://localhost/phpmyadmin/ in your web browser and create a new database for your WordPress project.

Database backups are inside the SQLBACKUP Folder

Configure WordPress: Rename the wp-config-sample.php file to wp-config.php and edit the settings to match your local database.

Install the project dependencies: Navigate to the cloned repository directory in your terminal and run the following command to install the project dependencies:

```bash
npm install
```

Start the web server: Navigate to the root directory of the cloned repository in your terminal and start the web server by running the following command:

```bash
php -S localhost
```
Access your project: Open your web browser and navigate to http://localhost/swivel to access your WordPress project.

## Install a Github Laravel project in localhost
Laravel Project is "** Assignment ** "<br>
Install Git: If you don't have Git installed on your computer, download and install it from the Git website.

Install XAMPP: If you don't have a local web server installed, download and install XAMPP from the Apache Friends website.

Clone the Git repository: Open Git Bash or your preferred terminal and navigate to the directory where you want to install the project. Run the following command to clone the repository:

```bash
git clone https://github.com/sandunwijerathne/Assignment.git
```

Install Composer: If you don't have Composer installed on your computer, download and install it from the Composer website.

Install project dependencies: Navigate to the cloned repository directory in your terminal and run the following command to install the project dependencies:

```bash
composer install
```

Update the necessary database and application settings in the .env file. Put the above WordPress database name to .env

Migrate the database: Run the following command to migrate the database tables:
```bash
php artisan migrate
```
Start the web server: Navigate to the root directory of the cloned repository in your terminal and start the web server by running the following command:

```bash
php artisan serve
```
Access your project: Open your web browser and navigate to http://127.0.0.1:8000/ to access your Laravel project.
