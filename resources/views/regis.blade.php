@extends('layouts.auth')
@section('title', 'Register')
@section('content')
  <style media="screen">
    *, *:before, *:after{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body{
      background-color: #080710;
    }
    .background{
      width: 450px;
      height: 450px;
      position: absolute;
      transform: translate(-50%,-50%);
      left: 50%;
      top: 50%;
    }
    .background .shape{
      height: 200px;
      width: 200px;
      position: absolute;
      border-radius: 50%;
    }
    .shape:first-child{
      background: linear-gradient(#1845AD, #23A2F6);
      left: -50px;
      top: -80px;
    }
    .shape:last-child{
      background: linear-gradient(to right, #FF512F, #F09819);
      right: -80px;
      bottom: -50px;
    }
    form{
      width: 400px;
      background-color: #ffffff75;
      position: absolute;
      transform: translate(-50%,-50%);
      top: 50%;
      left: 50%;
      border-radius: 10px;  
      backdrop-filter: blur(25px);
      border: 2px solid #ffffff20;
      box-shadow: 0 0 40px #08071080;
      padding: 50px 35px;
    }
    form *{
      color: #080710;
      letter-spacing: 0.5px;
      outline: none;
      border: none;
    }
    form h3{
      font-size: 35px;
      font-weight: 500;
      line-height: 45px;
      text-align: center;
    }
    label{
      display: block;
      margin-top: 25px;
      font-size: 15px;
      font-weight: 500;
    }
    input{
      display: block;
      height: 50px;
      width: 100%;
      background-color: #00000050;
      border-radius: 5px;
      padding: 0 10px;
      margin-top: 7.5px;
      font-size: 15px;
      font-weight: 300;
    }
    ::placeholder{
      color: #ffffff75;
    }
    button{
      margin-top: 10px;
      width: 100%;
      background-color: linear-gradient(#00000010, #ffffff);
      color: #080710;
      padding: 15px 0;
      font-size: 17.5px;
      font-weight: 600;
      border-radius: 5px;
      cursor: pointer;
    }
    a{
      color: #23A2F6;
      text-decoration: none;
    }
  </style>

  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    <form method="POST">
      @csrf
        <h3><b>Register Now</b></h3>
        <div>
          <label for="name">Username</label>
          <input type="text" name="name" placeholder="Username" id="name">
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Email" id="email">
        </div>
        <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Password" id="password">
        </div>
        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
          </div>
        @endif
        <button>Registration</button>
        <br>
        <p class="text-center"><br>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </form>
  </body>
@endsection