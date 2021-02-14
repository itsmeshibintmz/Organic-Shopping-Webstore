<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
    
    public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        session()->flash('message', '<b>Nice!</b> You are now logged in');
        session()->flash('type', 'success');
        
        return redirect()->to('/games');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/games');
    }
}