@extends('admin.layout.default')

@section('pageTitle')
    Site Setting
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">Site Settings</h2>
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>Email</b> <br>
                            sample.com
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <br>
                            0170000000
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates tenetur quidem dolorem
                            consequatur aliquid deleniti ad asperiores. Debitis, maiores fugiat.
                        </li>
                        <li class="list-group-item">
                            <b>Images</b> <br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Company email" autofocus>
                                    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Company phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="favicon">Favicon</label>
                                    <input type="file" name="favicon" id="favicon" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fold_logo">Fold fold_logo</label>
                                    <input type="file" name="fold_logo" id="fold_logo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
