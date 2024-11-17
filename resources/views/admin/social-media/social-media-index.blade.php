@extends('admin.layout.default')

@section('pageTitle')
    Social Media
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Social Media</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('social-media.bulk.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($media as $platform)
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="platform_{{ $platform }}">{{ ucwords($platform->platform) }}</label>
                                        <input type="{{ $platform->link_type }}" name="platform[{{ $platform->id }}]"
                                            id="platform_{{ $platform->platform }}" class="form-control"
                                            placeholder="{{ ucwords($platform->platform) }}" value="{{ $platform->link }}">
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12">
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
