<div>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fmt_box{
            margin: 10px 20px;
            padding: 10px 20px;
            border: 4px solid #eeeeee;
            background: #fff;
            box-shadow: 2px 4px 8px #b1b1b1;
        }
        .fmt_headline{
            font-size: 20px;
            margin:10px 0;
        }
        .fmt_label{
            font-size: 14px;
        }
        .fmt_input{
            padding:4px 10px;
            border:1px solid #707070;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }
        .fmt_sub_btn{
            padding:6px 20px;
            margin:10px 0;
            border-radius: 8px;
            background:#0047d4;
            color:#fff;
            border:none;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .fmt_checkbox{
            width: 22px;
            height: 22px;
            display: block;
        }
        .fmt_flex{
            display: flex;
            margin: 10px 0;
        }
        #addOption{
            padding: 6px 20px;
            background: #049e04;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <form action="{{route('fmt.unwat.store')}}" method="post" class="fmt_box">
        <div class="fmt_headline" style="text-align: center; background:#f2f2f2;color:#3e5569; padding: 10px; font-weight: 500; text-transform:uppercase;">ADD NEW Unjumble words QUESTION</div>
        <div class="my-2 flex flex-wrap -mx-2">
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Subject</label>
                @php $subjects = DB::table('subjects')->get(); @endphp
                <select name="subject_id" id="subject_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Subject --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Topic</label>
                <select name="topic_id" id="topic_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Topic --</option>
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Sub Topic</label>
                <select name="subtopic_id" id="subtopic_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Sub Topic --</option>
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Question Level</label>
                @php $question_levels = DB::table('question_levels')->get(); @endphp
                <select name="question_level_id" id="question_level_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Question Level --</option>
                    @foreach ($question_levels as $q_level)
                        <option value="{{$q_level->id}}">{{$q_level->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Question Sub Format</label>
                <select name="question_sub_format_id" id="question_sub_format_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Question Sub Format --</option>
                    @php $subFormats = DB::table('question_sub_formats')->where('question_format_id', 3)->get();  @endphp
                    @foreach ($subFormats as $q_level)
                        <option value="{{$q_level->id}}">{{$q_level->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
        </div>
        <div>
            <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" class="fmt_label" for="">Question</label>
            <textarea class="w-full my-2 border border-gray-500 rounded p-2 relative" name="question" id="" cols="30" rows="4" placeholder="Question" required></textarea>
        </div>
        <hr>
        {{-- answer1-arrange1 --}}
    <div id="blocks">{{-- blocks --}}
        <div class="flex flex-wrap">
            <div class="w-2/4 px-2">
                <label class="text-xs font-bold text-gray-600 my-2 block" for="">Word 1</label>
                <input class="w-full border border-gray-400 rounded mb-2 px-2 py-1" type="text" name="answer1" placeholder="Answer 1" required>
            </div>
            <div class="w-1/4 px-2">
                <label class="text-xs font-bold text-gray-600 my-2 block" for="">Order for word 1</label>
                <input class="w-full border border-gray-400 rounded mb-2 px-2 py-1" type="text" name="arrange1" placeholder="Order for word 1" required>
            </div>
            <div class="w-1/4 px-2">
                <div></div>
                <button  id="add1" onclick="addBlock(2)" class="text-white font-bold text-xl bg-blue-600 rounded-xl w-8 h-8 block mt-8">+</button>
            </div>
        </div>
    </div>{{-- blocks --}}
        {{-- //answer2-arrange2 --}}
        <div>
            <input type="submit" class="fmt_sub_btn" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
</div>
<div class="my-12 py-4 px-4 border border-gray-400 shadow-lg">
    <div>Import csv</div>
    <form class="flex" action="{{route('fmt.unwat.csv_upload')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <input type="file" name="file" required>
        <button type="submit" style="display: inline-block; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
    </form>
</div>

<script>
    var blocks = document.getElementById('blocks');
    function addBlock(i,e){
        e = e || window.event;
        var target = e.target;
        target.style.display = 'none';
        if(i > 2 ){
            target.previousSibling.style.display = 'none';
        }
        // console.log(target.previousSibling);
        var question = '';
        question += '<div class="flex flex-wrap" id="block'+i+'">';
        question += '<div class="w-2/4 px-2">';
        question += '<label class="text-xs font-bold text-gray-600 my-2 block" for="">Word '+i+'</label>';
        question += '<input class="w-full border border-gray-400 rounded mb-2 px-2 py-1" type="text" name="answer'+i+'" placeholder="Answer '+i+'">';
        question += '</div>';
        question += '<div class="w-1/4 px-2">';
        question += '<label class="text-xs font-bold text-gray-600 my-2 block" for="">Order for word '+i+'</label>';
        question += '<input class="w-full border border-gray-400 rounded mb-2 px-2 py-1" type="text" name="arrange'+i+'" placeholder="Order for word '+i+'">';
        question += '</div>';
        question += '<div class="w-1/4 px-2 flex">';
        question += '<button id="rem'+i+'" onclick="remBlock('+i+')" class="text-white font-bold text-xl bg-red-600 rounded-xl w-8 h-8 block mt-8">-</button>';
        question += '<button id="add'+i+'" onclick="addBlock('+(i+1)+')" class="ml-2 text-white font-bold text-xl bg-blue-600 rounded-xl w-8 h-8 block mt-8">+</button>';
        question += '</div>';
        question += '</div>';
        blocks.innerHTML += question;
    }
    function remBlock(i){
        var block = document.getElementById('block'+i);
        var rem = document.getElementById('rem'+(i-1));
        var add = document.getElementById('add'+(i-1));
        if(i > 2){
            rem.style.display = 'block';
        }
            add.style.display = 'block';
        block.innerHTML = '';
    }
    // var formatSelect = document.getElementById('question_format_id');
    // formatSelect.addEventListener('change', function(){
    //     var base_url = window.location.origin;
    //     var send_url = base_url+'/fmt_fillupmulti/get-sub-question-format/'+formatSelect.value;
    //     let xhr = new XMLHttpRequest();
    //     xhr.open('GET', send_url, true);
    //     xhr.onload = function(){
    //         var list = document.querySelector('#question_sub_format_id');
    //         var subs = JSON.parse(this.responseText);
    //         var output = '';
    //         if(subs.length > 0){
    //             output += '<option>Select a Sub Format</option>';
    //             for(var i in subs){
    //             output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
    //             }
    //         } else{
    //             output += '<option> -- No Sub Format Found --</option>';
    //         }				
    //         list.innerHTML = output;
    //     }
    //     xhr.send();
    // });

    var topicSelect = document.getElementById('topic_id');
    topicSelect.addEventListener('change', function(){
        var base_url = window.location.origin;
        var send_url = base_url+'/fmt_fillupmulti/getsubtopics/'+subjectSelect.value;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', send_url, true);
        xhr.onload = function(){
            var list = document.querySelector('#subtopic_id');
            var subs = JSON.parse(this.responseText);
            var output = '';
            if(subs.length > 0){
                output += '<option>Select a Sub Topic</option>';
                for(var i in subs){
                output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
                }
            } else{
                output += '<option> -- No Sub Topic Found --</option>';
            }				
            list.innerHTML = output;
        }
        xhr.send();
    });
    /*  */
    var subjectSelect = document.getElementById('subject_id');
    subjectSelect.addEventListener('change', function(){
        var base_url = window.location.origin;
        var send_url = base_url+'/fmt_fillupmulti/getTopics/'+subjectSelect.value;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', send_url, true);
        xhr.onload = function(){
            var list = document.querySelector('#topic_id');
            var subs = JSON.parse(this.responseText);
            var output = '';
            if(subs.length > 0){
                output += '<option>Select a Topic</option>';
                for(var i in subs){
                output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
                }
            } else{
                output += '<option> -- No Topic Found --</option>';
            }				
            list.innerHTML = output;
        }
        xhr.send();
        });
</script>
