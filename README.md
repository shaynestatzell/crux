# CRUX - Getting Started #

### Requirements ###
* uses gulp.js for sass compilation, image optimization, and js concatenation/uglifying Gulp.js
* Node is required to get Gulp up and running.

#### Removing Crux Repo Association, and adding new project association (This step will be removed in the near future!) ####

`rm -rf .git`

`git init`

`git remote add origin https://REPO`

#### Global Dependencies (One time install if you don't have installed already) ####

If you don't have [Node JS](http://nodejs.org/) installed already, let's do that now using [Homebrew](http://brew.sh/):

Install Homebrew

`ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"`

Install Node

`brew install node`

#### Project Specific Dependencies ( Required for every new project ) ####

You'll also need [NPM](https://www.npmjs.org/) installed.

`sudo npm install`

Gulp needs to be installed globally.

`sudo npm install -g gulp`

Install Compass

`sudo gem install compass`

Install Semantic UI (SASS)

`sudo gem install semantic-ui-sass`

Download [composer](https://getcomposer.org/download/) via cURL

`curl -sS https://getcomposer.org/installer | php`

Install all dependencies to your project

`php composer.phar install`

### Configuration ###

* Replace database credentials in:  `/App/config/database.php`
* Start your server if you haven't already:  `php artisan serve`
* [Populate the database with Crux's default Migrations & Seeds](http://localhost:8000/start)

### Common Commands ###

Start your server with

`php artisan serve`

To poll for changes on your front end run

`gulp`

To poll for changes on your back end run

`gulp admin-watch`

To optimize and copy images into your public directory run

`gulp images`

To migrate tables

`php artisan migrate`

To seed migrated tables

`php artisan seed`


---

### Future Updates ###

* Figure out the is_production variable for showing / hiding Google Analytics
* Dynamically swapping out DB Creds (Figure out the logic: I.E: dev,staging,live)
* User auth (Admins can create, editors can’t)
* Remove Node Modules completely ( and git ignore it )
* Login Error Message - ADMIN
* Re-upload to BitBucket (To make cloning faster, maybe?)
* Drag & Drop system for backend
* Integrate a standard WYSIWYG for backend
* Find some way to clean up routes file
* Company Logo Upload (Front & Backend) as a setting
* User Avatar Upload
* Remove all old references to page specific updater / creator classes, add Hub!
* Update Hub to handle deletes & reorders agnostically 
* Clean up user CRUD views
* Somehow node_modules is still getting included, make sure that's ignored

### TO-DO ###
* Enable checkbox is conflicting with ckEditor (CRUD Pages)

### Aspirations - Service Providers ###

* Initial Setup
* Blog
* E-Commerce
* Forum
* EAV