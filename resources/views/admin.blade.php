@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Pregled svih ordinacija, doktora i zakazanih termina </div>

                 <div class="card-body">
                     @if (session('status'))
                         <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                     @endif


                    <?php



                      $yearBirth = DB::table('examination')->pluck('yearBirth');
                      $symptoms = DB::table('examination')->pluck('symptoms');
                      $description = DB::table('examination')->pluck('description');
                      $doctor_id = DB::table('examination')->pluck('doctor_id');
                      $item_id = DB::table('examination')->pluck('id');
                      $user_id = DB::table('examination')->pluck('user_id');
                  

                      $size = sizeof($yearBirth);
                    
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
                            
                            $doctorName = DB::table('users')->where('id', $doctor_id[$i])->pluck('name');
                            $doctorNameSubstring = substr($doctorName, 2, -2);
                            print($doctorNameSubstring);
                            print("  ||  ");
                            print("Ime osobe koja se naručila na pregled:  ");
                            
                            $orderPerson = DB::table('users')->where('id', $user_id[$i])->pluck('name');
                            $orderPersonSubstring = substr($orderPerson, 2, -2);
                            print($orderPersonSubstring);

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
