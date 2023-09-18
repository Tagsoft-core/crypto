<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
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
     * Show the Currencies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.currencies.list', [
            'currencies' => Currency::all()
        ]);
    }

    /**
     * Show the profile for a currency.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        return view('admin.currencies.edit', [
            'currency' => Currency::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $request->validate([
            'symbol' => ['required', 'string', 'max:255'],
            'exchange_rate' => ['required', 'string', 'numeric', 'gt:0'],
        ]);

        $currency = Currency::findOrFail($id);
        $currency->symbol = $request->symbol;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->update();

        return redirect()->back()->with(['success' => 'Edit success']);
    }

}
