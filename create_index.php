<?php

require __DIR__ . '/vendor/autoload.php';

// init index
$client = new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
$index = $client->initIndex("exampleContacts");

// add items index
// todo: only create index if !exists()
// todo: utilise getenv()
$batch = json_decode(file_get_contents("data/contacts.json"), true);
$index->addObjects($batch);
