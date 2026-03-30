<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $sessions = DB::table('sessions')
            ->where('user_id', $user->id)
            ->orderByDesc('last_activity')
            ->get()
            ->map(function ($session) {
                $session->last_activity_at = \Carbon\Carbon::createFromTimestamp($session->last_activity);
                return $session;
            });

        return view('admin.settings.index', compact('user', 'sessions'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function updateNotifications(Request $request)
    {
        $keys = [
            'new_application',
            'application_status_change',
            'new_scholar',
            'scholar_non_compliance',
            'scholarship_deadline',
        ];

        $prefs = [];
        foreach ($keys as $key) {
            $prefs[$key] = $request->boolean($key);
        }

        $request->user()->update(['notification_preferences' => $prefs]);

        return back()->with('status', 'notifications-updated');
    }
}
