@extends('agentpanel')
@section('agent')

<div class="">
    <div class="row">
        <div class="card-body">
            <h2 class="title">Agent Invitation Form</h2><br>

            <form enctype="multipart/form-data" action="{{ URL::to('become-new-agent-post') }}" method="post">
                @csrf
                <div class="row col-md-12">
                    <h4>Basic Information</h4>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Name</label>
                            <input value="{{ old('agent_name') }}" name="agent_name" type="text" class="form-control" id="pwd">
                            @if ($errors->has('agent_name'))
                                <span class="text-danger">{{ $errors->first('agent_name') }}</span>
                            @endif
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Email</label>
                            <input value="{{ old('agent_email') }}" name="agent_email" type="text" class="form-control" id="pwd">
                            @if ($errors->has('agent_email'))
                                <span class="text-danger">{{ $errors->first('agent_email') }}</span>
                            @endif
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Agent Phone</label>
                            <input value="{{ old('agent_phone') }}" name="agent_phone" type="text" class="form-control" id="pwd">
                            @if ($errors->has('agent_phone'))
                                <span class="text-danger">{{ $errors->first('agent_phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Alternative Contact</label>
                            <input value="{{ old('alternative_contact') }}" name="alternative_contact" type="text" class="form-control" id="pwd">
                            @if ($errors->has('alternative_contact'))
                                <span class="text-danger">{{ $errors->first('alternative_contact') }}</span>
                            @endif
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
                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Select Branch</label>
                            <select id="branch_id" name="branch_id" class="form-control" id="sel1">
                                <option value=""></option>
                            </select>
                            @if ($errors->has('branch_id'))
                                <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                            @endif
                          </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">State</label>
                            <input value="{{ old('state') }}" name="state" type="text" class="form-control" id="pwd">
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">City</label>
                            <input value="{{ old('city') }}" name="city" type="text" class="form-control" id="pwd">
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
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
                            <textarea class="form-control" name="address" rows="3">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
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
                            <input value="{{ old('agent_bg_color') }}" id="color" class="form-control" type="text" name="agent_bg_color">
                            @if ($errors->has('agent_bg_color'))
                                <span class="text-danger">{{ $errors->first('agent_bg_color') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Nationality</label>
                            <input value="{{ old('nationality') }}" class="form-control" type="text" name="nationality">
                            @if ($errors->has('nationality'))
                                <span class="text-danger">{{ $errors->first('nationality') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Nid or Passport</label>
                            <input value="{{ old('nid_or_passport') }}" class="form-control" type="text" name="nid_or_passport">
                            @if ($errors->has('nid_or_passport'))
                                <span class="text-danger">{{ $errors->first('nid_or_passport') }}</span>
                            @endif
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
                            <input value="{{ old('company_name') }}" class="form-control" type="text" name="company_name">
                            @if ($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Registration Number</label>
                            <input value="{{ old('company_registration_number') }}" class="form-control" type="text" name="company_registration_number">
                            @if ($errors->has('company_registration_number'))
                                <span class="text-danger">{{ $errors->first('company_registration_number') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Trade License</label>
                            <input class="form-control" type="file" name="company_trade_license">
                            @if($errors->has('company_trade_license'))
                                <span class="text-danger">{{ $errors->first('company_trade_license') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Trade License Number</label>
                            <input value="{{ old('company_trade_license_number') }}" class="form-control" type="text" name="company_trade_license_number">
                            @if($errors->has('company_trade_license_number'))
                                <span class="text-danger">{{ $errors->first('company_trade_license_number') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="pwd">Company Establish Date</label>
                            <input class="form-control" type="date" name="company_establish_date">
                            @if($errors->has('company_establish_date'))
                                <span class="text-danger">{{ $errors->first('company_establish_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Number Of Employee</label>
                            <input class="form-control" type="text" name="company_number_of_employee">
                            @if($errors->has('company_number_of_employee'))
                                <span class="text-danger">{{ $errors->first('company_number_of_employee') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Email</label>
                            <input class="form-control" type="text" name="company_email">
                            @if($errors->has('company_email'))
                                <span class="text-danger">{{ $errors->first('company_email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Company Phone</label>
                            <input class="form-control" type="text" name="company_phone">
                            @if($errors->has('company_phone'))
                                <span class="text-danger">{{ $errors->first('company_phone') }}</span>
                            @endif
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
                        @if($errors->has('company_country'))
                            <span class="text-danger">{{ $errors->first('company_country') }}</span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company State</label>
                            <input value="{{ old('company_state') }}" class="form-control" type="text" name="company_state">
                            @if($errors->has('company_state'))
                                <span class="text-danger">{{ $errors->first('company_state') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company City</label>
                            <input value="{{ old('company_city') }}" class="form-control" type="text" name="company_city">
                            @if($errors->has('company_city'))
                                <span class="text-danger">{{ $errors->first('company_city') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pwd">Company Zipcode</label>
                            <input value="{{ old('company_zip_code') }}" class="form-control" type="text" name="company_zip_code">
                            @if($errors->has('company_zip_code'))
                                <span class="text-danger">{{ $errors->first('company_zip_code') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pwd">Company Address</label>
                            <textarea class="form-control" name="company_address" rows="3">{{ old('company_address') }}</textarea>
                            @if($errors->has('company_address'))
                                <span class="text-danger">{{ $errors->first('company_address') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection