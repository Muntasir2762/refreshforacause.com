@extends('admin.layout.default')

@section('pageTitle')
    User | Edit
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Edit {{ $user->first_name }}'s Account</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.users.update', ['id' => $user->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="{{ $user->email }}" required>
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
                                    <label for="status">Status</label>

                                    <select name="status" id="status" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option @if (strtolower($status->name) == strtolower($user->status)) selected @endif
                                                value="{{ strtolower($status->name) }}">{{ ucwords($status->name) }}
                                            </option>
                                        @endforeach
                                    </select>
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
