<?php

namespace App;

use App\Interfaces\searchInterface;

/**
 * Class AlgoliaSearch
 * @author Julie Engel
 */
class AlgoliaSearch implements SearchInterface
{
    protected $client;
    protected $index;

    public function __construct()
    {
        $this->client = new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
    }

    public function index($searchIndex)
    {
        $this->index = $this->client->initIndex($searchIndex);
        return $this;
    }

    public function find($searchQuery, $searchOptions)
    {
        if ($this->index) {
            return $this->index->search($searchQuery, $searchOptions)['hits'];
        }

        return null;
    }
    
}

//$client = new \AlgoliaSearch\Client("3VC8H0ZENS", "a156adee94868ae9d981ae9f1df2ff49");
//$index = $client->initIndex("exampleContacts");
//$results = $index->search($searchQuery, $searchOptions)['hits'];
