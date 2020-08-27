@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code')
  <img src="/images/sad-marx.png" alt="you made marx angry" height="400px" width="400px">
@endsection

@section('message', 'We're having issues. Sorry for any inconvenience.')
