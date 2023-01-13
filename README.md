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

You can publish the config file with:

```bash
    php artisan vendor:publish --tag="log-connector"
```

## **Usage**

You can access the controller class from the below path

```bash
    "use Teamup\LogConnector\Https\Controllers\LogController;",
```