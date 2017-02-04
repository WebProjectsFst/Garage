@extends('dashboard.dashboard_template')

@section('titre')
  Client Form
@endsection

@section('contenu')
  <br>
   <div class="col-sm-offset-2 col-sm-8">
       <div class="panel panel-info">
           <div class="panel-heading">Inscription à la lettre d'information</div>
           <div class="panel-body">
               {!! Form::open(['route' => 'postClient']) !!}
                   <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                       {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}
                       {!! $errors->first('email', '<small class="help-block">:message</small>') !!}<br>
                   </div>
                   <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                     {!! Form::text('nom', null, array('class' => 'form-control','placeholder' => 'Entrez votre nom')) !!}
                     {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                   </div>
                   {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
               {!! Form::close() !!}
           </div>
       </div>
   </div>
