## IFX payments: recruitment task

In the `documentation/postman` folder, you will find the Postman collection file. You can use this file to test the application.

To set up the PHP server on `localhost` on port `8000`, run the following command:

```bash
php -S localhost:8000
```

This will start the PHP built-in server, and you can use the Postman collection to make requests to your application running at `http://localhost:8000`.

Additionally, to run the tests, make sure to install dependencies first with:

```bash
composer install
```

After installing dependencies, you can run the tests using the following command:

```bash
vendor\bin\phpunit
```
