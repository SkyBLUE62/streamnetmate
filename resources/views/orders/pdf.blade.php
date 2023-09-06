<!DOCTYPE html>
<html>
<head>
	<title>Invoice : {{$order['idOrder']}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/pdf/style.css')}}">

</head>
<body>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="{{route('home')}}" class="invoice-logo">
                                            StreamNetmate
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <address class="text-right">
                                            StreamNetmate.com
                                        </address>
                                    </div>
                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                               {{ Auth::user()->name}}<br>
                                               {{ Auth::user()->email}}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
                                                <div>Invoice - {{ $order['idOrder']}}</div>
                                                <div>{{ \Carbon\Carbon::parse($order['created_at'])->format('d-m-Y') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-body">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Produit</th>
                                                        <th>Id Produit</th>
                                                        <th>Quantité</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Abonnement
                                                            <p class="m-0 text-muted">
                                                                Abonnement 31 jours
                                                            </p>
                                                        </td>
                                                        <td>#1</td>
                                                        <td>1</td>
                                                        <td>{{$order['prix']}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <p>
                                                                Total<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                {{$order['prix']. ' $'}}
                                                            </p>
                                                            <h5 class="text-success"><strong>{{$order['prix']. ' $'}}</strong></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-footer">
                                Merci pour votre achat.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
