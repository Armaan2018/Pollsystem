<?php

namespace App\Http\Controllers\Poll;

use App\Http\Controllers\Controller;
use App\Models\PollAnswer\PollAnswer;
use App\Models\PollAnswer\PollAnswern;
use App\Models\PollOption\PollOption;
use App\Models\PollQuestion\PollQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    public function createQuestion(Request $request)
    {

        $question = new PollQuestion();
        $question->poll_question_topic = $request->poll_question_topic;
        $question->poll_question_objective = $request->poll_question_objective;
        $question->user_unique_id = $request->user_unique_id;
        $question->save();
    }
    public function createOption(Request $request)
    {

        $option = new PollOption();
        $option->poll_question_id = $request->poll_question_id;
        $option->poll_option = $request->poll_option;
        $option->save();
    }

    public function getSetAll($poll)
    {
        $data = PollOption::join('poll_questions', 'poll_questions.poll_question_id', '=', 'poll_options.poll_question')->where('poll_options.poll_question', $poll)->get();

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function setAnswer(Request $request)
    {

        $answer = DB::table('poll_answers')->insert([
            'poll_selected_option' => $request->poll_selected_option,
            'poll_answerd_by' => $request->poll_answerd_by,
        ]);
    }
    public function getResultUserWise($id)
    {
        $answer =  DB::table('poll_answers')->where('poll_answerd_by', $id)->join('poll_options', 'poll_options.poll_option_id', '=', 'poll_answers.poll_selected_option')->get();

        return response()->json(['success' => true, 'data' => $answer]);
    }

    public function getFinalResult($poll, $unique)
    {
        $options_table = DB::table('poll_options')->where()->get();
    }
}
