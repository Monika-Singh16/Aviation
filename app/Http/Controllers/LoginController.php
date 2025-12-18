<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Employee;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.auth.login'); // create this Blade view
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        //Attempt login using auth
        if(Auth::guard('employee')->attempt($credentials))
        {
        //    $request->session()->regenerate();       //prevent session fixation
           // Role-based redirect using role name
            // $roleName = Auth::user()->role->name; // assumes relationship is set
                
             $request->session()->regenerate();

            $user = Auth::guard('employee')->user();

             if (!$user->role) 
                {
                    Auth::guard('employee')->logout();
                    return redirect()->route('admin.login')->withErrors([
                        'email' => 'Your account does not have a valid role assigned.'
                    ]);
                }
            

        $roleName = $user->role->name;

            if ($roleName === 'Admin') 
                {
                return redirect()->route('admin.dashboard');
            } 
            elseif ($roleName === 'Employee') 
                {
                return redirect()->route('employee.dashboard');
            }
             else
             {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors([
                    'email' => 'Your account does not have a valid role.'
                ]);
            }


        //    //Role Based redirect by id
        //    $role_id = Auth::user()->role_id;

        //    if($role_id == 1)
        //    {
        //     return redirect()->route('admin.dashboard');
        //    }
        //    else{
        //     return redirect()->route('employee.dashboard');
        //    }
        }
        return back()->withErrors([
            'email'=> 'Invalid credentials.  Please try again.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Auth::logout();
         Auth::guard('employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}