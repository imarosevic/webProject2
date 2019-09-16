@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Popis zakazanih pregleda</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <br><br>

                    <?php
                      $user = Auth::user();
                      $userID = $user->id;
                    ?>

                    <?php
                      $yearBirth = DB::table('examination')->where('doctor_id', $userID)->pluck('yearBirth');
                      $symptoms = DB::table('examination')->where('doctor_id', $userID)->pluck('symptoms');
                      $description = DB::table('examination')->where('doctor_id', $userID)->pluck('description');
                      $user_id = DB::table('examination')->where('doctor_id', $userID)->pluck('user_id');
                      $item_id = DB::table('examination')->where('doctor_id', $userID)->pluck('id');



                      $size = sizeof($yearBirth);
                      //print($tasks);
                      if($yearBirth != ""){
                        for($i=0; $i<$size; $i++){
                            print("Godina rođenja ");
                            print($yearBirth[$i]);
                            print("  ||  ");
                            print("Simptomi: ");
                            print($symptoms[$i]);
                            print("  ||  ");
                            print("Opis bolesti: ");
                            print($description[$i]);
                            print("  ||  ");
                            print("Ime doktora: ");
                            $newString = $user_id[$i];
                            //print($user_id[$i]);
                            $userName = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                            $userNameSubstring = substr($userName, 2, -2);
                            print($userNameSubstring);
                      

                            
                            
                            print("<br><br>");
                        }

                        
                      } else {
                        
                      }
                      if($yearBirth == "[]"){
                        print("Nemate zakazanih pregleda");
                      }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
