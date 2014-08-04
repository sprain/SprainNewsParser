#SprainNewsParser
A PHP libary to get contents from news websites.

It allows you to get headlines and links to most read stories, most commented stories and recommended stories.
All based on availability by the corresponding news platform.

Currently supported platforms:
* Switzerland
  * NZZ (http://www.nzz.ch)
  * Tagesanzeiger (http://www.tagesanzeiger.ch)

**You are welcome to contribute!**

## Installation
Add SprainNewsParser in your composer.json:

```js
{
    "require": {
        "sprain/newsparser": "dev-master"
    }
}
```

This will install the current development version of this library.
For other versions of this library find the overview at [Packagist](https://packagist.org/packages/sprain/newsparser).

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update sprain/newsparser
```

## Usage
See [example.php](example/example.php).

## Todos
* Improve unit tests (e.q. test caching of fetched articles)
* Add more news platforms
* Add functionality to get latest articles
* Add functionality to get details of fetched articles

## License
This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE