<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User\UserCollection;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','role:admin']);
    }
    public function users(){
        $users = User::with('roles')->get();
        return response()->json([
            "status" => true,
            "result" => new UserCollection($users)
        ]);
    }
    public function switchUserRole(User $user){
        if($user->hasRole('receptionnist')){
            $user->removeRole('receptionnist');
        }else{
            $user->assignRole('receptionnist');
        }
        return response()->json([
            "status" => true,
            "message" => "Role has been switched succeffully !"
        ]);
    }
}
