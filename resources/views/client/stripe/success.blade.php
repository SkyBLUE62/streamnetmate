@extends('template.client.template')

@section('title')
    StreamNetmate | Paiement réussi
@endsection

@section('content')
    <div class="row">
        <div class="page-content">
            <!-- ***** Banner Start ***** -->
            <div class="main-banner">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-text">
                            <h6>Merci pour votre abonnement !</h6>
                            <h4><em>Voir</em> toutes les chaines</h4>
                            <div class="main-button">
                                <a href="{{ route('allChaines') }}">Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Banner End ***** -->
            <!-- ***** Gaming Library Start ***** -->
            <div class="gaming-library profile-library">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h4><em>Mes factures</em></h4>
                    </div>
                    @foreach ($orders as $order)
                        <div class="item">
                            <ul>
                                <li>
                                    <h4>Date</h4>
                                    <span>{{ \Carbon\Carbon::parse($order['created_at'])->format('d-m-Y') }}</span>
                                </li>
                                <li></li>
                                <li>
                                    <h4>Expiration Abonnements</h4>
                                    <span>
                                        {{ \Carbon\Carbon::parse($order['created_at'])->addDays(31)->format('d-m-Y') }}
                                    </span>
                                </li>
                                <li></li>
                                <li>
                                    <h4>Prix</h4><span>{{ $order['prix'] . ' $' }}</span>
                                </li>
                                <li>
                                    <div class="main-border-button border-no-active"><a href="#">Télécharger</a></div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- ***** Gaming Library End ***** -->
        </div>
    </div>
@endsection
