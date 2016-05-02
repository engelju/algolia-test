<?php

require __DIR__ . '/../vendor/autoload.php';

// load conf
$dotenv = new Dotenv\Dotenv(__DIR__ .'/../');
$dotenv->load();

// init index
$client = new \AlgoliaSearch\Client(getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_API_KEY'));
$index = $client->initIndex("exampleContacts");

// add items index
// todo: only create index if !exists()
$batch = json_decode(file_get_contents("../data/contacts.json"), true);
$index->addObjects($batch);
