<?php

namespace edgewizz\unwat\Controllers;
use App\Http\Controllers\Controller;
use Edgewizz\Unwat\Models\UnwatAns;
use Edgewizz\Unwat\Models\UnwatQues;
use Illuminate\Http\Request;

class UnwatController extends Controller
{
    //
    public function test(){
        dd('hello');
    }
    public function store(Request $request){
        $unwatQ = new UnwatQues();
        $unwatQ->question = $request->question;
        $unwatQ->subject_id = $request->subject_id;
        $unwatQ->topic_id = $request->topic_id;
        $unwatQ->sub_topic_id = $request->subtopic_id;
        $unwatQ->question_level_id = $request->question_level_id;
        $unwatQ->question_format_id = $request->question_format_id;
        $unwatQ->question_sub_format_id = $request->question_sub_format_id;
        $unwatQ->save();
        /* answer1 */
        if($request->answer1){
            $ans1 = new UnwatAns();
            $ans1->question_id = $unwatQ->id;
            $ans1->answer = $request->answer1;
            $ans1->arrange = $request->arrange1;
            $ans1->save();
        }
        /* answer1 */
        /* answer2 */
        if($request->answer2){
            $ans2 = new UnwatAns();
            $ans2->question_id = $unwatQ->id;
            $ans2->answer = $request->answer2;
            $ans2->arrange = $request->arrange2;
            $ans2->save();
        }
        /* answer2 */
        /* answer3 */
        if($request->answer3){
            $ans3 = new UnwatAns();
            $ans3->question_id = $unwatQ->id;
            $ans3->answer = $request->answer3;
            $ans3->arrange = $request->arrange3;
            $ans3->save();
        }
        /* answer3 */
        /* answer4 */
        if($request->answer4){
            $ans4 = new UnwatAns();
            $ans4->question_id = $unwatQ->id;
            $ans4->answer = $request->answer4;
            $ans4->arrange = $request->arrange4;
            $ans4->save();
        }
        /* answer4 */
        /* answer5 */
        if($request->answer5){
            $ans5 = new UnwatAns();
            $ans5->question_id = $unwatQ->id;
            $ans5->answer = $request->answer5;
            $ans5->arrange = $request->arrange5;
            $ans5->save();
        }
        /* answer5 */
        /* answer6 */
        if($request->answer6){
            $ans6 = new UnwatAns();
            $ans6->question_id = $unwatQ->id;
            $ans6->answer = $request->answer6;
            $ans6->arrange = $request->arrange6;
            $ans6->save();
        }
        /* answer6 */
        /* answer7 */
        if($request->answer7){
            $ans7 = new UnwatAns();
            $ans7->question_id = $unwatQ->id;
            $ans7->answer = $request->answer7;
            $ans7->arrange = $request->arrange7;
            $ans7->save();
        }
        /* answer7 */        
        /* answer8 */
        if($request->answer8){
            $ans8 = new UnwatAns();
            $ans8->question_id = $unwatQ->id;
            $ans8->answer = $request->answer8;
            $ans8->arrange = $request->arrange8;
            $ans8->save();
        }
        /* answer8 */
        /* answer9 */
        if($request->answer9){
            $ans9 = new UnwatAns();
            $ans9->question_id = $unwatQ->id;
            $ans9->answer = $request->answer9;
            $ans9->arrange = $request->arrange9;
            $ans9->save();
        }
        /* answer9 */
        /* answer10 */
        if($request->answer10){
            $ans10 = new UnwatAns();
            $ans10->question_id = $unwatQ->id;
            $ans10->answer = $request->answer10;
            $ans10->arrange = $request->arrange10;
            $ans10->save();
        }
        /* answer10 */
        
        return back();
    }
    public function edit($id, Request $request){
        
    }

    public function uploadFile(Request $request)
    {
            $file = $request->file('file');
            // dd($file);
            // File Details
            $filename = time().$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            // Valid File Extensions
            $valid_extension = array("csv");
            // 2MB in Bytes
            $maxFileSize = 2097152;
            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'uploads';
                    // Upload file
                    $file->move($location, $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                        $num = count($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        if($i == 0){
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    // Insert to MySQL database
                    foreach ($importData_arr as $importData) {
                        $insertData = array(
                                "question" => $importData[1],
                                "answer1" => $importData[2],
                                "arrange1" => $importData[3],
                                "answer2" => $importData[4],
                                "arrange2" => $importData[5],
                                "answer3" => $importData[6],
                                "arrange3" => $importData[7],
                                "answer4" => $importData[8],
                                "arrange4" => $importData[9],
                                "answer5" => $importData[10],
                                "arrange5" => $importData[11],
                                "answer6" => $importData[12],
                                "arrange6" => $importData[13],
                                "answer7" => $importData[14],
                                "arrange7" => $importData[15],
                                "answer8" => $importData[16],
                                "arrange8" => $importData[17],
                            );
                            // var_dump($insertData['answer1']); 
                            /*  */
                            if($insertData['question']){
                                $fill_Q = new UnwatQues();
                                $fill_Q->question = $insertData['question'];
                                $fill_Q->save();
                                
                                if($insertData['answer1'] == '-'){
                                }else{
                                    $f_Ans1 = new UnwatAns();
                                    $f_Ans1->question_id = $fill_Q->id;
                                    $f_Ans1->answer = $insertData['answer1'];
                                    $f_Ans1->arrange = $insertData['arrange1'];
                                    $f_Ans1->save();
                                }
                                if($insertData['answer2'] == '-'){
                                }else{
                                    $f_Ans2 = new UnwatAns();
                                    $f_Ans2->question_id = $fill_Q->id;
                                    $f_Ans2->answer = $insertData['answer2'];
                                    $f_Ans2->arrange = $insertData['arrange2'];
                                    $f_Ans2->save();
                                }
                                if($insertData['answer3'] == '-'){
                                }else{
                                    $f_Ans3 = new UnwatAns();
                                    $f_Ans3->question_id = $fill_Q->id;
                                    $f_Ans3->answer = $insertData['answer3'];
                                    $f_Ans3->arrange = $insertData['arrange3'];
                                    $f_Ans3->save();
                                }
                                if($insertData['answer4'] == '-'){
                                }else{
                                    $f_Ans4 = new UnwatAns();
                                    $f_Ans4->question_id = $fill_Q->id;
                                    $f_Ans4->answer = $insertData['answer4'];
                                    $f_Ans4->arrange = $insertData['arrange4'];
                                    $f_Ans4->save();
                                }
                                if($insertData['answer5'] == '-'){
                                }else{
                                    $f_Ans5 = new UnwatAns();
                                    $f_Ans5->question_id = $fill_Q->id;
                                    $f_Ans5->answer = $insertData['answer5'];
                                    $f_Ans5->arrange = $insertData['arrange5'];
                                    $f_Ans5->save();
                                }
                                if($insertData['answer6'] == '-'){
                                }else{
                                    $f_Ans6 = new UnwatAns();
                                    $f_Ans6->question_id = $fill_Q->id;
                                    $f_Ans6->answer = $insertData['answer6'];
                                    $f_Ans6->arrange = $insertData['arrange6'];
                                    $f_Ans6->save();
                                }
                                if($insertData['answer7'] == '-'){
                                }else{
                                    $f_Ans7 = new UnwatAns();
                                    $f_Ans7->question_id = $fill_Q->id;
                                    $f_Ans7->answer = $insertData['answer7'];
                                    $f_Ans7->arrange = $insertData['arrange7'];
                                    $f_Ans7->save();
                                }
                                if($insertData['answer8'] == '-'){
                                }else{
                                    $f_Ans8 = new UnwatAns();
                                    $f_Ans8->question_id = $fill_Q->id;
                                    $f_Ans8->answer = $insertData['answer8'];
                                    $f_Ans8->arrange = $insertData['arrange8'];
                                    $f_Ans8->save();
                                }
                                
                            }
                            /*  */
                        }
                    // Session::flash('message', 'Import Successful.');
                } else {
                    // Session::flash('message', 'File too large. File must be less than 2MB.');
                }
            } else {
                // Session::flash('message', 'Invalid File Extension.');
            }
        return back();
    }
}
