<?php

namespace App;

use App\AlgoliaSearch;

/**
 * Class Search
 *
 * If you'd want to use another Search Provider, create a Wrapper for 
 * your new Search Provider, which conforms to the SearchInterface, 
 * and change the return type of the construcor to your new class.
 *
 * @author Julie Engel
 */
class Search
{
    public function __construct()
    {
        return new AlgoliaSearch();
    }
}
