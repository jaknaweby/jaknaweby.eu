# jaknaweby.eu

## Project setup

Install
- [xampp](https://www.apachefriends.org/download.html)
- [npm](https://nodejs.org/en/download)
- [php](https://www.php.net/manual/en/install.php)

### Debian based linux distributions

#### XAMPP setup

- Downlodad latest version of xampp from [sourceforge.net](https://sourceforge.net/projects/xampp/files/).
- Run `sudo path_to_xammp_installation_file` in terminal.
- Run `MySQL database` and `Apache Web Server` in xampp. (if there are issues running Apache, try changing the port number from 80 to a different one)
- Go to `localhost:[port_number]/phpmyadmin` and create a database called `jaknaweby`.

Run `sudo nano /opt/lampp/etc/httpd.conf` and change the folowing config (approximately line 230)
```conf
DocumentRoot "/opt/lampp/htdocs"
<Directory "/opt/lampp/htdocs">
```
to
```conf
DocumentRoot "[path_to_your_project]/jaknaweby.eu/public"
<Directory "[path_to_your_project]/jaknaweby.eu/public">
```

Run the following bash script in terminal in your project's root directory.
```bash
sudo apt install npm -y
npm install
sudo apt install php -y
sudo apt install composer -y
sudo apt-get install php-dom
composer install --ignore-platform-reqs
sudo apt install php-mysql -y
php artisan migrate
npm install -D tailwindcss
```

#### Tailwind

If you want to edit CSS using tailwind, run the code below in the project's root directory

```shell
npx tailwindcss -i ./resources/css/app.css -o ./public/css/style.css --watch
```

## Framework analysis

### Anotation

jaknaweby.eu is a tutorial web educating about web development. It contains individual articles about various compoínents of HTML, CSS, JavaScript, PHP and SQL. All the users with admin permissions can edit these articles within the application interface. Editing works on a WYSIWYG (what you see is what you get) basis - articles have various options of pre-created components, where you just insert content that then shows up in the article.

### Functions

- WYSISWG (What You See Is What You Get)
- TryIt editor
- Login system
- Articles editing

### Stack

- PHP > laravel for backend
- MySQL database for storing data
- XAMPP for running on localhost

### Milestones

- [x] Add function for managing articles > *week*
- [ ] Implement WYSIWYG > *month*
- [ ] Add administration of users in interface > *week*
- [ ] Add TryIt editor > *2 weeks*
- [ ] Add dark mode > *week*