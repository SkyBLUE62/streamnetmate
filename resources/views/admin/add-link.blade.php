@extends('template.admin.template')

@section('title')
    StreamNetmate | Ajouter un link
@endsection

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un link</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('insert_link') }}" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url"
                                placeholder="Entrez l'url">
                        </div>
                        <div class="form-group">
                            <label for="chaine">Chaine</label>
                            <select class="form-control" id="chaine" name="chaine">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($chaines as $chaine)
                                    @if ($i == 0)
                                        <option value="{{ $chaine['id'] }}" selected>{{ $chaine['chaine'] }}</option>
                                    @else
                                        <option value="{{ $chaine['id'] }}">{{ $chaine['chaine'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
