@extends('agentpanel')
@section('agent')
<style>
    label.error.fail-alert {
        border: 2px solid red;
        border-radius: 4px;
        line-height: 1;
        padding: 2px 0 6px 6px;
        background: #ffe6eb;
    }
    input.valid.success-alert {
        border: 2px solid #4CAF50;
        color: green;
    }
    
label {
  width: 300px;
  font-weight: bold;
  display: inline-block;
  margin-top: 20px;
}

label span {
  font-size: 1rem;
}

label.error {
    color: red;
    font-size: 1rem;
    display: block;
    margin-top: 5px;
}

label.error.fail-alert {
    border: 2px solid red;
    border-radius: 4px;
    line-height: 1;
    padding: 2px 0 6px 6px;
    background: #ffe6eb;
}
</style>
<div class="">
    <div class="row">
        <div class="card-body">
            <h2 class="title">Agent Invitation Form</h2><br>

            <form method="POST" action="http://127.0.0.1:8000/api/became-an-agent" id="basic-form" enctype="multipart/form-data">
                
                <div class="row col-md-12">
                    <h4>Basic Information</h4>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Name</label>
                            <input id="agent_name" required name="agent_name" type="text" class="form-control" id="pwd">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Email</label>
                            <input id="agent_email" required name="agent_email" type="email" class="form-control" id="pwd">
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Phone</label>
                            <input id="agent_phone" name="agent_phone" type="text" class="form-control" id="pwd" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Alternative Contact</label>
                            <input id="alternative_contact" name="alternative_contact" type="text" class="form-control" id="pwd" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Select Country</label>
                            <select onchange="get_branch_by_country()" id="country" name="country" class="form-control" required>
                                <option value="">--Select One--</option>
                                @forelse ($agentCountries->result->val as $agentCountry)
                                    <option value="{{ $agentCountry->name }}">{{ $agentCountry->name }}</option>
                                @empty
                                    <p>No Data Found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Select Branch</label>
                            <select id="branch_id" name="branch_id" class="form-control" required>
                                <option value=""></option>
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">State</label>
                            <input id="state" name="state" type="text" class="form-control" required>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">City</label>
                            <input id="city" name="city" type="text" class="form-control" required>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                              <p style="color: rgb(136, 21, 21)" class="card-text">If you don,t find any branch in your country. Just select the Country UK and main branch of this country.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Address</label>
                            <textarea id="address" class="form-control" name="address" rows="3" required></textarea>
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Logo</label>
                            <input name="logo" type="file" class="form-control">
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Agent Background Color</label>
                            <input id="color" class="form-control" type="text" name="agent_bg_color" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Nationality</label>
                            <input id="nationality" class="form-control" type="text" name="nationality" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Nid or Passport</label>
                            <input id="nid_or_passport" class="form-control" type="text" name="nid_or_passport" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <h4>Company Information</h4>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Name</label>
                            <input id="company_name" class="form-control" type="text" name="company_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Registration Number</label>
                            <input id="company_registration_number" class="form-control" type="text" name="company_registration_number" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Trade License</label>
                            <input id="company_trade_license" class="form-control" type="file" name="company_trade_license">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Trade License Number</label>
                            <input id="company_trade_license_number" class="form-control" type="text" name="company_trade_license_number" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="pwd">Company Establish Date</label>
                            <input id="company_establish_date" class="form-control" type="date" name="company_establish_date" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Number Of Employee</label>
                            <input id="company_number_of_employee" class="form-control" type="text" name="company_number_of_employee" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Email</label>
                            <input id="company_email" class="form-control" type="text" name="company_email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Phone</label>
                            <input id="company_phone" class="form-control" type="text" name="company_phone" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-7">
                        <div class="form-group">
                        <label for="pwd">Company Country</label>
                        <select name="company_country" class="form-control" id="company_country" required>
                            <option value="">--Select One--</option>
                            @foreach($getAllCountries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company State</label>
                            <input id="company_state" class="form-control" type="text" name="company_state" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company City</label>
                            <input id="company_city" class="form-control" type="text" name="company_city" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Zipcode</label>
                            <input id="company_zip_code" class="form-control" type="text" name="company_zip_code" required>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Company Address</label>
                            <textarea id="company_address" class="form-control" name="company_address" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="p-t-15">
                    <button id="submit" class="btn btn--radius-2 btn--blue">Submit</button>
                    <a onclick="loginCheck()" class="btn btn--radius-2 btn--blue">Login create</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection