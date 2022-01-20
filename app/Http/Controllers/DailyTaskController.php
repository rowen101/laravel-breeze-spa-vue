<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DailyTask;
use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DailyTask::all();
        return Inertia::render('DailyTask', ['data' => $data]);
    }

    public function listdailytask()
    {
        $id = Auth::id();
        // $data = DailyTask::all()->where('user_id', $id);
        $data = DB::table("core_daily_tasks")
            ->join("core_options", "core_options.id", "=", "core_daily_tasks.type")
            ->select("core_daily_tasks.*", "core_options.name")
            ->where("core_daily_tasks.user_id", $id)
            ->orderBy("id", 'DESC')->get();
        return response()->json($data, 200);
    }
    public function isoptiontype()
    {
        $dboption = Options::where('soptiontype', 'ticket')->get(['id', 'name']);
        return response()->json($dboption, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$id = Auth::id();
        $db = new DailyTask;
        $request->validate([
            //'user_id' => 'required',
            // 'week' => 'required',
            // 'site' => 'required',
            // 'district' => 'required',
            // 'ticket' => 'required',
            // 'type' => 'required',
            // 'subject' => 'required',
            // 'raisedby' => 'required',
            // 'position' => 'required',
            // 'department' => 'required',
            // 'days' => 'required',
            // 'hitmiss' => 'required',
            // 'status' => 'required',
            // 'sla' => 'required',
            // 'remarks' => 'required'
        ]);
        //$db->user_id = auth()->user()->id;
        // $db->user_id = $id;
        $db->store($request->all());
        return response()->json($db, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ispublish(Request $request, $id)
    {
        $db =  DailyTask::find($id);

        $db->publish = 1;

        $db->store($request->all());
        return response()->json($db, 200);
    }
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
        //
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
        $db =  DailyTask::find($id);
        $request->validate([

            'week' => 'required',
            'site' => 'required',
            'district' => 'required',
            'subject' => 'required',
            'raisedby' => 'required',
            'days' => 'required',


        ]);
        $db->user_id = auth()->user()->id;
        $db->store($request->all());
        return response()->json($db, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = DailyTask::find($id);
        $db->delete();
        return response()->json($db, 200);
    }
}
