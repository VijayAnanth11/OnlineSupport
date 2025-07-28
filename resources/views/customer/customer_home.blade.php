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
                        <a class="nav-link" href="{{ url('/AgentLogin') }}">Agent Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">

        <section>
            <div class="content-header-add">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Create Ticket
                </button>
            </div>
        </section>
        <hr>

        <section class="section-center">
            <div class="content-check-status">
                <a class="check-status-txt">Check Ticket Status</a>
                <form style="display: flex; align-items:center" action="{{ url('SearchRef') }}" class="form-status">
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Ticket Reference No"
                        name="searchTxt" value="{{ $searchTxt }}">
                    <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">Submit</button>
                </form>
            </div>

            @if($tickets)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ref No</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $item)
                    <tr>
                        <td>{{ $item->refno}}</td>
                        <td>{{ $item->customer}}</td>
                        <td>{{ $item->problem}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->phone}}</td>
                        <td>{{ $item->reply}}</td>
                        <td>
                            @if( $item->status === 'pending')
                            <a>
                                <div class="btn btn-sm btn-danger">
                                    {{ $item->status}}
                                </div>
                            </a>
                            @endif

                            @if( $item->status === 'in process')
                            <a>
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
                        <td>
                            <a href="{{ url('ViewTicket', ['id' => $item->id ]) }}">
                                <div class="btn btn-sm btn-warning">
                                    View
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </section>

        <!-- Create Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Create New Ticket</h5>
                        <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('AddTicket') }}" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group mb-2">
                                <label style="font-weight:bold">Customer Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" required
                                    name="customer" id="customer">
                            </div>
                            <div class="form-group mb-2">
                                <label style="font-weight:bold">Problem Description</label>
                                <textarea class="form-control form-control-sm" placeholder="" required name="problem"
                                    id="problem"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label style="font-weight:bold">Email</label>
                                <input type="email" class="form-control form-control-sm" placeholder="" required
                                    name="email" id="email">
                            </div>
                            <div class="form-group mb-2">
                                <label style="font-weight:bold">Phone</label>
                                <input type="number" class="form-control form-control-sm" placeholder="" required
                                    name="phone" id="phone">
                            </div>

                            <input type="hidden" class="form-control form-control-sm" name="refno" id="refno"
                                value="{{$refNo}}">
                            <input type="hidden" class="form-control form-control-sm" name="reply" id="reply"
                                value="please wait">
                            <input type="hidden" class="form-control form-control-sm" name="status" id="status"
                                value="pending">

                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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