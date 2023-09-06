@extends('template.client.template')

@section('title')
    StreamNetmate | Profil
@endsection

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                @if (Session::has('alert'))
                    <div class="alert alert-danger" id="alert">
                        {{ Session::get('alert') }}
                    </div>
                @endif
                <!-- ***** Banner Start ***** -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-profile ">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/client/images/default_pp.jpg') }}" alt=""
                                        style="border-radius: 23px;">
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <div class="main-info header-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p>{{ Auth::user()->email }}</p>
                                        <div class="main-border-button">
                                            <a href="{{ route('logout') }}">Déconnexion</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 align-self-center">
                                    <ul>
                                        <li>Status <span>{{ Auth::user()->status }}</span></li>
                                        <li>Date d'inscription <span>
                                                {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d-m-Y') }}
                                            </span></li>

                                        @if ($jourRestant != null)
                                            <li>Jour d'abonnement restant <span>{{ $jourRestant->days }}</span></li>
                                        @else
                                            <li>Jour d'abonnement restant <span>0</span></li>
                                        @endif

                                        @if ($abonnement != null)
                                            <li>Date du dernier payement <span>
                                                    {{ \Carbon\Carbon::parse($abonnement['created_at'])->format('d-m-Y') }}
                                                </span></li>
                                        @else
                                            <li>Date du dernier payement: <span>
                                                    Aucune
                                                </span></li>
                                        @endif


                                        @if ($abonnement == null)
                                            <div class="main-border-button">
                                                <a href="{{ route('paiement') }}">Renouveler l'abonnement</a>
                                            </div>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            @if ($favorites != null)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="clips">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="heading-section">
                                                        <h4><em>Mes chaines</em> favorites</h4>
                                                    </div>
                                                </div>
                                                @foreach ($chaines as $chaine)
                                                    @foreach ($favorites as $favorite)
                                                        @if ($favorite['idChaine'] == $chaine['id'])
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="item">
                                                                    <div>
                                                                        <a
                                                                            href="{{ route('chaine-direct', $chaine['slug']) }}">
                                                                            <img src="{{ asset($chaine['image']) }}"
                                                                                alt="" style="border-radius: 23px;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="down-content mt-2">
                                                                        <h4>{{ $chaine['chaine'] }}</h4>
                                                                        <span>{{ $chaine['langue'] .' - '.$chaine['type_abonnement'] }} </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->
                @if ($orders != null)
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
                                            <div class="main-border-button border-no-active" ><a
                                                    href="{{route('order-detail',$order['idOrder'])}}" target="_blank">Télécharger</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- ***** Gaming Library End ***** -->
                @endif

            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (Session::has('alert'))
        <script src="{{ asset('assets/client/js/alert.js') }}"></script>
    @endif
@endsection
