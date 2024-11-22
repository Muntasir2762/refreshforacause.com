@extends('admin.layout.default')

@section('pageTitle')
    Organization | Edit
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Edit </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.org.update', ['id' => $org->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="{{ $org->first_name }}" required>
                                    <small id="helpId" class="text-muted">Organization Name</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="{{ $org->email }}" required>
                                    <small id="helpId" class="text-muted">Organization Email</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Company phone" value="{{ $org->phone }}">
                                    <small id="helpId" class="text-muted">Organization Phone</small>
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
