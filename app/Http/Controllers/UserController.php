<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Industries;
use App\Models\Roles;
use App\Models\UserIndustries;
use App\Models\UserRoles;
use App\Models\UserViews;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * The variable to use paginate count
     *
     * @var string
     */
    protected $paginate = '5';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Roles::pluck('name', 'id');
        $industries = Industries::pluck('name', 'id');
        $sortable = $this->sortable();
        
        $users = User::query();
        $users->join('user_roles', 'user_roles.user_id', '=', 'users.id');
        $users->join('user_industries', 'user_industries.user_id', '=', 'users.id');

        $users->join('roles', 'user_roles.role_id', '=', 'roles.id');
        $users->join('industries', 'user_industries.industry_id', '=', 'industries.id');

        $users->leftJoin('user_views', 'user_views.user_id', '=', 'users.id');

        $users->select(
                'users.id', 'users.email', 
                'users.mobile', 'users.profile_score', 
                'roles.name as role', 'industries.name as industry',
                DB::raw("COALESCE(SUM(user_views.views), 0) as views")
            );
        
        $users->groupBy('users.id', 'user_industries.user_id', 'user_industries.industry_id');
        if(!empty($request->role)){
            $users->whereIn('roles.id', $request->role);
        }

        if($request->sortable == 'view_all'){
            $users->orderBy('views');
        }else if($request->sortable == 'score'){
            $users->having('views', '<=', 0);
            $users->orderBy('users.profile_score', 'desc');
        }else if($request->sortable == 'view'){
            $users->orderBy('views', 'desc');
        }else{
            $users->having('views', '<=', 0);
        }
        if(!empty($request->industry)){
            $users->whereIn('industries.id', $request->industry);
        }
        $users = $users->paginate($this->paginate);
        return view('users.index', compact('roles', 'industries', 'users', 'request', 'sortable'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $insert = array();
            foreach ($request->ids as $key => $id) {
                $temp = array();
                $temp = [
                    'user_id' => $id,
                    'views' => '1'
                ];
                UserViews::create($temp);
                // $insert[] = $temp;
            }
            // DB::insert('user_views', $insert); // this and also insert the record in bulk insert
            return response()->json(['success' => true]);
        }catch(Exception $e ){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * search the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    private function sortable()
    {
        return [
            '' => '--Select--',
            'view_all' => 'View All',
            'new_reg' => 'New Registered Members',
            'score' => 'Profile Score',
            'view' => 'View',
        ];
    }
}
