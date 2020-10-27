@extends('layout')
        @include('includes.navbar')
        @include('galiry')
        @section('content')
            <div class="description">
                <h1 id="frsthead">My Programming languages</h1>
                <div class="name">Java</h1>
                <div class="name">CSS</h1>
                <div class="name">JavaScript</h1>
                <div class="name"><strong class="intro">PHP: </strong>{{$framework}}</div>
                <div class="name"><p class="intro">HTML </p></div>
                <div class="name"><p class="intro">MySql </p></div>
            </div>
        @endsection