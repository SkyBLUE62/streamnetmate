@extends('template.admin.template')
@section('title')
    StreamNetMate | Toutes les chaines
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dernières Commandes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Chaines</th>
                            <th>Langue</th>
                            <th>Image</th>
                            <th>Populaire</th>
                            <th>Slug</th>
                            <th>Type d'abonnement</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chaines as $chaine)
                            <tr>
                                <td>{{ $chaine['id'] }}</td>
                                <td>{{ $chaine['chaine'] }}</td>
                                <td>{{ $chaine['langue'] }}</td>
                                <td class="text-center"><img src="{{asset($chaine['image'])}}" alt="" srcset="" class="img-fluid rounded-circle" width="10%" height="10%"></td>
                                @if ($chaine['popular'] == 1)
                                    <td>Oui</td>
                                @else
                                    <td>Non</td>
                                @endif
                                <td>{{ $chaine['slug'] }}</td>
                                <td>{{ $chaine['type_abonnement'] }}</td>
                                <td class="d-flex flex-column" style="gap: 10px"><a href="{{route('edit-chaine',$chaine['id'])}}" class="btn btn-success">Editer</a>
                                    <a class="btn btn-danger" href="{{route('delete-chaine',$chaine['id'])}}">Supprimer</a></td>
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
