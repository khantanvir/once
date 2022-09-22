<?php

namespace App\Http\Requests\Agent;

use Illuminate\Foundation\Http\FormRequest;

class BecomeAgentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'agent_name'=>'required',
            'agent_email'=>'required|email',
            'agent_phone'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'alternative_contact'=>'required',
            'nid_or_passport'=>'required',
            'nationality'=>'required',
            'agent_bg_color'=>'required',
            'company_name'=>'required',
            'company_registration_number'=>'required',
            'company_trade_license'=>'required',
            'company_trade_license_number'=>'required',
            'company_establish_date'=>'required',
            'company_number_of_employee'=>'required',
            'company_phone'=>'required',
            'company_email'=>'required',
            'company_address'=>'required',
            'company_zip_code'=>'required',
            'company_city'=>'required',
            'company_state'=>'required',
            'company_country'=>'required',
        ];
    }
}
