<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Restoran Egin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="mt-2">
            <nav class="navbar navbar-expand-lg bg-light">
                <div  class="container-fluid">
                    <a href="/"><img style="width: 200px" src="{{ asset('gambar/SMK bisa.png') }}" alt=""></a>
                    <ul class="navbar-nav gap-5">

                        @if (session()->has('cart'))
                        <li class="nav-item mb-2"><a class="text-decoration-none" href="{{ url('cart') }}">Cart (
                            @php
                                $count =count( session('cart'));
                                echo $count ;
                            @endphp
                            )</a>
                        </li>  
                        @else
                            <li class="nav-item text-primary mt-2">Cart</li> 
                        @endif

                        
    
                        @if (session()->missing('idpelanggan'))
                            <li class="nav-item"><a class="text-decoration-none btn btn-primary" href="{{ url('register') }}">Register</a></li>
                            <li class="nav-item"><a class="text-decoration-none btn btn-primary" href="{{ url('login') }}">Login</a></li>
                        @endif
                        
    
                       
                            @if (session()->has('idpelanggan'))
                            <li class="nav-item mt-2">{{ session('idpelanggan')['email'] }}</li>
                            <li class="nav-item"><a class="btn btn-primary" href="{{ url('logout') }}">LogOut </a></li>
                            @endif
                       
                    </ul>
                </div>
                
            </nav>
        </div>
        <div class="row mt-4">
            <div class="col-2">
                <ul class="list-group">
                    @foreach ($kategoris as $kategori)
                        <li class="list-group-item"><a class="text-decoration-none" href="{{ url('show/'.$kategori->idkategori) }}">{{ $kategori -> kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
        <div class="bg-light mt-5">
            <p class="text-center">@egin.baru12.com</p>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>