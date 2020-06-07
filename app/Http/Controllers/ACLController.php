<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use SCORPIO_Const;
use App\Http\Requests\ACLRequest;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CommonController;
use App\Repositories\Role\RoleRepositoryInterface;

class ACLController extends Controller
{
    public function __construct(
        CommonController $commonController,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->commonController = $commonController;
        $this->roleRepository = $roleRepository;
        $this->middleware('auth');
    }
    public function ACLlist(Request $request)
    {
        if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
        $roles = $this->roleRepository->getListRole()->paginate(15);
    	return view('admin.role.role-list', compact('i', 'roles'));
    }

    public function ACLCreate(Request $request, $id=null)
    {
        if ($id) {
            if (Gate::allows('ACL-detail', null) || Auth::user()->role_id == $id) {
            	$role = $this->roleRepository->getRole($id);
                if (!$role) {
                    return view('response.404');
                }
                $perm_id = $role->permissionRole($id);
                if($perm_id){
                    $perm_id = array_values(json_decode($perm_id->permission_id, true));
                }else{
                    $perm_id = [];
                }
                $permissions = DB::table('permissions')->get()->groupBy('group');
              	return view('admin.ACL.ACL-detail', compact('permissions', 'role', 'perm_id'));
            }else{
                return redirect()->route('admin-login');
            }
        }else{
            if (Gate::allows('ACL-create', null)) {
                $roles = DB::table('roles')->where('deleted_at', null)->where('id', '>', 0)->get();
                $permissions = DB::table('permissions')->get()->groupBy('group');
                return view('admin.ACL.ACL', compact('permissions', 'roles'));
            }else{
                return redirect()->route('admin-login');
            }
        }
    }

    public function postACLCreate(ACLRequest $request, $id = null)
    {
        $arr = $request->input('permission_id');
        $description = $request->input('description');
        $name = $request->input('name');
        if ($id) {
            $perm_id = json_encode($arr, JSON_FORCE_OBJECT);
            $data_1 = [
              'name' => $name,
              'description' => $description,
              'updated_at' => Carbon::now()
            ];
            DB::beginTransaction();
            try {
                $data_2 = [
                    'role_id' => $id,
                    'permission_id' => $perm_id
                ];
                $this->roleRepository->update($id, $data_1);
                DB::table('permission_role')->where('role_id', $id)->update($data_2);
                DB::commit();
                $logs = 'Update ACL';
                $logs_status = 1;
            }catch (Exception $e) {
                $logs = 'Update ACL'.$e->getMessage();
                $logs_status = 0;
                DB::rollBack();
            }
            $this->commonController->writeLogs($logs, $logs_status);
            return redirect()->back();
        }else{
            $role_id = $request->input('role_id');
        	if (!empty($role_id) && $role_id != NULL) {
                $this->insertPerm($arr, $role_id);
            }
            else{
                $role_id = DB::table('roles')->insertGetId([
                    'name' => $role_name,
                    'description' => $description,
                ]);
                $this->insertPerm($arr, $role_id);
                $logs = 'Insert ACL';
                $logs_status = 1;
            }
            $this->commonController->writeLogs($logs, $logs_status);
            return redirect()->route('role-list');
        }
    }

    private function insertPerm($arr, $role_id)
    {
        $perm_id = json_encode($arr, JSON_FORCE_OBJECT);
        $data = [
          'permission_id' => $perm_id,
          'role_id' => $role_id,
        ];
        DB::table('permission_role')->insert($data);
    }
    public function roleList(Request $request)
    {
        if (!$request->get('page')== 1) {
            $i = 1;
        }else{
            $i = ($request->get('page')-1)+1;
        }
        $roles = $this->roleRepository->getListRole()->paginate(15);
        return view('admin.role.role-list', compact('i', 'roles'));
    }
    public function roleCreate($id=null)
    {
        if ($id) {
            $role = $this->roleRepository->getRole($id);
            return view('admin.role.role-update', compact('role'));
        }else{
            return view('admin.role.role-create');
        }
    }
    public function postRoleCreate(Request $request, $id=null)
    {
        $request->validate([
            'name'=>'required|max:50',
            'description'=>'required|max:18',
        ],
        [
            'name.required'=>"Not be empty. Enter role name",
            'name.max'=>"Name max 50 character",
            'description.required'=>"Not be empty. Enter description",
            'description.max'=>"Description max 18 character",
        ]);
        $logs = '';
        $name = $request->input('name');
        $description = strip_tags($request->input('description'));
        if (empty($id)) {
            try {
                $data = [
                    'name' => $name,
                    'description' => $description,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
                $this->roleRepository->insert($data);

                $logs = 'Insert Role';
                $logs_status = 1;
            } catch (Exception $e) {
                $logs = 'Insert Role'.$e->getMessage();
                $logs_status = 0;
            }
            $this->commonController->writeLogs($logs, $logs_status);

            return redirect()->route('role-list');
        }else{
            try {
                $data = [
                    'name' => $name,
                    'description' => $description,
                    'updated_at' => Carbon::now()
                ];
                $this->roleRepository->update($id, $data);
                $logs = 'Update Role';
                $logs_status = 1;
            }catch (Exception $e) {
                $logs = 'Update Role'.$e->getMessage();
                $logs_status = 0;
            }
            $this->commonController->writeLogs($logs, $logs_status);

            return redirect()->route('role-list');
        }
    }
    public function roleDelete($id)
    {
        try {
            $data = [
                'deleted_at' => Carbon::now()
            ];
            $this->roleRepository->update($id, $data);
            $logs = 'Delete Role';
            $logs_status = 1;
        }catch (Exception $e) {
            $logs = 'Delete Role'.$e->getMessage();
            $logs_status = 0;
        }
        $this->commonController->writeLogs($logs, $logs_status);
        
        return redirect()->back();
    }
}
