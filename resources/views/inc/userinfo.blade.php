<div class="card">
    <div class="card-header">
        <span class='text-muted font-weight-bold'>USER INFORMATION</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ (!isset($user1->id) ? '' : url('/users/'.$user1->id)) }}">
            @method('PUT') 
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="nameview" type="text" class="form-control userinfo_label" value="{{  (!isset($user1->name) ? '' : $user1->name)}}" readonly>
                    <input id="name" type="text" class="form-control userinfo_disabled" name="name" value="{{ (!isset($user1->name) ? '' : $user1->name) }}" style='display:none' required>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="usernameview" type="text" class="form-control userinfo_label" value="{{ (!isset($user1->username) ? '' : $user1->username) }}" readonly >
                    <input id="username" type="text" class="form-control userinfo_disabled" name="username" value="{{ (!isset($user1->username) ? '' : $user1->username) }}" style='display:none' required>
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="emailview" type="text" class="form-control userinfo_label" value="{{ (!isset($user1->email) ? '' : $user1->email) }}" readonly>
                    <input id="email" type="email" class="form-control userinfo_disabled" name="email" value="{{ (!isset($user1->email) ? '' : $user1->email) }}" style='display:none'>
                </div>
            </div> --}}

            <div class="form-group row">                 
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <button id='' class='btn btn-secondary userinfo_label' disabled><i class="fas fa-key"></i> CHANGE PASSWORD</button>
                    <button type='button' id='cpassword_btn' class='btn btn-secondary userinfo_disabled' style='display:none'><i class="fas fa-key"></i> CHANGE PASSWORD</button>
                    <div id='cpassword' class='btn-group' style='display:none'>
                        {{-- <input id="passwordview" type="text" class="form-control userinfo_label" value="{{ (!isset($user1->email) ? '' : $user1->email) }}" readonly> --}}
                        <input id="password" type="password" class="form-control userinfo_disabled" name="password" value="{{ (!isset($user1->password) ? '' : $user1->password) }}">
                        <button type='button' id='cpasswordCancel_btn' class='btn btn-warning'><i class="fas fa-ban"></i> CANCEL</button>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                <div class="col-md-6">
                    <input id='adminview' type="text" class="form-control userinfo_label" value="{{ (!isset($user1->admin) ? '' : ($user1->admin == true? 'YES':'NO')) }}" readonly>
                    <select id="admin" class="form-control userinfo_disabled" name="admin" {{-- value="{{ (!isset($user1->admin) ? '' : ($user1->admin == 1? 1:0)) }}" --}} style='display:none' required>
                        @if (isset($user1->admin))
                            @if ($user1->admin == 1)
                                <option value="0">NO</option>
                                <option value="1" selected>YES</option>
                            @else
                                <option value="0" selected>NO</option>
                                <option value="1">YES</option>
                            @endif
                        @endif                        
                    </select>
                </div>
            </div>                        

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button id='userinfo_edit' type="button" class="btn btn-primary userinfo_label" disabled>
                        <i class="far fa-edit"></i> {{ __('EDIT') }}
                    </button>
                    <button type="submit" class="btn btn-primary userinfo_disabled" style='display:none'>
                        <i class="fas fa-save"></i> {{ __('SAVE') }}
                    </button>
                    <button id='userinfo_cancel' type="button" class="btn btn-warning userinfo_disabled" style='display:none'>
                        <i class="fas fa-ban"></i> {{ __('CANCEL') }}
                    </button>
                    {{-- <a href='{{ url('/userslist') }}' class='btn btn-primary '><i class="fas fa-arrow-left"></i> Go Back</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>