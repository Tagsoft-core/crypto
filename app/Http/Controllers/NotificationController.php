<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->paginate(15);

        return view('user.notification', compact('notifications'));
    }

    /**
     * Mark notification.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function markNotification($id)
    {
        auth()->user()->notifications()->findOrFail($id)->markAsRead();
        return redirect()->back()->with(['success' => 'Notification marked']);
    }

    /**
     * Mark all notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back()->with(['success' => 'All Notifications marked']);
    }


    /**
     * Display a admin listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminNotifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications()->latest()->paginate(15);

        return view('admin.notification', compact('notifications'));
    }

    /**
     * Mark notification.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function adminMarkNotification($id)
    {
        auth()->user()->notifications()->findOrFail($id)->markAsRead();
        return redirect()->back()->with(['success' => 'Notification marked']);
    }

    /**
     * Mark all notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminMarkAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back()->with(['success' => 'All Notifications marked']);
    }
}
