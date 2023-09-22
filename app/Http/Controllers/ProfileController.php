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
        return view('user.profile.index')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @param Request$request
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
