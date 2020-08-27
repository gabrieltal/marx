@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code')
  <img src="/images/sad-marx.png" alt="you made marx angry" height="400px" width="400px">
@endsection

@section('message', 'Cannot find what you are looking for.')
