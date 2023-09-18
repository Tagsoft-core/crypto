<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Currency;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        $wallets = $user->wallets;
//        $wallets['usdt'] = $user->getWallet('usdt');
//        $wallets['ltc'] = $user->getWallet('ltc');

        return view('admin.dashboard')->with(compact('wallets', 'currencies'));
    }
}
