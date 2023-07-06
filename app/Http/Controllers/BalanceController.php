<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Models\Bill;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBalanceRequest $request)
    {
        // ($request->addBalance);
        Balance::create([
            'user_id' => Auth::user()->id,
            'balance' => $request->addBalance,
            'pocket_money' => $request->addBalance
        ]);
        
        History::create([
            'user_id' => Auth::user()->id,
            'balance_id' => User::find(Auth::user()->id)->balance->pluck('id')->first(),
            'total' => $request->addBalance
        ]);
        
        return redirect('dashboard');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Balance $balance)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balance $balance)
    {
        //
    }
    
    public function addBalance(UpdateBalanceRequest $request)
    {
        
        $balance = User::find(Auth::user()->id)->balance->pluck('balance')->first();
        $pocket = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();
        $addBalance = $balance + $request->addBalance;
        $addPocket = $pocket + $request->addBalance;
        
        Balance::find($request->id)->update([
            'balance' => $addBalance,
            'pocket_money' =>  $addPocket
        ]);

        History::create([
            'user_id' => Auth::user()->id,
            'balance_id' => User::find(Auth::user()->id)->balance->pluck('id')->first(),
            'total' => $request->addBalance
        ]);

        return redirect('dashboard');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBalanceRequest $request, Balance $balance)
    {
        // dd($request->billId1);
        $balances = User::find(Auth::user()->id)->balance->pluck('balance')->first();
        // $pocketMoney = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();

        
        $updatedBalance = $balances - $request->storeBill1 - $request->storeBill2 - $request->storeBill3 - $request->storeBill4 - $request->storeBill5 - $request->storeBill6;
        // $updatedPocketMoney = $pocketMoney - $request->storeBill2 - $request->storeBill3 - $request->storeBill4 - $request->storeBill5 -$request->storeBill6;
        $totalBills = $request->storeBill1 + $request->storeBill2 + $request->storeBill3 + $request->storeBill4 + $request->storeBill5 + $request->storeBill6;

        if($request->storeBill1) {
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId1)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }
        if($request->storeBill2) {
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId2)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }
        if($request->storeBill3) {
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId3)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }
        if($request->storeBill4) {
            // dd($request->storeBill4);
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId4)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }
        if($request->storeBill5) {
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId5)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }
        if($request->storeBill6) {
            $statusBill = User::find(Auth::user()->id)->bill->where('id', $request->billId6)->first();
            $statusBill->status = 1;
            $statusBill->save();
        }

        Balance::find($balance->id)->update([
            'balance' => $updatedBalance
        ]);

        History::create([
            'user_id' => Auth::user()->id,
            'bill_id' => User::find(Auth::user()->id)->bill->where('bill_type_id', 1)->pluck('bill_type_id')->first(),
            'total' => $totalBills
        ]);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balance $balance)
    {
        //
    }
}
