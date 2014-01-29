username-generator
==================

I wanted to try out google appengine with php, so I made this simple app to run on it.

See it ad https://username-generator.appspot.com


To deploy it I ran
```bash
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
php composer.phar install -o
sudo gem install compass
compass compile
/tmp/google_appengine/appcfg.py update .
```

To run the test server I ran
```bash
/tmp/google_appengine/dev_appserver.py --php_executable_path=$(which php-cgi) .
```

