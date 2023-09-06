@extends('template.admin.template')
@section('title')
    StreamNetmate | Editer un Utilisateur
@endsection
@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editer Utilisateur: {{ $user['name'] }}</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('alert'))
                        <div class="alert success">
                            {{ Session::get('alert') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update-user', $user['id']) }}" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="role">Chaine</label>
                            <select class="form-control" id="role" name="role">
                                @if ('client' == $user['role'])
                                    <option value="client" selected>Client</option>
                                    <option value="admin">Admin</option>
                                @else
                                    <option value="admin" selected>Admin</option>
                                    <option value="client">Client</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
