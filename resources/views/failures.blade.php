@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Vaši prijavljeni pregledi</div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif

                     <?php

                     $user = Auth::user();
                     //print($user->id);
                     // print("<br><br>");
                     $userID = $user->id;
                     //print($userID);

                       $yearBirth = DB::table('examination')->where('user_id', $userID)->pluck('yearBirth');
                       $symptoms = DB::table('examination')->where('user_id', $userID)->pluck('symptoms');
                       $description = DB::table('examination')->where('user_id', $userID)->pluck('description');
                       $doctor_id = DB::table('examination')->where('user_id', $userID)->pluck('doctor_id');
                       $item_id = DB::table('examination')->where('user_id', $userID)->pluck('id');
                       //print($item_id);

                       $size = sizeof($yearBirth);
                       //print($tasks);
                       if($yearBirth != ""){
                         for($i=0; $i<$size; $i++){
                             print("Godina rođenja: ");
                             print($yearBirth[$i]);
                             print("  ||  ");
                             print("Simptomi: ");
                             print($symptoms[$i]);
                             print("  ||  ");
                             print("Opis bolesti: ");
                             print($description[$i]);
                             print("  ||  ");
                             print("Ime doktora: ");
                             //print($doctor_id[$i]);
                             $doctorName = DB::table('users')->where('id', $doctor_id[$i])->pluck('name');
                             $doctorNameSubstring = substr($doctorName, 2, -2);
                             print($doctorNameSubstring);

                             

                             //print($doctorName[$i]);
                             // $userName = DB::table('examination')->where('doctor_id', $user_id[$i])->pluck('name');
                             // $userNameSubstring = substr($userName, 2, -2);
                             // print($userNameSubstring);
                             print("<br><br>");
                         }
                       } else {
       
                       }
                       if($yearBirth == "[]"){
                         print("Nemate prijavljenih pregleda");
                       } else {
                         print("");
                       }

                    ?>

                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
