@extends('admin.layout.default')

@section('pageTitle')
    Organization | Member
@endsection

@section('pluginCss')
    <link href="{{ asset('admin/assets//vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('mainContent')
    <div class="page-header">
        <h2 class="header-title">All Organization Members</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                            @foreach ($orgMembers as $key => $member)
                                <tr role="row">
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->first_name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ ucfirst($member->status) }}</td>
                                    <td class="text-right">
                                        <div class="row justify-content-end">
                                            <div class="mr-1">
                                                <a href="{{ route('manage.org.member.view', ['id' => $member->id]) }}"
                                                    class="btn btn-icon btn-hover btn-sm btn-rounded btn-info">
                                                    <i class="anticon anticon-eye"></i>
                                                </a>
                                            </div>
                                            <div class="mr-1">
                                                <a href="{{ route('manage.org.member.edit', ['id' => $member->id]) }}"
                                                    class="btn btn-icon btn-hover btn-sm btn-rounded btn-info">
                                                    <i class="anticon anticon-edit"></i>
                                                </a>
                                            </div>
                                            {{-- <div>
                                                <form action="{{ route('manage.org.delete', ['id' => $org->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="btn btn-icon btn-hover btn-sm btn-rounded btn-danger delete"
                                                        type="submit">
                                                        <i class="anticon anticon-delete"></i>
                                                    </button>
                                                </form>
                                            </div> --}}
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="text-right justify-end">
                            {{ $orgMembers->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pluginScript')
    <script src="{{ asset('admin/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $('.delete').on('click', (e) => {
            e.preventDefault()
            const targetItem = e.currentTarget
            console.log(targetItem)
            Swal.fire({
                title: "Warning",
                text: "Are you sure you want to delete this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "DELETE"
            }).then((result) => {
                if (result.value) {
                    targetItem.closest('form').submit()
                }
            });
        })
    </script>
@endsection
