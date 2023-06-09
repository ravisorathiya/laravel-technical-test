<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function index()
    {
//        $users = User::with('scores')->get();
//        $totalScores = $users->map(function ($user) {
//            return [
//                'user_id' => $user->id,
//                'name' => $user->name,
//                'total_score' => $user->scores->sum('score'),
//            ];
//        });
//        $sortedScores = $totalScores->sortByDesc('total_score');
//        $response = [
//            'success' => true,
//            'leaderboard' => $sortedScores->map(function ($score, $key) {
//                return [
//                    'id' => $key + 1,
//                    'user_id' => $score['user_id'],
//                    'created_at' => now()->toIso8601String(),
//                    'updated_at' => now()->toIso8601String(),
//                    'total_score' => $score['total_score'],
//                    'user' => [
//                        'id' => $score['user_id'],
//                        'name' => $score['name'],
//                    ],
//                ];
//            }),
//        ];
//        return response()->json($response);

        $leaderboard = DB::table('users')
            ->leftJoin('scores', 'users.id', '=', 'scores.user_id')
            ->select('users.id', 'users.name', DB::raw('COALESCE(SUM(scores.score), 0) as total_score'))
            ->groupBy('users.id')
            ->orderByDesc('total_score')
            ->get();

        $response = [
            'success' => true,
            'leaderboard' => $leaderboard->map(function ($user, $key) {
                return [
                    'id' => $key + 1,
                    'user_id' => $user->id,
                    'created_at' => now()->toIso8601String(),
                    'updated_at' => now()->toIso8601String(),
                    'total_score' => $user->total_score,
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                    ],
                ];
            }),
        ];
        return response()->json($response);
    }
}
