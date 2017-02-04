@extends('dashboard.dashboard_template')

@section('titre')
  Client ajouter!!
@endsection
@section('contenu')

    <br>

    <div class="col-sm-offset-3 col-sm-6">

        <div class="panel panel-info">

            <div class="panel-heading">Inscription à la lettre d'information</div>
            <?php
              echo(Session::get('employee')->NSS);
            ?>
            <form class="" action="removeSession" method="post">
              {{ csrf_field() }}
              <button type="submit" name="button">Remove Session</button>
            </form>
            <div class="panel-body">

                Merci. Votre adresse a bien été prise en compte.

            </div>

        </div>

    </div>

@endsection
