<?php

namespace App\Interfaces;

/**
 * Interface 
 * @author Julie Engel
 */
interface SearchInterface
{
    public function index($searchIndex);
    public function find($searchQuery, $searchOptions);
}
