@extends('layouts.master')

@section('title','laravel')

@section('konten')
{{ Auth::user()->name }}
@endsection