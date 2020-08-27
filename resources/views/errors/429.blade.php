@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code')
  <img src="/images/angry-marx.png" alt="you made marx angry" height="400px" width="400px">
@endsection

@section('message', 'Too much of what you're doing. You're making too many requests. Stop that.")
