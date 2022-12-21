<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function __construct(){
        $this-> middleware(function($request, $next){
            if (Gate::allows('manage-users')) return $next($request);

            abort(403,'Anda Tidak memiliki Hak Akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(request()->ajax()) {
        //     $users = \App\User::query();
        //     return DataTables::of($users)
        //         ->addColumn('action', function ($users) {
        //             return view('users.action', [
        //                 'users' => $users,
        //                 'url_edit' => route('users.edit', $users->id),
        //                 'url_destroy' => route('users.destroy', $users->id)
        //             ]);
        //         })
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }
        $post=DB::table('users')->get();
        return view('users.index',['users'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "nim" => "required|unique:users",
            "kelas" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:5|max:35",
        ])->validate();

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->nim = $request->get('nim');
        $new_user->roles = json_encode(['VOTER']);
        $new_user->kelas = $request->get('kelas');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->status = "BELUM";

        $new_user->save();
        return redirect()->route('users.create')->with('status', 'User successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "nim" => "required",
            "kelas" => "required",
            "email" => "required|email",
        ])->validate();

        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->nim = $request->get('nim');
        $user->kelas = $request->get('kelas');
        $user->email = $request->get('email');

        $user->save();
        return redirect()->route('users.index')->with('status', 'User successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User successfully Deleted');
    }
}
