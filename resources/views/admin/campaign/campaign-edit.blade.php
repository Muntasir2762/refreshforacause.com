@extends('admin.layout.default')

@section('pageTitle')
    Campaign | Edit
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Edit {{ $campaign->name }}</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('manage.campaigns.update', ['id' => $campaign->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="{{ $campaign->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <sup class="text-danger">*</sup></label>

                                    <select name="status" id="status" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option @if (strtolower($status->name) == strtolower($campaign->status)) selected @endif
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
