<?php

namespace App\Http\Controllers;

use App\Member;
use App\WinningTicket;
use Illuminate\Http\Request;

class WinningNumberController extends Controller
{
    protected $winning_number, $member;

    public function __construct(WinningTicket $wt, Member $member)
    {
        $this->winning_number = $wt;
        $this->member = $member;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validate = $request->validate([
            'name' => 'required',
            'value.*' => 'unique:winning_numbers,value'
        ]);

        $member = $this->member::create($request->all());

        if ($member) {
            foreach($request->value as $key => $wn ) {
                $winning_number = new WinningTicket(['value' => $wn]);
                $member->winningTickets()->save($winning_number);
            }
        }

        return redirect('/')->with('status', 'Number submitted.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
