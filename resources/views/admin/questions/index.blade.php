@extends("admin.layouts.app")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3>{{__('Questions')}}</h3>
            <a href="{{route("admin.questions.create")}}">{{__("Add Question")}}</a>
        </div>

        <div class="col-lg-12">
            @if(count($questions) > 0)
                <table class="table table-bordered" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th>question</th>
                        <th>answer</th>
                        <th>point</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->question}}</td>
                            <td>
                                @foreach($question->answers as $answer)
                                    <ul>
                                        <li>
                                            {{$answer->answer}}
                                        </li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>{{$question->point}}</td>
                            <td>
                                <div>
                                    <div>
                                        <a href="{{route('admin.questions.edit', $question->id)}}"><i
                                                class="fa fa-edit"></i>{{__('Edit')}}</a> |
                                        <button data-toggle="modal" data-target="#myModal{{$question->id}}"><i
                                                class="fa fa-trash-o"></i>{{__('Cancel')}}</button>
                                    </div>

                                    <!-- Modal -->
                                    <div id="myModal{{$question->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('Cancel')}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>

                                                </div>
                                                <div class="modal-body">
                                                    <p>{{__('Are you sure to cancel this item')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('admin.questions.delete', $question->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <div>
                                                            <button type="submit" data-dismiss="modal"
                                                                    class="btn-success">Close
                                                            </button>
                                                            <button type="submit" class="btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>{{__('question not found')}}</h3>
            @endif
        </div>
    </div>

    {{ $questions->links() }}
@endsection
