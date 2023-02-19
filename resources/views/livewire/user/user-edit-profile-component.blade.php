<div id="content">
  <nav class="navbar navbar-default">
    <span class="slide navbar-brand">
      <a href="#" onclick="openSlideMenu()">
        <i class="fa fa-bars"></i>
      </a>
    </span>
  <div class="container-fluid">
    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSideMenu()">
        <i class="fa fa-times"></i>
      </a>
      <a href="{{route('user.dashboard')}}">Dashboard</a>
      <a href="{{route('user.orders')}}">My Orders</a>
      <a href="{{route('user.profile')}}">My Profile</a>
      <a href="{{route('user.changepassword')}}">Change Password</a>
      <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('Logout-form').submit();">Logout</a>
      <form id="Logout-form" method="POST" action="{{route('logout')}}">
        @csrf            
      </form>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
  </div>
</nav>
    
    <style>

    .form-control {
      font-weight: 300;
      height: 36px;
      padding: 8px 14px;
    }

    label {
      font-weight: 500;
    }

    .form-control:focus {
      border-color: #a0a8c4;
      outline: 0;
     -webkit-box-shadow: none; 
     box-shadow: none; 
    }

    nav svg{
    height: 20px;
    }
    nav .hidden{
    display: block !important;
}

img {
    width: 40px;
    height: 40px;
}

.panel-body {
    padding: 15px 15px 0px 15px;
}

.panel-default {
    border: 26px solid #f3f3f3;
}

.panel-heading {
    padding: 0px 10px 10px 15px;
}

.panel-default>.panel-heading {
    border-color: #a0a8c4;
}

.table>thead>tr>th {
    border-bottom: 2px solid #a0a8c4;
}

.table>tbody>tr>td{
    border-top: 1px solid #a0a8c4;
}

.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #ffffff;
}

.btn-success {
    color: #fff;
    background-color: #0AB395;
    border-color: #0AB395;
    padding: 8px 12px;
}

.btn-success:hover {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}

.btn-success.focus, .btn-success:focus {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}

.btn-success.active, .btn-success:active, .btn-success:active:hover {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}

.search-product {
    border-color: #a0a8c4;
      outline: 0;
     -webkit-box-shadow: none; 
     box-shadow: none;
     height: 38px;
}

    </style>

<div class="content">   
    <style>
        
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #f3f3f3;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }

        .btn-sm {
            color: #fff;
            background-color: #0AB395;
            border-color: #0AB395;
            padding: 8px 12px;
        }

        .btn-success {
    color: #fff;
    background-color: #0AB395;
    border-color: #0AB395;
    padding: 8px 12px;
}

.btn-success:hover {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}

.btn-success.focus, .btn-success:focus {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}

.btn-success.active, .btn-success:active, .btn-success:active:hover, .btn-success:focus-visible, .btn:active:focus, .btn:focus, .btn:focus-visible {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
    outline: none;
    box-shadow: none;
}

.btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open>.dropdown-toggle.btn-success.focus, .open>.dropdown-toggle.btn-success:focus, .open>.dropdown-toggle.btn-success:hover {
    color: #fff;
    background-color: #03c9a5;
    border-color: #03c9a5;
}
    </style>

<div class="content">   
    <style>
        
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }


.tox-tinymce {
  border-radius: 5px;
}

.tox .tox-menubar,
.tox .tox-statusbar {
  display: none;
}

.tox .tox-edit-area__iframe {
    background-color: #f1f4ff;
}

.submit {
    text-transform: uppercase;
    font-size: 23px;
    font-weight: 500;
    margin-bottom: -29px;
}

    </style>

   <div class="container">
      <div class="row">
        <div class="col-lg-7">
         <div class="panel panel-default">
            <div class="panel-heading">
               Update Profile
            </div>
            <div class="panel-body">
                @if(Session::has ( 'message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
               <form wire:submit.prevent="updateProfile">
                     @if($newimage)
                        <img src="{{$newimage->temporaryUrl()}}" width="100%" />
                     @elseif($image)
                        <img src="{{asset('assets/images/profile')}}/{{$image}}" width="100%" />
                     @else
                        <img src="{{asset('assets/images/profile/default.png')}}" width="100%" />
                     @endif
                      <input type="file" style="margin: 10px 0;" wire:model="newimage" />
                      <p><b>Name: </b><input type="text" class="form-control" wire:model="name" /></p>
                      <p><b>Email: </b>{{$email}}</p>
                      <p><b>Phone: </b><input type="text" class="form-control" wire:model="mobile" /></p>
                      <hr>
                      <p><b>Linel: </b><input type="text" class="form-control" wire:model="line1" /></p>
                      <p><b>Line2: </b><input type="text" class="form-control" wire:model="line2" /></p>
                      <p><b>City: </b><input type="text" class="form-control" wire:model="city" /></p>
                      <p><b>Province: </b><input type="text" class="form-control" wire:model="province" /></p>
                      <p><b>Country: </b><input type="text" class="form-control" wire:model="country" /></p>
                      <p><b>Zip Code: </b><input type="text" class="form-control" wire:model="zipcode" /></p>
                      <button type="submit" class="btn btn-info" style="margin-bottom: 20px;margin-top: 10px;">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@push('scripts')
    <script>
      function openSlideMenu() {
        document.getElementById('menu').style.width = '250px';
        document.getElementById('content').style.marginLeft = '250px';
    }

    function closeSideMenu() {
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }
    </script>
@endpush
