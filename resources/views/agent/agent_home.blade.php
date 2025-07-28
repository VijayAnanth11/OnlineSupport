<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Support System</title>

    <!-- Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">

    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <div class="nav-row">
                <div class="dp-image">
                    <img src="images/dp.jpg" class="dpimg">
                </div>
                <a class="navbar-brand">Online Support</a>
            </div>

            <div class="nav-login">
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <section>
            <div class="content-check-status">
                <form style="display: flex; align-items:center" class="form-status" action="{{ url('SearchCus') }}">
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Customer Name"
                        name="searchTxt" value="{{ $searchTxt }}">
                    <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <hr>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Ref No</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date On</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $item)

                    @if( $item->status === 'pending')
                    <tr>
                        <td style="font-weight:bold">{{ $item->refno}}</td>
                        <td style="font-weight:bold">{{ $item->customer}}</td>
                        <td style="font-weight:bold">{{ $item->problem}}</td>
                        <td style="font-weight:bold">{{ $item->email}}</td>
                        <td style="font-weight:bold">{{ $item->phone}}</td>
                        <td style="font-weight:bold">{{ $item->created_at->toDateString()}}</td>
                        <td>
                            @if( $item->status === 'pending')
                            <a href="{{ url('UpdateTicket', ['id' => $item->id ]) }}">
                                <div class="btn btn-sm btn-danger">
                                    {{ $item->status}}
                                </div>
                            </a>
                            @endif

                            @if( $item->status === 'in process')
                            <a href="{{ url('UpdateTicket', ['id' => $item->id ]) }}">
                                <div class="btn btn-sm btn-primary">
                                    {{ $item->status}}
                                </div>
                            </a>
                            @endif

                            @if( $item->status === 'closed')
                            <div class="btn btn-sm btn-secondary">
                                {{ $item->status}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endif

                    @if( $item->status !== 'pending')
                    <tr>
                        <td>{{ $item->refno}}</td>
                        <td>{{ $item->customer}}</td>
                        <td>{{ $item->problem}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->phone}}</td>
                        <td>{{ $item->created_at->toDateString()}}</td>
                        <td>
                            @if( $item->status === 'pending')
                            <a href="{{ url('UpdateTicket', ['id' => $item->id ]) }}">
                                <div class="btn btn-sm btn-danger">
                                    {{ $item->status}}
                                </div>
                            </a>
                            @endif

                            @if( $item->status === 'in process')
                            <a href="{{ url('UpdateTicket', ['id' => $item->id ]) }}">
                                <div class="btn btn-sm btn-primary">
                                    {{ $item->status}}
                                </div>
                            </a>
                            @endif

                            @if( $item->status === 'closed')
                            <div class="btn btn-sm btn-secondary">
                                {{ $item->status}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>
        </section>

    </div>


    <section class="news py-5">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <h1>Join Our Valuable Service</h1>
                    <hr>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-lg-11 m-auto">
                    <div class="row">
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">PHONE</h5>
                            <p>0750151049</p>
                        </div>
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">EMAIL</h5>
                            <p>vijayuuu1211@gmail.com</p>
                        </div>
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">ADDRESS</h5>
                            <p>Test Pvt Ltd</p>
                            <p>wellawatta</p>
                            <p>Colombo</p>
                        </div>
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">MEDIA</h5>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-instagram"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <p class="text-center">Published by : VIJAYANANTH</p>

        </div>
    </section>

</body>