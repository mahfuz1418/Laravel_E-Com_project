@extends('home.layouts.templete')
@section('main-content')
    <div class="container">
        <div class="row">
            <h1 class="fashion_taital pt-4"></h1>
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li class="pl-4 py-1"> <a href="{{ route('userprofile') }}">Dashboard</a> </li>
                        <li class="pl-4 py-1"> <a href="{{ route('pendingorder') }}">Pending Orders</a> </li>
                        <li class="pl-4 py-1"> <a href="{{ route('history') }}">History</a> </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </div>
@endsection
