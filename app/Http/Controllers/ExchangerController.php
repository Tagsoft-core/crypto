<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Exchange;
use App\Models\Currency;
use Illuminate\Support\Facades\Validator;

class ExchangerController extends Controller
{
    protected $exchange;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Exchange $exchange)
    {
        $this->middleware('auth');
        $this->exchange = $exchange;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'amount' => ['required', 'string', 'min:1'],
            'from' => ['required', 'string',],
            'to' => ['required', 'string'],
        ]);
    }

    /**
     * get the exchange rate.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $toCurrency = Currency::where('code', $request->to)->first();
        $fromCurrency = Currency::where('code', $request->from)->first();

        $exchange['rate'] = $toCurrency->exchange_rate * $request->amount;
        $exchange['from'] = $fromCurrency->name;
        $exchange['to'] = $toCurrency->name;
        $exchange['amount'] = $request->amount;

        return json_encode($exchange, true);

        //$exchange = $this->exchange->specificConversion('from=LTC&to=BTC&amount=1000');
    }
}
