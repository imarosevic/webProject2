@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Molim odaberite Vašu ulogu:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/roles">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <input type="hidden" name="user_id" value="<?php $user = Auth::user(); print($user->id); ?>">
                      <select name="role">
                        <option value=1>Administrator</option>
                        <option value=2>Doktor</option>
                        <option value=3>Korisnik usluge</option>
                      </select>
                      <br>
                      <br>
                      <input type="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
