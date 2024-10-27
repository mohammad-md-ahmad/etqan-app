<?php

namespace App\Http\Controllers;

use App\Contracts\SearchServiceInterface;
use App\Http\Requests\SearchRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SearchController extends Controller
{
    public function __construct(
        protected SearchServiceInterface $searchService,
    ) {
    }

    public function search(SearchRequest $request)
    {
        try {
            if (empty($request->term)) {
                throw ValidationException::withMessages(['Search term is required!']);
            }

            $results = $this->searchService->search($request);

            return view('search/index', [
                ...$results
            ]);
        } catch (ValidationException $validationException) {
            return view('search/index')->withErrors($validationException->errors());
        } catch (Exception $exception) {
            Log::error(self::class .'::'.__FUNCTION__.': '.$exception->getMessage());

            return view('search/index')->withErrors([
                __('An error occurred while processing your request.'),
            ]);
        }
    }
}
