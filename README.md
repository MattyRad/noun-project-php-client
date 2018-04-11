# The Noun Project PHP Client

## Installation

`composer require mattyrad/noun-project-php-client`

## Usage

```php
$noun_project = new NounProject\Client($key, $secret);

$result = $noun_project->send(new NounProject\Request\Icons($id = 1));

$icons = $result->getIcons();
```