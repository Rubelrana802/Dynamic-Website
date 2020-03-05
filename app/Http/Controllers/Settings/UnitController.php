<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * UnitController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('id', 'desc')->paginate(10);
        return view('settings.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // generate code
        $code = str_pad(Unit::max('id') + 1, 4, '0', STR_PAD_LEFT);

        request()->validate([
            'unit_name' => ['required', 'string', 'max:100', 'unique:units'],
            'labels' => ['required', 'string', 'max:100'],
            'relations' => ['required', 'string', 'max:100'],
            'status' => ['required'],
        ]);

        $unit = Unit::create([
            'entry_by' => Auth::user()->id,
            'unit_name' => $request->input('unit_name'),
            'code' => $code,
            'labels' => $request->input('labels'),
            'relations' => $request->input('relations'),
            'status' => $request->input('status'),
        ]);

        if (!empty($unit->id)) {
            $notification = array(
                'message' => 'Unit add successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.settings.units.show', $unit->id)->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('settings.units.view', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('settings.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $this->validate($request, [
            'unit_name' => 'required|string|max:100|unique:units,unit_name,' . $unit->id,
            'labels' => 'required|string|max:100',
            'relations' => 'required|string|max:100',
            'status' => 'required',
        ]);

        $unit->unit_name = $request->get('unit_name');
        $unit->labels = $request->get('labels');
        $unit->relations = $request->get('relations');
        $unit->status = $request->get('status');
        $affected_row = $unit->save();

        if (!empty($affected_row)) {
            $notification = array(
                'message' => 'Unit update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.settings.units.show', $unit->id)->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }

    public function published_units()
    {
        return Unit::where('status', 1)->get();
    }

    public function unit_info($id)
    {
        $unit = Unit::where('id', $id)->first()->labels;
        return explode("/", $unit);
    }
}
