<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Agent\BecomeAgentRequest;
use Illuminate\Support\Facades\Http;

class AgentController extends Controller
{
    public function index(){

    }
    //create new agent from api call
    public function become_new_agent(){
        // $res = Http::get('http://127.0.0.1:8000/api/get-all-requested-agents')->body();
        // $dataval = json_decode($res);
        // dd($dataval->result->val->data);
        $data['page_title'] = 'Agent | Invite New';
        return view('agent/create',$data);
    }
}
