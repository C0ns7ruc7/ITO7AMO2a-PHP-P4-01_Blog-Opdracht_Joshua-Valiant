<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Task;

class LijstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbQuerry = DB::table('taken_lijst')->orderBy('time')->get();

        return view('lijst.index', compact('dbQuerry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lijst.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:128'
        ]);

        Task::create([
            'title'  => request('title'),
            'body'  => request('body'),
            'time'  => request('time')
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = DB::table('taken_lijst')->where('id', $id)->first();
        return view('lijst.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('taken_lijst')->where('id', $id)->first();
        return view('lijst.index', compact('edit'));
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
        DB::table('taken_lijst')->where('id', $id)->delete();

        $this->validate(request(), [
            'title' => 'required|max:128'
        ]);

        Task::create([
            'title'  => request('title'),
            'body'  => request('body'),
            'time'  => request('time')
        ]);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('taken_lijst')->where('id', $id)->delete();
        return $this->index();
    }
}
