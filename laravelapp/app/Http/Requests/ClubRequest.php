<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
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
            'clubs_name' => ['required', 'string', 'max: 20'],
            'clubs_member' => ['required', 'integer', 'max: 30'],
            'clubs_headware' => ['required', 'string'],
            'require_rank' => ['required', 'string'],
            'voice_chat' => ['required'],
            'message' => ['required', 'string', 'max: 150'],
        ];
    }

    public function attributes()
    {
        return [
            'people_id' =>'people_id',
            'clubs_name' =>'クラブ名',
            'clubs_member' =>'メンバー数',
            'clubs_headware' =>'ハードウェア',
            'require_rank' =>'募集ランク',
            'voice_chat' =>'ボイスチャット',
            'message' =>'メッセージ'
        ];
    }

    public function messages()
    {
        return [
            'people_id' =>'プログラムエラー',

            'clubs_name.required' =>':attributeは必須項目です',
            'clubs_name.max' =>':attributeが20文字を超えています',

            'clubs_member.required' =>':attributeは必須項目です',
            'clubs_member.max' =>':attributeが30人を超えています',

            'clubs_headware.required' =>':attributeは必須項目です',
            'require_rank.required' =>':attributeは必須項目です',
            'voice_chat.required' =>':attributeは必須項目です',

            'message.required' =>':attributeは必須項目です',
            'message.max' =>':attributeが150文字を超えています'
        ];
    }
}
