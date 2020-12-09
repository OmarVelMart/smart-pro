<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class UserController extends Controller
{
    

    public function index(){

        $users = User::all();
        
        return view('cat_users.user', compact('users'));
    }

    public function create(){
        return view('cat_users.create');
    }

}
