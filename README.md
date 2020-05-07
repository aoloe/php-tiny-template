# Tiny Templates

One small single file with a Template engine for small PHP Apps.

TinyTemplate provides:

- replacing `{{variable}}` in the template.

That's all.

## Usage

### Download the file and include it

You can simply download the [TinyRest.php](https://raw.githubusercontent.com/aoloe/php-tiny-template/master/src/TinyTemplate.php) file, put it somewhere on your disk and include it from your script.

```php
include('TinyTemplate.php`);
```

### Get the Github repository and load it through Composer

You can get the repository from Github: <https://github.com/aoloe/php-tiny-template>...

... and then link it in your projects `composer.json`by the path on your computer:

```json
"repositories": [
    {
        "type": "path",
        "url": "/your/path/to/php-tiny-template"
    }
],
"require": {
    "aoloe/tiny-template": "@dev"
}
```

See the test script below for a basic usage (and TinyRest cannot do much more than that...).

### Let Composer get TinyTemplate from Github

You can also tell Composer to get the TinyRest from Github:

```json
"repositories": [
    {
        "type": "vcs",
        "url":  "git@github.com:aoloe/php-tiny-template.git"
    },
],
"require": {
    "aoloe/tiny-template": "dev-master"
}
```

See the test script below for a basic usage (and TinyRest cannot do much more than that...).

## A test script

```php
<?php
include('TinyTemplate.php');

echo(TinyTemplate::factory()->
    add('body', '<p>Welcome</p>')->
    fetch('<html><body>{{body}}</body></html>');
```
