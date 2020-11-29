<?php
$url = "";
$route = "store";
$quest = '';
if (!empty($question)) {
    $id = $question->id;
    $quest = $question->question;
    $answers = $question->answers;
    $point = $question->point;
    $route = "update";
}

?>

<form action="{{route("admin.questions.$route",$id??"")}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="{{$quest?'put':'post'}}" />
    <div>
        <div><label for="question">{{__("question")}}</label></div>
        <input class="w-100" type="text" id="question" name="question" value="{{old('question')??($quest??'')}}">
        @if($errors->has('question'))
            <div class="error">{{ $errors->first('question') }}</div>
        @endif
    </div>
    @if(!empty($answers))
        @foreach($answers as $key => $answer)
            @php
                $chacked = $answer->correct_answer?'checked':'';
            @endphp
            <div>
                <div><label for="answer_" .$key>{{__("answer".($key+1))}}</label></div>
                <input class="w-100" type="text" id="answer_" .$key name="answers[][answer]"
                       value="{{old('answer')??($answer->answer)}}">
                <input type="radio" value="{{$key}}" name="answers[correct_answer]" {{$chacked}}>
                @if($errors->has('answer'))
                    <div class="error">{{ $errors->first('answer') }}</div>
                @endif
            </div>
        @endforeach
    @else
        <div id="answers">
            <div class="answer_div">
            <div><label for="answers">{{__("answer")}}</label></div>
            <input class="w-75" type="text" id="answer" name="answers[][answer]"
                   value="{{old('answers')?old('answers')[0]['answer']:""}}">
                <input type="radio" value="0" name="answers[correct_answer]">
            </div>
            @if($errors->has('answers'))
                <div class="error">{{ $errors->first('answers') }}</div>
            @endif
            @if($errors->has('answers.correct_answer'))
                <div class="error">{{ $errors->first('answers.correct_answer') }}</div>
            @endif
        </div>
        <div>
            <button type="button" id="add_answer">{{__('add answer')}}</button>
            <button type="button" id="removeAnswer">remove</button>
        </div>
    @endif
    <div>
        <div><label for="point">{{__("point")}}</label></div>
        <input class="w-50" type="number" id="point" name="point" value="{{old('point')??($point??'')}}">
    @if($errors->has('point'))
            <div class="error">{{ $errors->first('point') }}</div>
        @endif
    </div>
    <div>
        <button type="submit">submit</button>
    </div>


</form>
<style>
    .error {
        color: red;
    }
</style>
@push('bottom_js')
    <script !src="">
        $( document ).ready(function() {
            var scntDiv = $('#answers');
            var i = $('#answers div.answer_div').length+ 1;
            $('#add_answer').on('click', function () {
                $('<div class="answer_div_'+i+'">' +
                    '<input class="w-75" type="text" id="answer_' + i + '" name="answers[][answer]" value="{{old('answer')}}"> <input type="radio" value=1 name="answers[correct_answer]"></div>'
                    /*'<label for="answers"><input type="text" id="answer_' + i + '" size="20" name="answers[]" value="" placeholder="Input Value" /></label>'*/ +
                    '</div>').appendTo(scntDiv);
                i++;
                console.log(i);
                return false;
            });

            $('#removeAnswer').on('click', function () {
                if (i > 2) {
                    $('.answer_div_'+(i-1)).remove();
                    i--;
                }
                return false;
            });
        });
    </script>
@endpush

