<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\InputFilter;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
{
    protected $user;


    function _construct(){
     $this->user = new User();
    }
    public function save(Request $request){

        //validation Rulles
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'username'   => 'required|min:6',
            'password'   => 'required|min:6',
            'email'      => 'required'
        ]);
        $paqrameters = ($request->only('first_name','last_name','username','password','email'));
       User::create($paqrameters);
    }
}
