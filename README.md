# Company Module
 

 
## Installation


```sh
composer require johnnymcweed/luya-module-company:dev-master 
```

### Configuration

```php
return [
    'modules' => [
        // ...
        'company' => 'johnnymcweed\company\frontend\Module',
        'companyadmin' => 'johnnymcweed\company\admin\Module',
        // ...
    ],
];
```

### Initialization 

After successfully installation and configuration run the migrate, import and setup command to initialize the module in your project.

1.) Migrate your database.

```sh
./vendor/bin/luya migrate
```

2.) Import the module and migrations into your LUYA project.

```sh
./vendor/bin/luya import
```


## Example Views

There are default views set up. Use these or create your own custom views.
