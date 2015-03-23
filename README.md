# consumer-bundle
WS Consumer Bundle on top 

[![Build Status](https://travis-ci.org/itkg/consumer-bundle.svg?branch=master)](https://travis-ci.org/itkg/consumer-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/itkg/consumer-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/itkg/consumer-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/itkg/consumer-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/itkg/consumer-bundle/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e81bf9ea-c76b-4369-8bd5-5646b95262a9/small.png)](https://insight.sensiolabs.com/projects/e81bf9ea-c76b-4369-8bd5-5646b95262a9)

This bundle provide some utilities on top of [itkg-consumer library](https://github.com/itkg/consumer/tree/2.0) 
* Consumer Service definition
* Simple UI to configure Consumer services (proxy, authentication, action / desactivation, cache, etc.)

## Installation

### Installation by Composer

If you use composer, add ItkgConsumerBundle bundle as a dependency to the composer.json of your application

```json

    "require": {
        "itkg/consumer-bundle": "dev-master"
    },

```

* Add ItkgConsumerBundle to your application kernel.

```php

// app/AppKernel.php
<?php
    // ...
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Itkg\ConsumerBundle\ItkgConsumerBundle(),
        );
    }

```

* Activate bundle config in application's config.yml file by addng :


```yaml

itkg_consumer: ~

```

* Load routing in your routing.yml file

```yaml

ItkgConsumerBundle:
    resource: "@ItkgConsumerBundle/Resources/config/routing.yml"
    prefix:   /admin

```
## Usage

### Service definition example

```yaml

rest_client:
    class: %itkg_consumer.client.rest.class%
my_service:
    class: %itkg_consumer.service.class%
    arguments:
        - @event_dispatcher
        - @rest_client
        - { identifier: my_service_identifier }
    tags: 
        - { name: itkg_consumer.service }
```

With specific "itkg_consumer.service" tag, service will be automatically loaded in service list UI

### Getting service from container

```php

$myService = $container
    ->get('itkg_consumer.manager.service')
    ->find('my_service_identifier');

```

## Todo 

* Add tests
* Debug utilities
* WS profiling
* Improve doc
* Add more tests