playground to test the algolia api.

ressources:
- https://laracasts.com/series/search-as-a-service/
HOWTO:

you can either use the object oriented approach, and use the following:

``php index.php `search_query```

or use the script approach:

``php scripts/search.php `search_query```

TODO:
- add service provider to index.php. there is already a template under ``App\Search``, but it wouldn't work the last time i tried
