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
        $this->client = new \AlgoliaSearch\Client(
            getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_API_KEY'));
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
