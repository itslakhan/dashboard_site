<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\membermodel;
    use App\Models\trainermodel;


    class membercontroller extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $members = membermodel::with('trainer')->get();
            $trainers= trainermodel::all();
            return view('member', compact('members', 'trainers'));
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
                'member_Name'=> 'required|string',
                 'member_phone'=> 'required|string',
                 'trainer_id'=> 'required|',
          ]);
  
          $post = new membermodel();
          $post->member_name = $request->member_Name;
          $post->member_phone = $request->member_phone;
          $post->trainer_id= $request->trainer_id;
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
        public function edit(string $id)
        {
            $member = membermodel::find($id);
            return view('memberedit',compact('member'));
    
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request,  $id)
        {
            $request->validate([
            
                'm_name' => 'required',
                'm_phone' => 'required',
            ]);
        
            $post = membermodel::find($id);
            $post->member_name = $request->m_name;
            $post->member_phone = $request->m_phone;
            $post->save();
    
        
            return redirect()->route('member_list')->with('success', 'Item updated successfully.');
        }
        
        

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $member = membermodel::find($id);
            $member = $member->delete();
            return back();
        }
    }
