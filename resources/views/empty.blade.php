@extends('layouts.m')
@section('css')


@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
 
<div style="padding-right: 200px;">
                <a class="navbar-brand brand  "  href="index.html"><img src="{{asset('assets/admin/assets/images/q.png')}}" class="rounded float-end" style="width: 250px; height:150px; background-color:#ffffcc; float: right;" alt=""></a>
                
            </div>
            <div class="row">
    <div class="col-md-12 mb-30">
            <div  style="float: center;  
            height:1000px;
            position: absolute;
           
            top: 50%;
            left: 50%;
            margin-top: -200px;
            margin-left: -110px;">
    <div >
                <a class="navbar-brand brand  "  href="index.html"><img src="{{ URL::asset('assets/admin/assets/images/n.png')}}" class="rounded float-end" style="width: 230px; height:340px;" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src=""
                        alt=""></a>
            </div>
            </div>
            </div>
            </div>

            <div class="row">
    <div class="col-md-12 mb-30">
 
  <div   style=" background: linear-gradient(to right, #ffffcc 0%, #006600 4%); margin-top: 8px; height:70px;
            position: absolute;
            width: 350px;
            top: 50%;
            color:#ffffff;
            left: 50%;
            margin-top: 140px;
            margin-left: -170px;">
    <h2 class="card-title " style="margin-left: 60px; margin-right: 8px;">نظام الخدمات الألكترونية الموحد</h2>
    
  </div>
  </div>
            </div>
  <div class="row">
    <div class="col-md-12 mb-30">
  <div style="  background: linear-gradient(to right, #ffffcc 0%, #003300 4%); margin-top: 8px; height:70px;
            position: absolute;
            width: 350px;
            top: 50%;
            color:#ffffff;
            left: 50%;
            
            margin-top: 210px;
            margin-left: -170px;">
    <h1 class="card-title " style="margin-left: 70px; margin-right: 8px;">وزارة الزراعة والري</h1>
    
  </div>
  </div>
            </div>
  <div class="row">
    <div class="col-md-12 mb-30">
  <div style=" background: linear-gradient(to right, #ffffcc 0%, #006600 4%); margin-top: 8px; height:70px;
            position: absolute;
            width: 350px;
            top: 50%;
            left: 50%;
            color:#ffffff;
            margin-top: 280px;
            margin-left: -170px;">
    <h2 class="card-title " style="margin-left: 20px; margin-right: 8px;">الأدارة العامة للتسويق والتجارة الزراعية</h2>
    
  </div>
  </div>
            </div>
  <div class="row">
    <div class="col-md-12 mb-30">
 
    <a href="{{ route('login') }}">     <button type="button" class="btn btn-secondary"
                    data-dismiss="modal" style=" background: #003300; margin-top: 8px; height:70px;
            position: absolute;
            width: 350px;
            top: 50%;
            left: 50%;
            color:#ffff66;
            margin-top: 390px;
            margin-left: -170px;"> <h2>تسجيل الدخول<h2></button>   </a>      
            </div>
            </div>

            <div class="row">
    <div class="col-md-12 mb-30">
  <div style=" background: #003300; margin-top: 8px; height:70px;
            position: absolute;
            width: 200px;
            top: 50%;
            left: 50%;
            color:#ffff66;
            margin-top: 550px;
            margin-left: -560px;">
    <h2 class=" card-title" ></h2>
    
  </div>
  </div>
            </div>
            <div class="row">
    <div class="col-md-12 mb-30">
  <div style=" background: #003300; margin-top: 8px; height:70px;
            position: absolute;
            width: 20px;
            top: 50%;
            left: 50%;
            color:#ffff66;
            margin-top: 550px;
            margin-left: -350px;">
    <h2 class=" card-title" ></h2>
    
  </div>
  </div>
            </div>

            </div>
            <div class="row">
    <div class="col-md-12 mb-30">
  <div style=" background: ; margin-top: 8px; height:70px;
            position: absolute;
            width: 200px;
            top: 50%;
            left: 50%;
            color:#003300;
            margin-top: 570px;
            margin-left: -250px;">
    <h2 class=" card-title" >2021 / 2022</h2>
    
  </div>
  </div>
            </div>

          
  

            
<!-- row closed -->
@endsection
@section('js')

@endsection
