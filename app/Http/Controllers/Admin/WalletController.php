<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Bavix\Wallet\Models\Wallet;
use App\Http\Requests\WithdrawRequest;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use Auth;

class WalletController extends Controller
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
     * Show the withdraw window.
     *
     * @param string $slug
     * @param User $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw(string $slug, User $user = null)
    {
        if ($user == null)
            $user = Auth::user();

        $wallet = $user->getWallet($slug);
        //dd($wallet);
        return view('admin.wallet.withdraw', compact('wallet', 'user'));
    }

    /**
     * Make the withdraw
     * @param  WithdrawRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeWithdraw(WithdrawRequest $request)
    {
        $user = User::findOrFail($request->user);
        $wallet = $user->getWallet($request->wallet_slug);

        try {
            $wallet->withdraw($request->amount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Withdraw success']);
    }

    /**
     * Show the deposit window.
     *
     * @param string $slug
     *      * @param User $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit(string $slug, User $user = null)
    {
        if ($user == null)
            $user = Auth::user();

        $wallet = $user->getWallet($slug);

        return view('admin.wallet.deposit', compact('wallet', 'user'));
    }

    /**
     * Make the deposit
     * @param  DepositRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeDeposit(DepositRequest $request)
    {
        $user = User::findOrFail($request->user);
        $wallet = $user->getWallet($request->wallet_slug);

        try {
            $wallet->deposit($request->amount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Deposit success']);
    }

    /**
     * Show the transfer window.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transfer(string $slug)
    {
        $user = Auth::user();

        $wallet = $user->getWallet($slug);

        return view('admin.wallet.transfer', compact('wallet'));
    }

    /**
     * Make the transfer
     * @param  TransferRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeTransfer(TransferRequest $request)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($request->wallet_slug);

        try {
            $wallet->deposit($request->amount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Transfer success']);
    }
}
