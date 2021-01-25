<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'people_id' => ['required', 'integer'],
            'headware' => ['required', 'string'],
            'mainpic' => ['required', 'string'],
            'secondpic' => ['required', 'string'],
            'thirdpic' => ['required', 'string'],
            'require_rank' => ['required', 'string'],
            'voice_chat' => ['required'],
            'message' => ['nullable', 'string', 'max: 100'],
            'psid' => ['required', 'string', 'max: 20']
        ];
    }

    public function attributes()
    {
        return [
           'hoge' => 'ほげ',
       ];
    }

    public function messages()
    {
        return [
           'hoge.required' => ':attributeは入力必須です。',
           'hoge.min'      => ':attributeは最低10文字以上で入力してください。',
           'hoge.max'      => ':attributeは最高20文字までしか入力できません。',
       ];
    }
}
