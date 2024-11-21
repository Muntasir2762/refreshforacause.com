@extends('admin.layout.default')

@section('pageTitle')
    Organization | Add
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Add Organization</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.org.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="{{ old('name') }}" required>
                                    <small id="helpId" class="text-muted">Organization Name</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                    <small id="helpId" class="text-muted">As an admin if you do not provide a password
                                        for the organization account you're about to create the system will automatically
                                        assigan a default password
                                        which is 123456</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                    <small id="helpId" class="text-muted">Organization Email</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Company phone" value="{{ old('phone') }}">
                                    <small id="helpId" class="text-muted">Organization Phone</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="5">{{ old('address') }}</textarea>
                                </div>
                            </div>
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
