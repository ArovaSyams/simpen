<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Balance;
use App\Models\BillType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('billing', [
            'billTypes' => BillType::all(),
            'bills' => User::find(Auth::user()->id)->bill
        ]);
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
    public function store(StoreBillRequest $request)
    {
        $pocket = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();
        $updatedPocket = $pocket - $request->nominal;
        
        $balance = Balance::where('user_id', Auth::user()->id)->first();
        $balance->pocket_money = $updatedPocket;
        $balance->save();

        Bill::create([
            'user_id' => Auth::user()->id,
            'bill_type_id' => $request->billTypeId,
            'nominal' => $request->nominal
        ]);
        
        return redirect('billing');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $pocket = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();
        $updatedPocket = $pocket - $request->nominal;
        
        $balance = Balance::where('user_id', Auth::user()->id)->first();
        $balance->pocket_money = $updatedPocket;
        $balance->save();

        $bill = Bill::find($request->billId);
        $bill->nominal = $request->nominal;
        $bill->save();

        return redirect('billing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
