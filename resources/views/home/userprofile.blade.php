@extends('home.layouts.user_profile_templete')
@section('user-content')
<h3>Your Profile</h3>
<ul>
    <li>Your Name - {{ $user_info->name }}</li>
    <li>Your Email - {{ $user_info->email }}</li>
</ul>

@endsection