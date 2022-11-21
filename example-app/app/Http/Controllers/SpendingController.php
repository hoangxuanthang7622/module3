<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spendings = Spending::all();

        // dd($spendings->toArray());
        return view('spendings.index', compact('spendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spendings.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'date' => 'required',
            'money' => 'required|min:4',
            'note' => 'required'
        ], [
            'category.required'=>'Không được để trống',
            'date.required'=>'Không được để trống',
            'money.min'=>'Không lớn hơn .min',
            'note.required'=>'Không được để trống'
        ]);

        $spending = new Spending();
        $spending->category = $request->category;
        $spending->date = $request->date;
        $spending->money = $request->money;
        $spending->note = $request->note;

        $spending->save();
        return redirect()->route('spending.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spending = Spending::find($id);
    return view('Spendings.edit', compact ('spending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required',
            'date' => 'required',
            'money' => 'required|min:4',
            'note' => 'required'
        ], [
            'category.required'=>'Không được để trống',
            'date.required'=>'Không được để trống',
            'money.min'=>'Không lớn hơn .min',
            'note.required'=>'Không được để trống'
        ]);
        
        $spending = new Spending();
        $spending = Spending::find($id);
        $spending->category = $request->category;
        $spending->date = $request->date;
        $spending->money = $request->money;
        $spending->note = $request->note;

        $spending->save();

        return redirect()->route('spending.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spending = Spending::find($id);
        $spending->delete();
        return redirect()->route('spending.index');
    }
}
