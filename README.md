## TeamUp Log Connector
This is a composer laravel package to centralize the logs that are made using monolog. You need to have laravel installed to use this package.

## **Installation**

You can install the package via composer by adding the below command to your composer.json require block:

```bash
    "teamup/log-connector": "dev-develop",
```

You can publish the config file with:

```bash
    php artisan vendor:publish --tag="log-connector"
```

## **Usage**

You can access the controller class from the below path

```bash
    "use Teamup\LogConnector\Https\Controllers\LogController;",
```