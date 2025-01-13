@extends('admin.layout.default')

@section('pageTitle')
    Organization | Member
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Add Org Member</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.org.member.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Select Organization <sup class="text-danger">*</sup></label>
                                    <select name="org_id" id="org_id" class="form-control">
                                        <option value="" disabled selected>Select an organization</option>
                                        @foreach ($globalOrganizations as $organization)
                                            <option value="{{$organization->id}}">{{$organization->first_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">First Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="first_name" id="name" class="form-control"
                                        placeholder="First Name" value="" required>
                                    <small id="helpId" class="text-muted">Organization Member First Name</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Last Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="last_name" id="name" class="form-control"
                                        placeholder="Last Name" value="" required>
                                    <small id="helpId" class="text-muted">Organization Member Last Name</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="" required>
                                    <small id="helpId" class="text-muted">Organization Member Email</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Company phone" value="">
                                    <small id="helpId" class="text-muted">Organization Member Phone</small>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label>

                                    <select name="status" id="status" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option @if (strtolower($status->name) == strtolower($orgMember->status)) selected @endif
                                                value="{{ strtolower($status->name) }}">{{ ucwords($status->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button class="btn btn-primary text-uppercase" type="submit">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
