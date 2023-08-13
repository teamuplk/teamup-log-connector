## TeamUp Log Connector
This is a composer laravel package to centralize the logs that are made using monolog. You need to have laravel installed to use this package.

## **Installation**

You can install the package via composer,

The require block needs to be updated to include the below line
```bash
    "teamup/log-connector": "dev-develop",
```

When using custom feature branch you can use that branch instead of develop by using the below line
```bash
    "teamup/log-connector": "dev-{branch-name}"
```

Additionaly the repositories block needs to be added to include the package github repo
```bash
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/teamuplk/teamup-log-connector"
        }
    ]
```

An auth.json file will need to be added to your project folder to handle the github access
```bash
    {
        "github-oauth": {
            "github.com": "github_access_token"
        }
    }
```

## **Usage**
You can publish the config file with the below command.You will need to make sure that your env file has the required fields

```bash
    php artisan vendor:publish --tag="log-connector"
```

The modifications need to be made to the config/logging.php file to include 'tup-log' channel. As per your requirement you can either add the logging channel to a stack to be called in combination with your default channel or set the channel as your default.

The logging functionality will be as per the exiting functionality for laravel logs https://laravel.com/docs/9.x/logging

```bash
    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single', 'tup-log'],
            'ignore_exceptions' => false,
        ],
```
