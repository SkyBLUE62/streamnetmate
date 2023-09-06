@extends('template.admin.template')
@section('title')
    StreamNetMate | Tous les utilisateurs
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tous les liens</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Type d'abonnement</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['status'] }}</td>
                                <td>{{ $user['role'] }}</td>

                                <td class="d-flex flex-column" style="gap: 10px"><a class="btn btn-success"
                                        href="{{route('edit-user',$user['id'])}}">Editer</a>
                                    <a class="btn btn-danger" href="{{route('delete-user',$user['id'])}}">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>
@endsection
