<?php

namespace App\Services;

use App\Contracts\SearchServiceInterface;
use App\Http\Requests\SearchRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class SearchService implements SearchServiceInterface
{
    public function search(SearchRequest $request)
    {
        try {
            $searchTerm = $request->term;

            $users = User::whereLike(['first_name', 'last_name', 'username'], $searchTerm)->get()->all();

            $results['users'] = $users;

            return $results;
        } catch (Exception $exception) {
            Log::error(self::class .'::'.__FUNCTION__.': '.$exception->getMessage());
        }
    }
}
