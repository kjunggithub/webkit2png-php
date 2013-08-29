# webkit2png-php

webkit2png-php is a PHP wrapper for the [webkit2png binary](https://github.com/paulhammond/webkit2png/) on OS X. Latest webkit2png version tested with this library is `v0.6`. For more details on webkit2png, please refer to [project page](http://www.paulhammond.org/webkit2png/).

## Requirements

* [webkit2png binary](https://github.com/paulhammond/webkit2png/)
* PHP 5.3 or greater
* Shell access

## Installation

To get started, require the library in your `composer.json` file:

```JSON
{
	"require": {
		"kjung/webkit2png-php": "1.0.*@dev"
	}
}
```
Then run `composer install` or `composer update`.

## Usage

* Start by loading the autoloader: 

```PHP
require_once 'vendor/autoload.php';
```

* Instantiate the library with the URL:

```PHP
$webkit2png = new \kjung\webkit2png('http://google.com');
```

* You can pass options to it but it is not required:

```PHP
$webkit2png->setOptions(array(
	'dir'      => 'images/',
	'width'    => '1000',
	'fullsize' => true
	)
);
```
The library default directory is set to `images/` but you can always override it with the `dir` option as seen above.

* Now Generate the image:

```PHP
$webkit2png->getImage();
```
And thats it!

* Optionally, you can access the actual webkit2png query being sent with this method:

```PHP
$webkit2png->getQuery();
```

## Available Options

| Option | Example |
| :---: | :---: |
| width | `'1280'` | 
| height | `'800'` |
| zoom | `'2.0'` |
| fullsize | `true` |
| thumb | `true` |
| clipped | `true` |
| clipped-width | `'1000'` |
| clipped-height | `'800'` |
| scale | `'3.0'` |
| dir | `'images/'` |
| filename | `'image'` |
| md5 | `true` |
| datestamp | `true` |
| delay | `'3'` |
| js | `'\'javascript here\''` |
| no-image | `true` |
| no-js | `true` |
| transparent | `true` |
| user-agent | `'\'use agent string here\''` |

## TODOs

* Add validation
* Complete Readme
* Composer

