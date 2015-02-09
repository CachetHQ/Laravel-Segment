# Laravel-Segment
Segment.com wrapper for Laravel.

## Installation

Add the following to your `composer.json` file.

```json
"require": {
    "cachethq/segment": "~2.0"
}
```

Get the package installed.

```bash
$ composer update
```

Add the service provider to `app.php`

```php
'providers' => [
    // ...
    'CachetHQ\Segment\SegmentServiceProvider',
],
```

If you want to use the Facade, also add the alias:

```php
'aliases' => [
    // ...
    'Segment'  => 'CachethQ\Segment\Facades\Segment',
],
```

Install the configuration file.

```bash
$ php artisan config:publish cachethq/segment
```

Update the new configuration file with your `write_key` as provided by [Segment.com](https://segment.com)

## Using Laravel-Segment

Once you've set your `write_key` value in the configuration, you're ready to go! For the most part you can follow [Segments own instructions](https://segment.com/docs/libraries/php/quickstart) however, you'll want to replace the `Analytics` classname with `Segment` - plus, you don't need to call `class_alias`.

### Identify the user

```php
Segment::identify([
    "userId" => "12345abcde",
    "traits" => [
        "name"  => "James Brooks",
        "email" => "test@test.com",
    ]
]);
```

### Track actions

```php
Segment::track([
    "userId"     => "12345abcde",
    "event"      => "Did something",
    "properties" => [
        "was_awesome" => true,
    ]
]);
```


## License

Laravel-Segment is licensed under [The MIT License (MIT)](LICENSE).
