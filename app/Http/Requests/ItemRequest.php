<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'codeNo' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'instock' => 'required',
            'discount' => 'required',
            'category_id' => 'required'
            //
        ];
    }
// ကြိုက်တဲ့ဘာသာစကား‌ေပြာင်းလို့ရသည် messages() ကို သုံးပေးရမည်
    public function messages(){
        return[
            'codeNo.required' => 'CodeNo ဖြည့်ဖို့ လိုအပ်ပါပါသည်',
            'name.required' => 'CodeNo ဖြည့်ဖို့ လိုအပ်ပါပါသည်',
        ];
    }
}
