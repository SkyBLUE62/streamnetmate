@extends('template.client.template')

@section('title')
    StreamNatemate | Erreur Paiement
@endsection

@section('content')
    <div class="row">
        <div class="page-content">
            <!-- ***** Banner Start ***** -->
            <div class="main-banner">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-text">
                            <h6>Une erreur c'est produit lors du paiement !</h6>
                            <h4><em>Vous</em> n'avez pas été débité !</h4>
                            <div class="main-button">
                                <a href="{{ route('paiement') }}">Réessayer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-center">
                <h6>Si le problème persiste, merci d'établir un ticket au près du <a href=""> support</a>.</h6>
            </div>
        </div>
    </div>
@endsection
