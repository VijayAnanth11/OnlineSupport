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
                    <img src="{{asset('images/dp.jpg') }}" class="dpimg">
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

    @foreach($ticket as $item)

    <div class="content edit-content">
        <div class="card col-12 col-sm-6">
            <div class="card-header" style="display:flex; justify-content:space-between">
                <h6 class="card-title">Ref No: {{$item->refno}}</h6>
                <h6 class="card-title">Date on: {{ $item->created_at->toDateString()}}</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('/AgentTicket' . '/' . $item->id) }}" method="POST" enctype="multipart/form-data">

                    @method("PATCH")
                    {!! csrf_field() !!}

                    <div class="form-group mb-2">
                        <label style="font-weight:bold">Customer Name</label>
                        <input type="text" class="form-control form-control-sm" placeholder="" required name="customer"
                            id="customer" value="{{$item->customer}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label style="font-weight:bold">Problem Description</label>
                        <textarea class="form-control form-control-sm" placeholder="" required name="problem"
                            id="problem" disabled>{{$item->problem}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label style="font-weight:bold">Email</label>
                        <input type="email" class="form-control form-control-sm" placeholder="" required name="email"
                            id="email" value="{{$item->email}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label style="font-weight:bold">Phone</label>
                        <input type="number" class="form-control form-control-sm" placeholder="" required name="phone"
                            id="phone" value="{{$item->phone}}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label style="font-weight:bold">Reply</label>
                        <textarea class="form-control form-control-sm" name="reply"
                            id="reply">{{$item->reply}}</textarea>
                    </div>


                    <input type="hidden" class="form-control form-control-sm" name="refno" id="refno"
                        value="{{$item->refno}}">
                    <input type="hidden" class="form-control form-control-sm" name="status" id="status"
                        value="in process">

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>

                <form action="{{ url('/AgentTicket' . '/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method("PATCH")
                    {!! csrf_field() !!}

                    <input type="hidden" class="form-control form-control-sm" name="customer" id="customer"
                        value="{{$item->customer}}">
                    <input type="hidden" class="form-control form-control-sm" name="problem" id="problem"
                        value="{{$item->problem}}">
                    <input type="hidden" class="form-control form-control-sm" name="email" id="email"
                        value="{{$item->email}}">
                    <input type="hidden" class="form-control form-control-sm" name="phone" id="phone"
                        value="{{$item->phone}}">
                    <input type="hidden" class="form-control form-control-sm" name="reply" id="reply"
                        value="{{$item->reply}}">
                    <input type="hidden" class="form-control form-control-sm" name="refno" id="refno"
                        value="{{$item->refno}}">
                    <input type="hidden" class="form-control form-control-sm" name="status" id="status" value="closed">

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger">Close the ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endforeach

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