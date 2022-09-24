<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Agent\BecomeAgentRequest;
use Illuminate\Support\Facades\Http;
use App\Traits\Service;
use Intervention\Image\Facades\Image;

class AgentController extends Controller
{
    use Service;
    public function index(){

    }
    //create new agent from api call
    public function become_new_agent(){
        $getBranchCountry = Http::get(env('API_DATA_HOST').'get-country-list-for-became-agent')->body();
        $data['agentCountries'] = json_decode($getBranchCountry);
        $data['page_title'] = 'Agent | Invite New';
        $data['getAllCountries'] = Service::getAllCountries();
        return view('agent/create',$data);
    }
    //get branch by country 
    public function get_branch_by_country($country_name=NULL){
        if(!$country_name){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Country Name Not Found!'
            );
            return response()->json($data,200);
        }
        $getBranchData = Http::get(env('API_DATA_HOST').'get-branch-list-for-became_agent/'.$country_name)->body();
        $getBranch = json_decode($getBranchData);
        //dd($getBranch->result->val);
        $select = '';
        $select .= '<option>--Select One--</option>';
        foreach($getBranch->result->val as $row){
            $select .= '<option value="'.$row->id.'">'.$row->branch_name.'</option>';
        }
        $data['result'] = array(
            'key'=>200,
            'val'=>$select
        );
        return response()->json($data,200); 
    }
    //post become agent data 
    public function become_new_agent_post(BecomeAgentRequest $request){
        $response = Http::attach('company_trade_license',file_get_contents($request->file('company_trade_license')->getRealPath()),$request->file('company_trade_license')->getClientOriginalName())->post(env('API_DATA_HOST').'became-an-agent', [
            'branch_id' => $request->branch_id,
            'agent_name' => $request->agent_name,
            'agent_email' => $request->agent_email,
            'agent_phone' => $request->agent_phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'alternative_contact' => $request->alternative_contact,
            'nid_or_passport' => $request->nid_or_passport,
            'nationality' => $request->nationality,
            'agent_bg_color' => $request->agent_bg_color,
            //'logo' => $request->file('logo'),
            'company_name' => $request->company_name,
            'company_registration_number' => $request->company_registration_number,
            //'company_trade_license' => $request->file('company_trade_license'),
            'company_trade_license_number' => $request->company_trade_license_number,
            'company_establish_date' => $request->company_establish_date,
            'company_number_of_employee' => $request->company_number_of_employee,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_zip_code' => $request->company_zip_code,
            'company_city' => $request->company_city,
            'company_state' => $request->company_state,
            'company_country' => $request->company_country,
        ])->body();
        //$response = Http::post(env('API_DATA_HOST').'became-an-agent');
        return response()->json($response);
    }
}
