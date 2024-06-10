<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'tell_first' => ['required', 'numeric','digits_between:1,5'],
            'tell_second' => ['required', 'numeric','digits_between:1,5'],
             'tell_third' => ['required', 'numeric','digits_between:1,5'],
            'address' => ['required', 'max:255'],
            'category_id' => ['required'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

     public function messages()
    {

        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell_first.required' => '電話番号を入力してください',
            'tell_first.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell_first.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell_second.required' => '電話番号を入力してください',
            'tell_second.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell_second.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell_second.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell_third.required' => '電話番号を入力してください',
            'tell_third.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell_third.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問合せの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',

        ];
    }
}
