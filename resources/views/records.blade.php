@extends('layouts.app')
@section('content')
        <div class="col-lg-12">
            @if(count($users) > 0)
                <table class="table table-bordered" style="margin-top: 20px">
                    <tr>
                        <th>N</th>
                        <th>{{__('User Name')}}</th>
                        <th>{{__('Record')}}</th>
                    </tr>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$user->first_name}}
                                </td>
                                <td>{{$user->record}}</td>
                            </tr>
                        @endforeach
                </table>
            @else
                <h3>{{__('question not found')}}</h3>
            @endif
        </div>
@endsection
