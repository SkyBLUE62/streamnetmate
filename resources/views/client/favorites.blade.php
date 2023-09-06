@extends('template.client.template')

@section('title')
    StreamNetmate | Favorites
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Featured Games Start ***** -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured-games header-text">
                            <div class="heading-section">
                                <h4><em>Toutes les </em> chaines</h4>
                            </div>
                            <div class="owl-features owl-carousel">

                                @foreach ($chaines as $chaine)
                                    @foreach ($favorites as $favorite)
                                        @if ($chaine['id'] == $favorite['idChaine'])
                                            <div class="item">
                                                <div class="thumb">

                                                    <a href="{{ route('chaine-direct', $chaine['slug']) }}">
                                                        <img src="{{ $chaine['image'] }}" alt="">
                                                    </a>

                                                </div>
                                                <h4>{{ $chaine['chaine'] }}<br><span>{{ $chaine['langue'] .' - '.$chaine['type_abonnement'] }}</span></h4>
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
                                        @endif
                                    @endforeach
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Featured Games End ***** -->
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src='{{ asset('assets/client/js/favorites.js') }}'></script>
@endsection
