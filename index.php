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

$searchOptions = [
    "attributesToRetrieve" => "firstname,lastname",
    //"hitsPerPage" => 2,
];

// todo: use serviceprovider
$search = new \App\AlgoliaSearch;
$results = $search->index('exampleContacts')->find($searchQuery, $searchOptions);

if ($results) {
    echo("found ".count($results)." hits:");
    foreach ($results as $result) {
        echo "\n";
        echo("- ".$result['firstname'].' '.$result['lastname']);
    }
} else {
    echo "found 0 hits for \"$searchQuery\"";
}
