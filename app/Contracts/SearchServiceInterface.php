<?php

namespace App\Contracts;

use App\Http\Requests\SearchRequest;

interface SearchServiceInterface
{
    public function search(SearchRequest $request);
}
