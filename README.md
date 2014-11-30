
##Installation

```bash
git clone https://github.com/ed-fruty/test.git test-project
cd test-project
php -S localhost:8000 -t public/
```
After that you can access project in http://localhost:8000/

##Requirements
- PHP 5.4 and above
- write access to the logs/errors.log

##Structure
```bash
app/
  Controllers/
    HomeController.php          Application home controller
  Task/                       All task files
    Contracts/                  Interfaces
    DataProviders/              Data providers (array, json, xml)
    DataCollection.php          Data collection
    DataFilter.php              Data filtering class
    Manager.php                 Data providers manager
  Support/                    Something like core files. Here i wrote a components for current application working
    Contracts/                  Interfaces
    Facades/                    Facades, witch delegate calls to the instance of accessor class
    Foundation/                 Kernel
    Http/                       Simple routing, request and response
    Templating/                 Templating system. Any template system like Twig, Smarty, Blade etc. can be added as driver 
    Traits/                     Traits
bootstrap/
  bootstrap.php                 Bootstrap file, detect current environment and set project root path, register class loader
  routes.php                    Application routes
config/                       
  {Environment}/
    config.php                  Configuration file
logs/
  errors.log                    Errors log
public/                       Web root directory
  index.php                     Project Index file
resources/
  data/                       Source data for data providers located here
  views/                      Application views
```

##Logic

Core:
  - First of all loads bootsrap file, witch detect current environment
  - Load environment configuration file
  - Register and boot application service providers. All aplication features can be extended by addition service provider (For example register error handler, including routes file, create some connection, adding new package etc.)
  - Handle request
  
Data Filtering:
  - Create data provider instance
  - Load resource file and reformat data
  - Create collection with formated data
  - Filter data if it needs and returns new instance of filtered collection
  - Sorting data in collection
  - Return response
