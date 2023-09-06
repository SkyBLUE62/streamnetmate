@extends('template.client.template')

@section('title')
    StreamNetMate | Home
@endsection

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                @include('include.client.banner')

                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Chaines Populaires</em> du moment</h4>
                            </div>
                            <div class="row">
                                @foreach ($chaines as $chaine)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <a href="{{ route('chaine-direct', $chaine['slug']) }}">
                                                <img src="{{ asset($chaine['image']) }}" alt="" height="175px" width="150px">
                                                <h4>{{ $chaine['chaine'] }}<br><span>{{ $chaine['langue'].' - '.$chaine['type_abonnement'] }} </span> </h4>
                                            </a>
                                            <ul>
                                                @if (Auth::check())
                                                    @if ($favorites != null)
                                                        @if (!$favorites->contains('idChaine', $chaine['id']))
                                                            <li><button class="mdi mdi-star-outline"
                                                                    style="color: yellow; font-size:1rem; background:none; border:none";
                                                                    id="star_outline_{{ $chaine['id'] }}"
                                                                    onclick="addFavorite({{ $chaine['id'] }})"></button>
                                                            </li>
                                                        @else
                                                            <li><button class="mdi mdi-star"
                                                                    style="color: yellow; font-size:1rem; background:none; border:none";
                                                                    id="star_{{ $chaine['id'] }}"
                                                                    onclick="deleteFavorite({{ $chaine['id'] }})"></button>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li><button class="mdi mdi-star-outline"
                                                                style="color: yellow; font-size:1rem; background:none; border:none";
                                                                id="star_outline_{{ $chaine['id'] }}"
                                                                onclick="addFavorite({{ $chaine['id'] }})"></button>
                                                        </li>
                                                    @endif
                                                @endif
                                                <li><i class="fa fa-link"></i>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach ($links as $link)
                                                        @if ($link['idChaine'] == $chaine['id'])
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif

                                                    @endforeach
                                                    {{ $i }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="{{ route('allChaines') }}">Voir Plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Most Popular End ***** -->

                <!-- ***** Gaming Library Start ***** -->
                <div class="gaming-library">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Derniers</em> Ajouts</h4>
                        </div>
                        @foreach ($lastAddChaines as $lastAddChaine)
                            <div class="item">
                                <ul>
                                    <li><img src="{{ $lastAddChaine['image'] }}" alt="" class="templatemo-item">
                                    </li>
                                    <li>
                                        <h4>{{ $lastAddChaine['chaine'] }}</h4><span>{{ $lastAddChaine['langue'] .' - '.$chaine['type_abonnement'] }}</span>
                                    </li>
                                    <li>
                                        <h4>Date d'ajout</h4>
                                        <span>{{ \Carbon\Carbon::parse($lastAddChaine['created_at'])->format('Y-m-d') }}
                                        </span>
                                    </li>
                                    <li>
                                    </li>
                                    <li>
                                    </li>
                                    <li>
                                        <div class="main-border-button"><a
                                                href="{{ route('chaine-direct', $lastAddChaine['slug']) }}">Streaming</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- ***** Gaming Library End ***** -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src='{{ asset('assets/client/js/favorites.js') }}'></script>
@endsection
