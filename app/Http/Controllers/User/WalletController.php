<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\TransactionLogsMail;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Bavix\Wallet\Models\Wallet;
use App\Http\Requests\WithdrawRequest;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\ExchangeRequest;
use Auth;

class WalletController extends Controller
{
    protected $currencies = [];

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw(string $slug)
    {
        $user = Auth::user();

        $wallet = $user->getWallet($slug);

        return view('user.wallet.withdraw', compact('wallet'));
    }

    /**
     * Make the withdraw
     * @param  WithdrawRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeWithdraw(WithdrawRequest $request)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($request->wallet_slug);

        try {
            $wallet->withdrawFloat($request->amount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Withdraw success']);
    }

    /**
     * Show the deposit window.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit(string $slug)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($slug);
        return view('user.wallet.deposit', compact('wallet'));
    }

    /**
     * Make the deposit
     * @param  DepositRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeDeposit(DepositRequest $request)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($request->wallet_slug);

        try {
            $wallet->depositFloat($request->amount);
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
        return view('user.wallet.transfer', compact('wallet'));
    }

    /**
     * Make the transfer
     * @param  TransferRequest $request
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeTransfer(TransferRequest $request, string $slug)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($slug);

        $toUser = User::where('email', '=', $request->user)->first();
        $transferToWallet = $toUser->getWallet($request->wallet);

        $this->getCurrencies($wallet, $transferToWallet);
        $exchange = $this->convertAmount($request);



        try {
            $wallet->transferFloat($transferToWallet, $exchange['rate']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Transfer success']);
    }

    /**
     * Show the exchange window.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exchange(string $slug)
    {
        $user = Auth::user();

        $wallet = $user->getWallet($slug);
        $userWallets = $user->wallets;

        return view('user.wallet.exchange', compact('wallet', 'userWallets'));
    }

    /**
     * Send transaction log email.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function requestTransactionLogs(string $slug)
    {
        $user = Auth::user();

        $wallet = $user->getWallet($slug);
        Mail::to('trevor@logodesignscenter.com')->send(new TransactionLogsMail($wallet->transactions));

        return redirect()->back();
    }

    /**
     * Make the exchange
     * @param  ExchangeRequest $request
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function makeExchange(ExchangeRequest $request, string $slug)
    {
        $user = Auth::user();
        $wallet = $user->getWallet($slug);
        $exchangeWallet = $user->getWallet($request->wallet);

        $this->getCurrencies($wallet, $exchangeWallet);
        $exchange = $this->convertAmount($request);

        try {
            $wallet->withdrawFloat($request->amount);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        try {
            $exchangeWallet->depositFloat($exchange['rate']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['success' => 'Exchange success']);
    }

    private function convertAmount($request)
    {
        $exchange['rate'] = $this->currencies['toCurrency']->exchange_rate * $request->amount;
        $exchange['from'] = $this->currencies['fromCurrency']->name;
        $exchange['to'] = $this->currencies['toCurrency']->name;

        return $exchange;
    }

    private function getCurrencies($wallet, $transferToWallet)
    {
        $this->currencies['fromCurrency'] = Currency::where('code', $wallet->meta['currency'])->first();
        $this->currencies['toCurrency'] = Currency::where('code', $transferToWallet->meta['currency'])->first();
    }
}
