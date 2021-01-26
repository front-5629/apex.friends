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
            'message' => ['required', 'string', 'max: 100'],
            'psid' => ['required', 'string', 'max: 20']
        ];
    }

    public function attributes()
    {
        return [
            'people_id' => 'people_id',
            'headware' =>  'ハードウェア',
            'mainpic' => 'キャラ優先度１',
            'secondpic' => 'キャラ優先度２',
            'thirdpic' => 'キャラ優先度３',
            'require_rank' => 'ランク',
            'voice_chat' => 'ボイスチャット',
            'message' => 'メッセージ',
            'psid' => 'ID'
       ];
    }

    public function messages()
    {
        return [
           'people_id' => 'プログラムエラー',
           'headware.required' =>  ':attributeは必須項目です',
           'mainpic.required' => ':attributeは必須項目です',
           'secondpic.required' => ':attributeは必須項目です',
           'thirdpic.required' => ':attributeは必須項目です',
           'require_rank.required' => ':attributeは必須項目です',
           'voice_chat.required' => ':attributeは必須項目です',

           'message.required' => ':attributeは必須項目です',
           'message.max' => ':attributeが100文字を超えています',

           'psid.required' => ':attributeは必須項目です',
           'psid.max' => ':attributeが20文字を超えています'
       ];
    }
}
