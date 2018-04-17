# The Noun Project PHP Client

## Installation

`composer require mattyrad/noun-project-php-client`

## Usage

Pass a `NounProject\Request` to the `NounProject\Client` to receive data from the API. You will receive a `MattyRad\Support\Result` back.

### Example

```php
use MattyRad\NounProject;

$noun_project_api = new NounProject\Client($key, $secret);

$result = $noun_project_api->send(new NounProject\Request\Icons($term = 'feather', $limit_to_public_domain = true));

if (! $result->isSuccess()) {
    throw new \Exception($result->getReason());
}

$icons = $result->getIcons();
```

### Requests Types

Request types are matched to `http://api.thenounproject.com/documentation.html` as closely as possible.

#### Collection

###### Returns a single collection (by collection id or slug)

```php
$result = $noun_project_api->send(new NounProject\Request\Collection($collection_id_or_slug = 123));

$collection = $result->getCollection(); // NounProject\Collection
```

###### Returns a list of icons associated with a collection (by collection id or slug)

```php
$result = $noun_project_api->send(new NounProject\Request\CollectionIcons($collection_id_or_slug = 123));

$icons = $result->getIcons(); // array of NounProject\Icon
```

#### Collections

###### Return’s a list of all collections

```php
$result = $noun_project_api->send(new NounProject\Request\Collections($limit = 1000, $offset = 2, $page = 10));

$collections = $result->getCollections(); // array of NounProject\Collection
```

#### Icon

###### Returns a single icon

```php
$result = $noun_project_api->send(new NounProject\Request\Icon($icon_id_or_term = 123));

$icon = $result->getIcon(); // NounProject\Icon
```

#### Icons

###### Returns a list of icons

```php
$result = $noun_project_api->send(new NounProject\Request\Icons($icon_id_or_term = 'feather'));

$icon = $result->getIcons(); // array of NounProject\Icon
```

###### Returns list of most recently uploaded icons

```php
$result = $noun_project_api->send(new NounProject\Request\RecentIcons);

$icon = $result->getIcons(); // array of NounProject\Icon
```

#### Usage

###### Returns current oauth usage and limits

```php
$result = $noun_project_api->send(new NounProject\Request\Usage);

$usage = $result->getUsage(); // NounProject\Usage
```

#### User

###### Returns a list of collections associated with a user

```php
$result = $noun_project_api->send(new NounProject\Request\UserCollections($user_id = 123));

$collections = $result->getCollections(); // array of NounProject\Collection
```

###### Returns a single collection associated with a user

```php
$result = $noun_project_api->send(new NounProject\Request\UserCollectionsBySlug($user_id = 123, $slug = 'feather'));

$collection = $result->getCollection(); // NounProject\Collection
```

###### Returns a list of uploads associated with a user

```php
$result = $noun_project_api->send(new NounProject\Request\UserUploads($username = 'user'));

$icons = $result->getIcons(); // array of NounProject\Icon
```
