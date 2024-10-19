<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function doSearch(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $users = User::whereLike(['first_name', 'last_name', 'username'], $searchTerm)->get()->all();

        return view('search/index', [
            'users' => $users,
        ]);
    }
}
