<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class UsersController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = [
            0 => 'Ham3d', 1 => 'Ali', 2 => 'Akbar', 3 => 'Maryam',
        ];
    }

    /**
     * Display a listing of the resource.
     * Send GET Request to /api/v1/users
     *
     */
    public function index()
    {
        return Response::json([
            'users' => $this->users,
            // 200 here is Status code , it means we are ok!
        ], 200);
    }

    /**
     * Add new Item
     * send Post Request to : /api/v1/users
     * insert Request Parameters: named=mohammad
     */
    public function store(Request $request)
    {
        $this->users[] = $request->all()['name'];
        return Response::json(['users' => $this->users], 200);
    }

    /**
     * Display Specific User
     * Send Get request to /api/v1/users/X
     * x = user ID like : /api/v1/users/0 will return Ham3D
     */
    public function show($id)
    {
        return Response::json(['user' => $this->users[$id]], 200);
    }

    /**
     * Update User
     * sent PUT/PATCH Request to /api/v1/users/X
     * x: user id that you want to Update like : /api/v1/users/0 will update Ham3D
     * send Request Parametrs like : name='new name'
     *
     */
    public function update(Request $request, $id)
    {
        $this->users[$id] = $request->all()['name'];
        return Response::json(['users' => $this->users], 200);
    }

    /**
     * Remove user
     * send DELETE Request to /api/v1/users/X
     * x: user id to DELETE like: /api/v1/users/0 will delete Ham3D
     */
    public function destroy($id)
    {
        unset($this->users[$id]);
        return Response::json(['user' => $this->users], 200);
    }
}
