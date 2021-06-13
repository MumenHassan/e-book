<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublsihHouseRequest;
use App\Models\PublishingHouse;
use Illuminate\Http\Request;

class PublishingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishing_houses = PublishingHouse::withCount('books')->whenSearch(\request()->search)->paginate(5);
        return view('dashboard.publishing_houses.index',compact('publishing_houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.publishing_houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublsihHouseRequest $request)
    {

        PublishingHouse::create($request->all());
        session()->flash('success','Publishing house added successfully');
        return redirect()->route('dashboard.publishing-houses.index');
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
    public function edit(PublishingHouse $publishing_house)
    {
        return view('dashboard.publishing_houses.edit',compact('publishing_house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublishingHouse $publishingHouse)
    {
        $publishingHouse->update($request->all());
        session()->flash('success','Publishing house updated successfully');
        return redirect()->route('dashboard.publishing-houses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublishingHouse $publishingHouse)
    {
        $publishingHouse->delete();
        session()->flash('success','Publishing house deleted successfully');
        return redirect()->route('dashboard.publishing-houses.index');
    }
}
