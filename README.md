## German Verbs

Load German verbs from [verbix.com](https://www.verbix.com/languages/german.html).

### How to install

```
composer require marciodojr/german-verbs
```

### How to use

```php

    $client = new Client([
        'base_uri' => 'https://api.verbix.com',
        'timeout' => 5.0
    ]);
    $this->verb = new Verb($client);

    $result = $this->verb->getVerbsStartingWith('a');

    // result contains
    /*
        array(3) {
        [0] =>
        array(2) {
            'verb' =>
            string(5) "aalen"
            'langid' =>
            int(13)
        }
        [1] =>
        array(2) {
            'verb' =>
            string(5) "aasen"
            'langid' =>
            int(13)
        }
        [2] =>
        array(2) {
            'verb' =>
            string(7) "abaasen"
            'langid' =>
            int(13)
        }
        }
    */

```

### How to test

```sh
# 1st terminal
git clone https://github.com/marciodojr/german-verbs
make up

# 2nd terminal
make php
make install

vendor/bin/phpunit
```