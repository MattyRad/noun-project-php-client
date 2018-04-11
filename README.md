# The Noun Project PHP Client

## Installation

`composer require mattyrad/noun-project-php-client`

## Usage

```php
$noun_project = new NounProject\Client($http_client);

$result = $noun_project->send(new NounProject\Request\Collection($id = 1));

$collection_data = $result->getCollection();
```