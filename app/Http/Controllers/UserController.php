<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $result = "created";
        if ($user = User::whereEmail($request['email'])->first()){

            $user->update($request->all());
            $result = "updated";

        } else {
            $user = User::create($request->all());
        }
        return view('create-user', ['user' => $user, 'createResult'=>$result]);
    }
}
