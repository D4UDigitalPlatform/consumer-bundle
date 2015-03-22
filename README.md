# consumer-bundle
WS Consumer Bundle

[![Build Status](https://travis-ci.org/itkg/consumer-bundle.svg?branch=master)](https://travis-ci.org/itkg/consumer-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/itkg/consumer-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/itkg/consumer-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/itkg/consumer-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/itkg/consumer-bundle/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e81bf9ea-c76b-4369-8bd5-5646b95262a9/small.png)](https://insight.sensiolabs.com/projects/e81bf9ea-c76b-4369-8bd5-5646b95262a9)


## Installation

### Installation by Composer

If you use composer, add ItkgConsumerBundle bundle as a dependency to the composer.json of your application

```json

    "require": {
        ...
        "snide/travinizer-bundle": "dev-master"
        ...
    },

```

Add ItkgConsumerBundle to your application kernel.

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

Activate bundle config in application's config.yml file by addng :

```php

itkg_consumer: ~

```
