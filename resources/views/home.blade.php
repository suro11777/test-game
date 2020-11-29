@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-around  mb-4">
                            <div class="p-2 bg-success"><a style="color: black" href="{{route('game')}}">{{__('Start Game')}}</a></div>
                            <div class="p-2 bg-info"><a style="color: black" href="{{route('record')}}">{{__('Top 10 record')}}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
