<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notificationSettings;

        return view('user.profile.index')->with(compact('user', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string'],
            'phone' => ['required', 'string', 'min:5'],
            'dob'   => ['required', 'date'],
        ]);

        $user->update([
            'name'  => $request->name,
            'phone' => $request->phone,
            'dob'   => $request->dob
        ]);

        if ($request->notification) {
            $notification = $request->notification;

            if (!isset($request->notification['email'])) {
                $notification['email'] = 0;
            }

            if (!isset($request->notification['sms'])) {
                $notification['sms'] = 0;
            }

            if (!isset($request->notification['ui'])) {
                $notification['ui'] = 0;
            }
        } else {
            $notification = [
                'email' => 0,
                'sms'   => 0,
                'ui'    =>0,
            ];
        }

        $user->notificationSettings()->update($notification);

        return redirect()->back()->with(['success' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect()->back()->with(['success' => 'De activate success']);
    }
}
