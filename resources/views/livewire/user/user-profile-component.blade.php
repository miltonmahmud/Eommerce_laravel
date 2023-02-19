 <div id="content">

  <style>
    
    .card {
      padding-top: 20px;
    }

  </style>

  @livewire('user.user-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="container card">
          <div class="card-body">
            <div class="row ">

            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif

            <div class="col-lg-3">
              @if($user->profile->image)
              <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="80%" style="border: 2px solid #eee; border-radius: 10px;" />
              @else
              <img src="{{asset('assets/images/profile/default.png')}}" width="80%" style="border: 2px solid #eee;border-radius: 10px;"/>
              @endif
           </div>

           <div class="col-lg-4">
               <p><b>Name: </b>{{$user->name}}</p>
               <p><b>Email: </b>{{$user->email}}</p>
               <p><b>Phone: </b>{{$user->profile->mobile}}</p>
               <p><b>Linel: </b>{{$user->profile->line1}}</p>
            </div>

           <div class="col-lg-5">
             <p><b>Line2: </b>{{$user->profile->line2}}</p>
             <p><b>City: </b>{{$user->profile->city}}</p>
             <p><b>Province: </b>{{$user->profile->province}}</p>
             <p><b>Country: </b>{{$user->profile->country}}</p>
             <p><b>Zip Code: </b>{{$user->profile->zipcode}}</p>
            </div>

        </div>
        <hr>
        <div class="row">
          <div class="col-lg-4">
            <a href="{{route('user.editprofile')}}" class="btn btn-info" style="margin-bottom: 20px;">Update Profile</a>
          </div>
        </div>
          </div>
     </section>
  </main>
</div>
