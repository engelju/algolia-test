<?php

namespace App;

use App\Interfaces\searchInterface;

/**
 * Class AlgoliaSearch
 * @author Julie Engel
 */
class AlgoliaSearch implements SearchInterface
{
    public function __construct()
    {
        return new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
    }
}

//$client = new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
//$index = $client->initIndex("exampleContacts");
//$results = $index->search($searchQuery, $searchOptions)['hits'];
