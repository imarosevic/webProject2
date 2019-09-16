<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class RoleController extends Controller {

  public function insertform() {

      return view('roles');
  }

    public function insert (Request $request) {

        $role = $request->input('role');
        $user_id = $request->input('user_id');

        $data = array('role'=>$role, 'user_id'=>$user_id);

        DB::table('roles')->insert($data);

        return redirect()->to('/home');

    }
}
