<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomarRequest extends FormRequest
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
           
            'photo' => 'required_without:id|mimes:jpg,jpeg,png,pdf',
           
            'name' => 'required|string|max:191',
            'name_com' => 'required',
            'num_pt' => 'required',
            'mobile' => 'required|unique:customars,mobile,'.$this -> id,
            'edate' => 'required',
           
            'num_se' => 'required',
            'city_id' => 'required|exists:cities,id',
            'item_id' => 'required|exists:items,id',
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            'num_ta' => 'required',
            'num_pz' => 'required',
            'password'  => 'required|confirmed|min:8'
            
            
            
            
            
           
           
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => trans('validation.requierd'),
            
            'name.string' => 'أسم ألمعمل يجب أن يكون أحرف وليس ارقام',
            
            
            'max' => '  يجب أن لا يزيد عن 191 حرف'
            
            
        ];
    }

}
