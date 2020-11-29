@extends('layouts.app')

@section('content')
    <div id="gameZone">
    <div class="d-flex justify-content-center bg-secondary mb-5">
        <div>
            <h3><span>{{$question->question}}</span></h3>
        </div>
    </div>
    <div>
        @foreach($question->answers as $answer)
            <button correct="{{$answer->correct_answer}}" class="col-3 bg-light"><span
                    class="answer">{{$answer->answer}}</span></button>
        @endforeach
    </div>
    </div>
@endsection

@push('bottom_js')
    <script>

        $('button').on('click', function () {
            var i = sessionStorage.getItem("i")??0;
            var point = sessionStorage.getItem("point")??0;
            var param = sessionStorage.getItem("param")??'';
            sessionStorage.setItem("i", 1+parseInt(i))
            sessionStorage.setItem("param", param+','+{{$question->id}});
            if($(this).attr('correct') == 1){
                $(this).addClass('bg-success');
                $(this).removeClass('bg-light');
                sessionStorage.setItem("point", parseInt(point)+{{$question->point}});
            }else{
                $(this).addClass('bg-danger');
                $(this).removeClass('bg-light');
                $("button[correct=1]").addClass('bg-success');
                $("button[correct=1]").removeClass('bg-light');
            }

            $('button').prop('disabled', true);

            if(i >= 4) {console.log(point,'ifi mej');

                var result = sessionStorage.getItem('point');
                sessionStorage.clear()
                // sessionStorage.removeItem('param');
                // sessionStorage.removeItem('i');
                // sessionStorage.removeItem('point');
                updateRecord(result);
                setTimeout(function () {

                    $('#gameZone').text('your point '+ result)
                }, 2000);


            }else{console.log(i,'else mej');
                setTimeout(function () {
                    location.href = "start?ids=" + sessionStorage.getItem("param")
                }, 1000);
            }
        })

        function updateRecord(result) {console.log(result)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: "user-record",
                data: {
                    record:result
                },
                success: function(data) {
                    console.log(data);
                    return data;
                },
                error: function(data){
                    console.log("Error: " + data);
                },
            });
        }
    </script>
@endpush
