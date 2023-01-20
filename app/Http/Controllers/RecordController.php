<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Room;
use Illuminate\Http\Request;

/**
 * Class RecordController
 * @package App\Http\Controllers
 */
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::paginate();

        return view('record.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * $records->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new Record();
        $rooms = Room::selectRaw('id, concat(room_no, " (Level - ", level, ")") as room')->orderBy('level')->orderBy('room_no')->pluck('room', 'id')->toArray();
        return view('record.create', compact('record', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Record::$rules);


        if ($request->hasFile('file')) {
            $filename = 'file-' .  time() . '.' . $request->file->getClientOriginalExtension();
            $folder = public_path('records');
            $request->file->move($folder, $filename);
        }
        $data = $request->only('title', 'room_id');
        $data['file'] = 'records/' . $filename;
        $record = Record::create($data);

        return redirect()->route('record.index')
            ->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);

        return view('record.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);
        $rooms = Room::selectRaw('id, concat(room_no, " (Level - ", level, ")") as room')->orderBy('level')->orderBy('room_no')->pluck('room', 'id')->toArray();

        return view('record.edit', compact('record', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Record $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        request()->validate(Record::$rules);


        if ($request->hasFile('file')) {
            if (file_exists($record->file)) {
                unlink($record->file);
            }
            $filename = 'file-' .  time() . '.' . $request->file->getClientOriginalExtension();
            $folder = public_path('records');
            $request->file->move($folder, $filename);
        }
        $data = $request->only('title', 'room_id');
        $data['file'] = 'records/' . $filename;

        $record->update($data);

        return redirect()->route('record.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $record = Record::find($id);

        if (file_exists($record->file)) {
            unlink($record->file);
        }
        $record->delete();
        return redirect()->route('record.index')
            ->with('success', 'Record deleted successfully');
    }
}
