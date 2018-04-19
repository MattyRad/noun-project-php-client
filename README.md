# The Noun Project PHP Client

![Build Status](https://api.travis-ci.org/MattyRad/noun-project-php-client.png?branch=master) ![Code Coverage](https://img.shields.io/codecov/c/github/mattyrad/noun-project-php-client.svg)

## Installation

`composer require mattyrad/noun-project-php-client`

## Usage

Pass a `NounProject\Request` to the `NounProject\Client` to receive data from the API. You will receive a `MattyRad\Support\Result` back.

### Example

```php
use MattyRad\NounProject;

$api = new NounProject\Client($key = 'abc123', $secret= 'xxxx');

$result = $api->send(new NounProject\Request\Icons($term = 'feather', $public_domain = true));

if (! $result->isSuccess()) {
    throw new \Exception($result->getReason());
}

$icons = $result->getIcons();
```

### API and Requests Types

#### Collection

###### Returns a single collection (by collection id or slug)

```php
$result = $api->send(new NounProject\Request\Collection($collection_id_or_slug = 123));

$collection = $result->getCollection();
```

###### Returns a list of icons associated with a collection (by collection id or slug)

```php
$result = $api->send(new NounProject\Request\IconsInCollection(
    $collection_id_or_slug = 123,
    $offset = 1,
    $page = 2,
    $limit = 3
));

$icons = $result->getIcons();
```

#### Collections

###### Return’s a list of all collections

```php
$result = $api->send(new NounProject\Request\Collections($offset = 2, $page = 3, $limit = 1000));

$collections = $result->getCollections();
```

#### Icon

###### Returns a single icon

```php
$result = $api->send(new NounProject\Request\Icon($icon_id_or_term = 123));

$icon = $result->getIcon();
```

#### Icons

###### Returns a list of icons

```php
$result = $api->send(new NounProject\Request\Icons(
    $icon_id_or_term = 'feather'
    $limit_to_public_domain = true;
    $offset = 2;
    $page = 3;
    $limit = 4;
));

$icon = $result->getIcons();
```

###### Returns list of most recently uploaded icons

```php
$result = $api->send(new NounProject\Request\RecentIcons);

$icon = $result->getIcons();
```

#### Usage

###### Returns current oauth usage and limits

```php
$result = $api->send(new NounProject\Request\Usage);

$usage = $result->getUsage();
$limits = $result->getLimits();
```

#### User

###### TODO
