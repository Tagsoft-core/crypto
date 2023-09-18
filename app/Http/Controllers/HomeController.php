<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

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
     * @param Request $request
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

    /**
     * View Contact Form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $created_at = date('Y-m-d H:i:s');
        $due_time = Carbon::now()->subDays(1)->addMinute(5);
        $expected = Carbon::now()->addMinute(90);
        $due_time = Carbon::parse($due_time);
        $created_at = Carbon::parse($created_at);
        $difference = $due_time->diffInHours($created_at);

//dd($difference);
        if ($difference <= 90) {
            $time = $due_time;
        }
        if ($difference <= 24) {
            $time = $created_at->addMinutes(90);
        }
        if ($difference > 24 && $difference <= 72) {
            $time = $created_at->addHours(16);
        }
        if ($difference >= 90) {
            $time = $due_time->subHours(48);
        }

        dd($due_time->format('Y-m-d H:i:s'), $time->format('Y-m-d H:i:s'), $expected->format('Y-m-d H:i:s'));
        return view('contact');
    }

    /**
     * Send Contact Email.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function contactMail(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:5,20'],
            'message' => ['required', 'max:600']
        ]);

        Mail::to('jenellamorris@gmail.com')->send(new ContactMail($request));

        return redirect()->back()->with(['success' => 'Thanks for contacting us!']);
    }
}
