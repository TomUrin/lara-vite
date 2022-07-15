<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function index(Request $request)
    {

        $accounts = match($request->sort) {
            'nameDown' => Account::orderBy('name', 'asc')->get(),
            'nameUp' => Account::orderBy('name', 'desc')->get(),
            'surnameDown' => Account::orderBy('surname', 'asc')->get(),
            'surnameUp' => Account::orderBy('surname', 'desc')->get(),
            'sumDown' => Account::orderBy('sum', 'desc')->get(),
            'sumUp' => Account::orderBy('sum', 'asc')->get(),
            default => Account::all()
        };

        return view('accounts.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'personId' => 'required|unique:accounts|min:11|max:11'
        ]);

        $account = new Account;

        $account->accNr = $account->accountNumber();
        $account->name = $request->name;
        $account->surname = $request->surname;
        $account->personId = $request->personId;
        $account->sum = 0;

        $account->save();
        return redirect()->route('accounts-index')->with('success', 'Account successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(int $accountId)
    {
        $account = Account::where('id', $accountId)->first();
        return view('accounts.show', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        if($account->sum < $request->deductFunds) {
            return redirect()->route('accounts-index')->with('fundsError', 'There are insufficient funds in the account or an incorrect amount has been entered!');
        };

            if($request->addFunds) {
                $account->sum += $request->addFunds;
                $account->save();
                return redirect()->route('accounts-index')->with('fundsSuccess', 'The funds have been successfully added.');
            } elseif($request->deductFunds) {
                $account->sum -= $request->deductFunds;
                $account->save();
                return redirect()->route('accounts-index')->with('deduct', 'The funds have been successfully deducted.');
            };     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if($account->sum > 0) {
            return redirect()->route('accounts-index')->with('error', 'An account containing money cannot be deleted!');
        }
        $account->delete();
        return redirect()->route('accounts-index')->with('deleted', 'Account successfully deleted.');
    }

    
}
