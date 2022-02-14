<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'title'=>'required|max:40',
                'problem'=>'required|max:2000',
                'problemsolving'=>'required|max:2000',
                'execution'=>'required|max:2000',
                ];
    }
    public function messages ()
    {
         return[
            'title.required'=>'タイトルを入力してください',
            'title.max'=>'タイトルは40文字以下で入力してください',
            'problem.required'=>'起きている問題を入力してください',
            'problem.max'=>'起きている問題は2000文字以下で入力してください',
            'problemsolving.required'=>'問題解決するために試した事を入力してください',
            'problemsolving.max'=>'問題解決するために試した事は2000文字以下で入力してください',
            'execution.required'=>'問題について自分なりに考えた事を入力してください',
            'execution.max'=>'問題について自分なりに考えた事は2000文字以下で入力してください',
         ];
    }
}
