<?php

namespace App\Http\Controllers;

use App\Models\Monthly;
use App\Http\Requests\StoreMonthlyRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Http\Requests\UpdateMonthlyRequest;
use App\Models\Balance;
use App\Models\MonthlyType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MonthlyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        return view('monthly', [
            'monthlies' => User::find(Auth::user()->id)->monthly,
            'monthlyTypes' => MonthlyType::where('monthly_type', '!=', 'default')->get(),
            'pocketMoney' => User::find(Auth::user()->id)->balance->first(),
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
    public function store(StoreMonthlyRequest $request)
    {
        $pocketMoney = User::find(Auth::user()->id)->balance->first();
        $updatedPocketMoney = $pocketMoney->pocket_money - $request->nominal;

        $monthlies = User::find(Auth::user()->id)->monthly;
        foreach ($monthlies as $monthly) {
            if ($request->monthlyType == $monthly->monthly_type_id) {
                
                $pocket = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();
                $alocation = User::find(Auth::user()->id)->monthly->where('monthly_type_id', $request->monthlyType)->first();

                $selisih = $alocation->nominal - $request->nominal;
                $updatedPocket = $pocket + $selisih;
                
                $updatePocket = Balance::where('user_id', Auth::user()->id)->first();
                $updatePocket->pocket_money = $updatedPocket;
                $updatePocket->save();

                $monthly = User::find(Auth::user()->id)->monthly->where('monthly_type_id', $request->monthlyType)->first();
                $monthly->nominal = $request->nominal;
                $monthly->save();

                return redirect('monthly');

            }
        }


        Balance::find(Auth::user()->id)->update([
            'pocket_money' => $updatedPocketMoney
        ]);

        Monthly::create([
            'user_id' => Auth::user()->id,
            'monthly_type_id' => $request->monthlyType,
            'nominal' => $request->nominal
        ]);

        return redirect('monthly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monthly $monthly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monthly $monthly)
    {
        //
    }

    public function editMonthly(StoreMonthlyRequest $request) 
    {
        $pocket = User::find(Auth::user()->id)->balance->pluck('pocket_money')->first();
        $alocation = User::find(Auth::user()->id)->monthly->where('monthly_type_id', $request->monthlyType)->first();

        $selisih = $alocation->nominal - $request->nominal;
        $updatedPocket = $pocket + $selisih;
        
        $updatePocket = Balance::where('user_id', Auth::user()->id)->first();
        $updatePocket->pocket_money = $updatedPocket;
        $updatePocket->save();

        $monthly = User::find(Auth::user()->id)->monthly->where('monthly_type_id', $request->monthlyType)->first();
        $monthly->nominal = $request->nominal;
        $monthly->save();

        return redirect('monthly');
    }

    public function updatePocket(UpdateBalanceRequest $request) 
    {
        $balance = Balance::find($request->balanceId)->first();
        $updatedPocket = $balance->pocket_money - $request->nominal;
        $updatedBalance = $balance->balance - $request->nominal;

        Balance::find($request->balanceId)->update([
            'balance' => $updatedBalance,
            'pocket_money' => $updatedPocket
        ]);

        return redirect('monthly');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonthlyRequest $request, Monthly $monthly)
    {   
        $getBalance = User::find(Auth::user()->id)->balance->pluck('balance')->first();
        // $getNominal = Monthly::find($request->monthlyId)->pluck('nominal')->first();
        $getNominal = Monthly::where('id', $request->monthlyId)->pluck('nominal')->first();

        $updatedBalance = $getBalance - $request->nominal;
        $updatedMonthly = $getNominal - $request->nominal;
        
        $balance = Balance::where('user_id', Auth::user()->id)->first();
        $balance->balance = $updatedBalance;
        $balance->save();

        $monthly = Monthly::find($monthly->id);
        $monthly->nominal = $updatedMonthly;
        $monthly->save();

        return redirect('monthly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monthly $monthly)
    {
        //
    }
}
