@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zakazivanje pregleda</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/examination">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <input type="hidden" name="user_id" value="<?php $user = Auth::user(); print($user->id); ?>">
                      <input type="text" name="yearBirth" placeholder="Godina rođenja"><br><br>
                      <input type="text" name="symptoms" placeholder="Simptomi"><br><br>
                      <input type="text" name="description" placeholder="Opis bolesti"><br><br>
                      Odaberite doktora:
                      <?php
                         $roles = DB::table('roles')->where('role', 2)->pluck('user_id');

                         $size = sizeof($roles);
                         
                         if($roles != ""){
                           for($i=0; $i<$size; $i++){
                              //$j = $roles[$i];
                             
                              $name = DB::table('users')->where('id', $roles[$i])->pluck('name');
                              $nameStripped = substr($name, 2, -2);
                              print("<br><br><input type=\"radio\" name=\"doctor_id\" value=\"");
                              print($roles[$i]);
                              print("\">--");
                              print($nameStripped);
                              print("--</a><br>");
                           }
                         } else {
                           print("Nema prijavljenih doktora");
                         }
                      ?>
                      <br>
                      <br>
                      <input type="submit" name="submit" class="btn btn-secondary" title="Zakaži pregled">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
