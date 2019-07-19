@extends('layouts.app')

@section('content')
  {{--<!--   アカウント表示   -->--}}
  <!-- <div style="text-align: right; margin-top: 30px; margin-right: 30px;">
    <a href="">
      <i class="fas fa-user-circle fa-7x"></i>
    </a>
  </div> -->
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
          <!-- <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', '') }}
          </a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{--Auth::user()->name --}} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
              </ul>
          </div>
      </div>
  </nav>


  {{--<!--   ロゴ   -->--}}
  <div class="box">
      <div style="margin-left:90px; margin-top:280px; text-align:center;">
          <img src="{{ asset ('img/sp_logo.png') }}">
      </div>

      <div class="">
          <a href="{{ route('Clazy.create') }}">
              <input id="sbox1" id="s" name="s" type="text" style="width: 800px; height: 60px;" placeholder="使ったお金を入力（笑）" />
          </a>
      </div>
  </div>

<!-- 下のフォント達 -->
<!-- <div align="center" style="margin-top: 770px;">
  <table border="0">
    <tr>
      <td><a href=""><i class="fas fa-home fa-7x"></i></a></td>
      <td><a class="aaa" href=""><i class="fas fa-external-link-alt fa-7x"></i></a></td>
      <td><a href=""><i class="fas fa-bars fa-7x"></i></a></td>
    </tr>
  </table>
</div> -->
@section('content')
