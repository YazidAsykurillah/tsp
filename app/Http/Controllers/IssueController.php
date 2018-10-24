<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreIssueRequest;

//Events
use Event;
use App\Events\RepairmentIsCompleted;

use App\Issue;
use App\Item;
use App\User;
use App\Repairment;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('issue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueRequest $request)
    {
        $newIssue = new Issue;
        $newIssue->code = "ISSUE-".time();
        $newIssue->item_id = $request->item_id;
        $newIssue->description = $request->description;
        $newIssue->reporter_id = \Auth::user()->id;
        $newIssue->save();
        return redirect('issue')
        	->with('successMessage', "Kerusakan / Kendala berhasil dilaporkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        return view('issue.show')
            ->with('issue', $issue);
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


    public function delete(Request $request)
    {
    	$issue = Issue::findOrFail($request->issue_id);
    	$issue->delete();
    	return redirect('issue')
    		->with('successMessage', "Issue berhasil dihapus");
    }

    public function registerRepairment(Request $request)
    {
        $issue = Issue::findOrFail($request->issue_id);
        $pic = User::findOrFail($request->pic_id);
        
        //create the repairment
        $newRepairment = new Repairment;
        $newRepairment->code = "FIX-".$issue->code;
        $newRepairment->issue_id = $issue->id;
        $newRepairment->pic_id = $pic->id;
        $newRepairment->save();

        //update issue status to processing;
        $issue->status = 'processing';
        $issue->save();
        return redirect()->back()
            ->with('successMessage', "Berhasil mendaftarkan perbaikan");


    }

    public function completeRepairment(Request $request)
    {
        

        $repairment = Repairment::findOrFail($request->repairment_id);
        $repairment->is_completed = TRUE;
        $repairment->action = $request->action;
        $repairment->save();

        Event::fire(new RepairmentIsCompleted($repairment));
        return redirect()->back()
            ->with('successMessage', "Perbaikan telah diselesaikan");
    }
}
