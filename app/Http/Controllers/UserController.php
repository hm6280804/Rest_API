<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        // $user = User::find(1);
        // $user = DB::table('users')->limit(1)->offset(1)->get();
        $user = DB::table('users')
                ->select(['users.*', 'Role'])
                ->join('roles', 'users.id', '=', 'roles.id')
                ->get();
        return $user;
    }
}
