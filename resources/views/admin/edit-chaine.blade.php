@extends('template.admin.template')

@section('title')
    StreamNetmate | Editer une Chaine
@endsection

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editer {{ $chaine['chaine'] }}</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('alert'))
                        <div class="alert alert-success">{{ Session::get('alert') }}</div>
                    @endif
                    <form method="POST" action="{{ route('update-chaine', $chaine['id']) }}" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                placeholder="Entrez le nom" value="{{ $chaine['chaine'] }}">
                        </div>
                        <div class="form-group">
                            <label for="langue">Langue</label>
                            <input type="text" class="form-control" id="langue" name="langue"
                                placeholder="Entrez la langue (Accronyme)" value="{{ $chaine['langue'] }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input disabled type="text" class="form-control" id="slug" name="slug"
                                value="{{ $chaine['slug'] }}">
                        </div>
                        <div class="form-group">
                            <label for="popular">Popularité</label>
                            <select class="form-control" id="popular" name="popular">
                                <option value="0" selected>Impopulaire</option>
                                <option value="1">Populaire</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="type_abonnement">Type d'abonnement</label>
                            <select class="form-control" id="type_abonnement" name="type_abonnement">
                                <option value="Free" selected>Free</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/autoslug.js') }}"></script>
@endsection
