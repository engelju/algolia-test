<?php

require __DIR__ . '/../vendor/autoload.php';

if (PHP_SAPI === 'cli') {
    if ($argc === 2) {
        $searchQuery = $argv[1];
    } else {
        die("no searchQuery specified");
    }
} else {
    die('sorry, only cli access is supported rn :(');
}

// load conf
$dotenv = new Dotenv\Dotenv(__DIR__ .'/../');
$dotenv->load();

// init index
$client = new \AlgoliaSearch\Client(getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_API_KEY'));
$index = $client->initIndex("exampleContacts");

// search index
$searchOptions = [
    "attributesToRetrieve" => "firstname,lastname",
    //"hitsPerPage" => 2,
];

$results = $index->search($searchQuery, $searchOptions)['hits'];
if ($results) {
    echo("found ".count($results)." hits:");
    foreach ($results as $result) {
        echo "\n";
        echo("- ".$result['firstname'].' '.$result['lastname']);
    }
} else {
    echo "found 0 hits for \"$searchQuery\"";
}
