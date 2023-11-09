<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainermodel;
class trainercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer= trainermodel::all();

      return view('showalltrainer',['trainers'=>$trainer]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'Trainer_Name'=> 'required|string',   
               'Trainer_Batch'=> 'required|string',
        ]);

        $post = new trainermodel();
        $post->Trainer_Name = $request->Trainer_Name;
        $post->Trainer_Batch = $request->Trainer_Batch;
        $post->save();

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        $trainer = trainermodel::find($id);
        return view('traineredit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            't_name' => 'required',
            't_batch' => 'required',
        ]);
    
        $post = trainermodel::find($id);
        $post->Trainer_Name = $request->t_name;
        $post->Trainer_Batch = $request->t_batch;
        $post->save();

    
        return redirect()->route('trainer_list')->with('success', 'Item updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trainerdelete= trainermodel::find($id);
        $trainerdelete->delete();
        return redirect()->route('trainer_list');
          
    }
}
