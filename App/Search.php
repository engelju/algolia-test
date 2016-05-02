<?php

namespace App;

use App\AlgoliaSearch;

/**
 * Class Search
 * @author Julie Engel
 */
class Search
{
    public function __construct()
    {
        return new AlgoliaSearch();
    }
}
