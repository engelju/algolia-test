<?php

require __DIR__ . '/vendor/autoload.php';

if (PHP_SAPI === 'cli') {
    if ($argc === 2) {
        $searchQuery = $argv[1];
    } else {
        die("no searchQuery specified");
    }
} else {
    die('sorry, only cli access is supported rn :(');
}

// init index
// todo: utilise getenv()
$client = new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
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
