@extends('template.client.template')

@section('title')
    StreamNetmate | {{ $chaine['chaine'] }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Featured Games Start ***** -->
                <div class="row d-flex flex-row">
                    <div class="col-lg-12">
                        <div class="featured-games header-text">
                            <div class="heading-section">
                                <h4><em>{{ $chaine['chaine'] }}</em></h4>
                            </div>
                            <div class="">
                                <div class="item">
                                    <div class="thumb">
                                        <div class="d-flex flex-row" style="gap: 5px">
                                            @for ($i = 0; $i < count($link); $i++)
                                                <div class="main-button">
                                                    <a style="cursor: pointer;"
                                                        onclick="changeVideo('{{ $link[$i]['url'] }}')">Stream
                                                        {{ $i + 1 }}</a>
                                                </div>
                                            @endfor
                                        </div>
                                        <iframe id="video" src="{{ $link[0]['url'] }}" width="100%" height="620px"
                                            scrolling="no" frameborder="0" allowfullscreen="true"></iframe>
                                    </div>
                                    <h4>{{ $chaine['langue'] . ' - ' . $chaine['type_abonnement'] }}</h4>
                                    <ul>
                                        @if (Auth::check())
                                            @if ($favorites == null)
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
                                        @endif

                                        <li><i class="fa fa-link" aria-hidden="true"></i>
                                            {{ count($link) }}</li>
                                    </ul>
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
    <script>
        function changeVideo(url) {
            document.getElementById('video').src = url;
        }
    </script>
@endsection
