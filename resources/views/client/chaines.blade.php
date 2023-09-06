@extends('template.client.template')

@section('title')
    StreamNetmate | Chaines
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Featured Games Start ***** -->
                <div class="row">
                    @if (Session::has('alert'))
                        <div class="alert alert-danger">
                            {{ Session::get('alert') }}
                        </div>
                    @endif

                    <div class="col-lg-12">

                        <div class="featured-games header-text">

                            <div class="heading-section">
                                <h4><em>Toutes les </em> chaines</h4>
                            </div>
                            <div class="owl-features owl-carousel">
                                @foreach ($chaines as $chaine)
                                    <div class="item">
                                        <div class="thumb">

                                            <a href="{{ route('chaine-direct', $chaine['slug']) }}">
                                                <img src="{{ $chaine['image'] }}" alt="" width="150px" height="300px">
                                            </a>

                                        </div>
                                        <h4>{{ $chaine['chaine'] }}<br><span>{{ $chaine['langue'] . ' - ' . $chaine['type_abonnement'] }}</span>
                                        </h4>
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
                                            <li><i class="fa fa-download"></i>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Featured Games End ***** -->
                @if ($mostChaines != null)
                    <!-- ***** Live Stream Start ***** -->
                    <div class="live-stream">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Chaines</em> Populaires</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($mostChaines as $mostChaine)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{route('chaine-direct',$mostChaine['slug'])}}">
                                                <img src="{{ $mostChaine['image'] }}" alt="" width="150px">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <div class="avatar">
                                                <a href="">
                                                    <img src="{{ $mostChaine['image'] }}" alt=""
                                                        style="max-width: 46px; border-radius: 50%; float: left;">
                                                </a>
                                            </div>
                                            <span></i>{{ $mostChaine['chaine'] }}</span>
                                            <h4>{{ $mostChaine['langue'] .' - '.$chaine['type_abonnement']}}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- ***** Live Stream End ***** -->
                @endif

            </div>
        </div>
    </div>
    </div>

@endsection

@section('script')
    <script src='{{ asset('assets/client/js/favorites.js') }}'></script>
@endsection
