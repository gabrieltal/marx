@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code')
  <img src="/images/angry-marx.png" alt="you made marx angry" height="400px" width="400px">
@endsection

@section('message', 'We are having issues. We are sorry for any inconvenience. Please try again later.')
