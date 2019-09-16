<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ItemController extends Controller {

  public function insertform() {

      return view('examination');
  }

    public function insert (Request $request) {

        $user_id = $request->input('user_id');
        $yearBirth = $request->input('yearBirth');
        $symptoms = $request->input('symptoms');
        $description = $request->input('description');
        $doctor_id = $request->input('doctor_id');

        $data = array('user_id'=>$user_id, 'yearBirth'=>$yearBirth, 'symptoms'=>$symptoms, 'description'=>$description, 'doctor_id'=>$doctor_id);

        DB::table('examination')->insert($data);

        return redirect()->to('/home');

    }


    
}
