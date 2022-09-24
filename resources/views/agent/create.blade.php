@extends('agentpanel')
@section('agent')
<div class="">
    <div class="row">
        <div class="card-body">
            <h2 class="title">Agent Invitation Form</h2><br>

            <form id="basic-form" enctype="multipart/form-data" method="post">
                
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
                            <input id="agent_email" required name="agent_email" type="text" class="form-control" id="pwd">
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Phone</label>
                            <input name="agent_phone" type="text" class="form-control" id="pwd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Alternative Contact</label>
                            <input name="alternative_contact" type="text" class="form-control" id="pwd">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Select Country</label>
                            <select onchange="get_branch_by_country()" id="country" name="country" class="form-control" id="sel1">
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
                            <select id="branch_id" name="branch_id" class="form-control" id="sel1">
                                <option value=""></option>
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">State</label>
                            <input name="state" type="text" class="form-control" id="pwd">
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">City</label>
                            <input name="city" type="text" class="form-control" id="pwd">
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
                            <textarea class="form-control" name="address" rows="3"></textarea>
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Logo</label>
                            <input name="logo" type="file" class="form-control" id="pwd">
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Agent Background Color</label>
                            <input id="color" class="form-control" type="text" name="agent_bg_color">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Nationality</label>
                            <input class="form-control" type="text" name="nationality">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Nid or Passport</label>
                            <input class="form-control" type="text" name="nid_or_passport">
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
                            <input class="form-control" type="text" name="company_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Registration Number</label>
                            <input class="form-control" type="text" name="company_registration_number">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Trade License</label>
                            <input class="form-control" type="file" name="company_trade_license">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Trade License Number</label>
                            <input class="form-control" type="text" name="company_trade_license_number">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="pwd">Company Establish Date</label>
                            <input class="form-control" type="date" name="company_establish_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Number Of Employee</label>
                            <input class="form-control" type="text" name="company_number_of_employee">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Email</label>
                            <input class="form-control" type="text" name="company_email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Phone</label>
                            <input class="form-control" type="text" name="company_phone">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-7">
                        <div class="form-group">
                        <label for="pwd">Company Country</label>
                        <select name="company_country" class="form-control" id="sel1">
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
                            <input class="form-control" type="text" name="company_state">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company City</label>
                            <input class="form-control" type="text" name="company_city">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Zipcode</label>
                            <input class="form-control" type="text" name="company_zip_code">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Company Address</label>
                            <textarea class="form-control" name="company_address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection