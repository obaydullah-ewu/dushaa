<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Event List";
        $data['subNavEventActiveCLass'] = 'active';
        $data['events'] = Event::paginate();
        return view('admin.event.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Event';
        $data['subNavEventActiveCLass'] = 'active';
        return view('admin.event.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'fee' => 'required',
            'registration_deadline' => 'required',
        ]);

        $item = new Event();
        $item->name = $request->name;
        $item->venue = $request->venue;
        $item->date = $request->date;
        $item->fee = $request->fee;
        $item->registration_deadline = $request->registration_deadline;
        $item->payment_details = $request->payment_details;
        $item->save();

        return redirect()->route('admin.event.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Event';
        $data['subNavEventActiveCLass'] = 'active';
        $data['event'] = Event::find($id);
        return view('admin.event.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'fee' => 'required',
            'registration_deadline' => 'required',
        ]);

        $item = Event::find($id);
        $item->name = $request->name;
        $item->venue = $request->venue;
        $item->date = $request->date;
        $item->fee = $request->fee;
        $item->registration_deadline = $request->registration_deadline;
        $item->payment_details = $request->payment_details;
        $item->save();

        return redirect()->route('admin.event.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
