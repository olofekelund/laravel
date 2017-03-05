<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
        return view('log.list', ['logs' => Log::where('status', '!=', 'closed')->paginate(15)]);
    }

    function store(Request $request) {
        $this->validate($request, [
            'description' => 'required',
            'email' => 'required',
            'device_id' => 'required'
        ]);

        $log = new Log;

        $log->user_id = User::where('email', '=', $request->email)->first()->id;
        $log->device_id = $request->device_id;
        $log->description = $request->description;
        $log->status = 'pending';

        $log->save();

        $request->session()->flash('flash_message', 'Saved new log!');

        return redirect('log/');
    }

    function create()
    {
        return view('log.create');
    }

    function edit($id)
    {
        return view('log.edit', ['log' => Log::find($id)]);
    }

    function update($id, Request $request) {
        $log = Log::findOrFail($id);

        $this->validate($request, [
            'description' => 'required',
            'status' => 'required'
        ]);

        $log->fill($request->all())->save();
        $request->session()->flash('flash_message', 'Saved log!');

        return redirect('log/');
    }
}
