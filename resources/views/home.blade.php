@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dobro došli</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Uspješno ste prijavljeni.
                    <br>
                    <br>
                    <?php
                      $user = Auth::user();
                      $user_id = $user->id;
                    
                      $role = DB::table('roles')->where('user_id', $user_id)->pluck('role');
                      //print($role);
                      if($role != "[]"){
                        if($role[0] == "1"){
                          print("Registirani ste kao administrator.");
                        } else {
                          print(" ");
                        }
                        if($role[0] == "2"){
                          print("Registirani ste kao Doktor.");
                        } else {
                          print(" ");
                        }
                        if($role[0] == "3"){
                          print("Registirani ste kao korisnik usluge.");
                        } else {
                          print(" ");
                        }
                      } else {
                        print("Kliknite za odabir uloge.");

                        print("<br><br>");
                        print("<div class=\"col-md-0 offset-md-0\">");
                        print("<a href='/roles' class=\"btn btn-secondary\">");
                        print("Odaberi ulogu");
                        print("</a>");
                        print("</div>");


                      }

                      //print($role[0]);
                      print("<br><br>");
                     ?>

                    <?php
                      if($role != "[]"){
                        if($role[0] == "2"){
                          print("<a class=\"btn btn-secondary\" href='/jobs'> Pogledaj prijavljene preglede </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>
                    <?php
                      if($role != "[]"){
                        if($role[0] == "3"){
                          print("<a class=\"btn btn-secondary\" href='/examination'> Zakaži pregled  </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>
                    <br><br>

                    <?php
                      if($role != "[]"){
                        if($role[0] == "3"){
                          print("<a class=\"btn btn-secondary\" href='/failures'> Pogledaj zakazane preglede </a>");
                        } else {
                          print(" ");
                        }
                      } else {
                        print(" ");
                      }

                    ?>

                    <?php

                    if($role != "[]"){
                      if($role[0] == "1"){
                        print("<a class=\"btn btn-secondary\" href='/admin'> Pogledaj popis ordinacija, korisnika usluga i zakazanih pregleda  </a>");
                      } else {
                        print(" ");
                      }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
