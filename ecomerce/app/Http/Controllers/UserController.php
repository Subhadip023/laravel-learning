<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateUserRequest;
use Auth;
use Illuminate\Database\QueryException;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;

class UserController
{

    public function login (){
        return view('user.login');

    }
    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt(credentials: $credentials)) {
            return redirect()->intended('/')->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }    

public function logout(Request $request){
    Auth::logout();
    $request -> session()->invalidate();
    $request -> session()->regenerateToken();
    return redirect('/')->with('success','You have been logged out!');

}


    public function register (){
        return view('user.register');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        

        try {
            // Validate the request
            $validationData = $request->validated();
            // dd($validationData['hobbies']);
            $validationData['hobbies']= json_encode($validationData['hobbies']);
            // Create the user
            $user = User::create($validationData);
            Auth::login($user); 
            // Return a success message
            return redirect('/')->with('success', $validationData['name'] . ' registered successfully!');
           

        } catch (QueryException $e) {
            // Handle database-related exceptions
            return redirect()->back()->with('error', 'An error occurred while registering the user. Please try again.' );
       }   
    }
    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        return  " user id ";
    }


    public function index(){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to continue.');
        }
        
        if (auth()->user()->id !==$user->id && auth()->user()->role->name!=='Admin'){
            return redirect('/');
        }
    
        // Render the edit view for the user
        return view('user.edit-user', ['user' => $user]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $validationData = $request->validated();
        $user->name=$validationData['name'];
        if ($user->email!==$validationData['email']) {
            // $user->email=$validationData['email'];
            $user->email=$validationData['email'];

        }
        $user->Gender=$validationData['Gender'];
        $user->phone=$validationData['phone'];
        // dd($validationData['hobbies']);
        if ($request['hobbies']) {
            $user->hobbies=json_encode($validationData['hobbies']);
        }else{
            $user->hobbies=null;
        }
        if ($request['role']       ) {
            $user->role_id=$request['role'];
        }
        $user->save();

        if (auth()->user()->role->name=='Admin') {
            return redirect('/admin/users')->with('success', 'User file uploaded successfully!');
        } 
            return redirect('/')->with('success', 'User file uploaded successfully!');       
     
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role && $user->role->name=='Admin') {
            return redirect()->back()->with('error', "Can't delete as {$user->name} is a admin.");
        }

        $user->delete();
    
        return redirect()->back()->with('success', "{$user->name} deleted successfully.");
    }
    // this is for upload filepath in user table 
    public function uploadfile(Request $request, User $user)
    {
        $validateData = $request->validate([
            'userfile' => 'required|file|mimes:doc,docx,xlsx,pdf,jpg,png|max:2048', // max size 2 MB 
        ]);
    
        try {
            // Store the uploaded file
            $file = $request->file('userfile');
            $path = $file->store('userfiles', 'public');
    
            // Delete the previous 
            if ($user->filepath) {
                \Storage::disk('public')->delete($user->filepath);
            }
    
            $user->filepath = $path;
            $user->save();
    
            if (auth()->user()->role->name=='Admin') {
                return redirect('/admin/users')->with('success', 'User file uploaded successfully!');
            } 
                return redirect('/')->with('success', 'User file uploaded successfully!');       
         
            

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'File upload failed: ' . $e->getMessage());
        }
    }

    public function editUploadFile(User $user){
        return view('user.edit-user-file',['user'=>$user]);
    }
    public function deletefile(User $user){

        if ($user->filepath) {
            \Storage::disk('public')->delete($user->filepath);
        }
        $user -> filepath=null;
        $user->save();
        return redirect()->back()->with('succes','File delete succesfully!');

    }
    public function add_address_using_id(User $userid){

        return view('admin.add-user-address',['user'=>$userid]);
    }
    
    
}
