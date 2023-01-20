<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class NotificationController
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function message()
    {
        $notifications = Notification::where('send_to', auth()->user()->id)->latest()->paginate();
        return view('notification.message', compact('notifications'));
    }
    public function index()
    {
        $notifications = Notification::paginate();

        return view('notification.index', compact('notifications'))
            ->with('i', (request()->input('page', 1) - 1) * $notifications->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notification = new Notification();
        $crs = User::where('user_type', 'CR')->selectRaw('id, CONCAT(name," (", batch, ")") as name')->pluck('name', 'id')->toArray();

        return view('notification.create', compact('notification', 'crs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Notification::$rules);
        $request['send_by'] = auth()->user()->id;
        $notification = Notification::create($request->all());

        return redirect()->route('notification.index')
            ->with('success', 'Notification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::find($id);

        return view('notification.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        $crs = User::where('user_type', 'CR')->selectRaw('id, CONCAT(name," (", batch, ")") as name')->pluck('name', 'id')->toArray();

        return view('notification.edit', compact('notification', 'crs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        request()->validate(Notification::$rules);

        $request['send_by'] = auth()->user()->id;
        $notification->update($request->all());

        return redirect()->route('notification.index')
            ->with('success', 'Notification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $notification = Notification::find($id)->delete();

        return redirect()->route('notification.index')
            ->with('success', 'Notification deleted successfully');
    }
}
