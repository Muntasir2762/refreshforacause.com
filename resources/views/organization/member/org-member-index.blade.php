@extends('admin.layout.default')

@section('pageTitle')
    Member | All
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">All Members</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($members))
                        <table id="data-table" class="table dataTable" role="grid" aria-describedby="data-table_info">
                            <thead>
                                <tr role="row">
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $member)
                                    <tr role="row">
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->full_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ ucfirst($member->status) }}</td>
                                        <td class="text-right">
                                            <div class="row justify-content-end">
                                                <div class="mr-1">
                                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-success">
                                                        <i class="anticon anticon-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="mr-1">
                                                    <a href="{{ route('manage.member.edit', ['id' => $member->id]) }}"
                                                        class="btn btn-icon btn-hover btn-sm btn-rounded btn-info">
                                                        <i class="anticon anticon-edit"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="text-right justify-end">
                                {{ $members->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @else
                        <p>No Data.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
