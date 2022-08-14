<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class BlogManagement extends Controller
{
    public function edit()
    {
        $team = Team::find(1); //main blog query
        $user = auth()->user();

        if(! $user->hasTeamPermission($team, 'update') || $user->currentTeam->id != $team->id){
            abort(401, 'You do not have access to update a blog post');
        }

        return "this is blog edit page";
    }

    public function show()
    {
        return "blog content enjoy reading";
    }

    public function destroy(Request $request)
    {
        $team = Team::find(1); //main blog query

        $user = $request->user();

        if(! $user->hasTeamPermission($team, 'delete')){
            abort(401, "You do not have access this section");
        }

        // dd('fromteam', $team->userHasPermission($user, 'update'));

        // dd($user->hasTeamPermission($team, 'delete'));

        return "blog delete page";
    }
}

