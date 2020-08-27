@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code')
  <img src="/images/angry-marx.png" alt="you made marx angry" height="400px" width="400px">
@endsection

@section('message', 'You do not have authorization.')
