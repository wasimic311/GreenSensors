<?php

namespace App\Http\Controllers;
use App\Models\Measure;

use Illuminate\Http\Request;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Measure::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['value' => 'required', 'humidity' => 'required']);
        return Measure::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Measure::find($id);
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
        $measure = Measue::find($id);
        $measure->update($request->all());
        return $measure;
    }
    /**
     * Search for a name.
     *
     * @param  int  $value
     * @return \Illuminate\Http\Response
     */
    public function search($value)
    {
        return Measure::where('value', 'like', '%'.$value.'%')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Measure::destroy($id);
    }
}
