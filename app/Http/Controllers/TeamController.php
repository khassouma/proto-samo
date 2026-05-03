<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $user = Auth::user();
        $team = "";
        $teams = "";

        $this->authorize('viewAny', Team::class);

        if ($user->isChefService()) {
            $teams = Team::all();
        } else {
            $team = Team::where('id', $user->team_id)->get();
        }

        $members = User::where('team_id', $user->team_id)
            ->where('role', 'agent')
            ->get();

        $users = User::whereNull('team_id')
            ->where('role', 'agent')
            ->get();

        return view('pages.team.index', compact(
            'teams',
            'team',
            'members',
            'users'
        ));
    }

    public function add_member(Request $request)
    {
        $request->validate([
            'users' => 'required|array',
            'users.*' => 'exists:users,id'
        ]);

        $user = Auth::user();

        // mise à jour en masse
        User::whereIn('id', $request->users)
            ->update(['team_id' => $user->team_id]);

        return redirect('/dashboard/team')->with('status', 'le membre a été ajouter');
    }

    public function destroy(User $member)
    {
        $user = Auth::user();

        $this->authorize('manageMembers', $user->team);

        // sécurité : vérifier que c'est bien un agent de son équipe
        if ($member->team_id !== $user->team_id || $member->role !== 'agent') {
            abort(403);
        }

        $member->update([
            'team_id' => null
        ]);

        return redirect('/dashboard/team')
            ->with('status', 'Le membre a été supprimé');
    }
}
