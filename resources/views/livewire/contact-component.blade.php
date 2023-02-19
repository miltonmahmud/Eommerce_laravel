<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70" style="margin-top: 70px;" >
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>{{$setting->address}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p>{{$setting->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0" style="margin-bottom: 70px;" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Get In touch</h2>
                </div>
                <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                <div class="field_form">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form name="frm-contact" wire:submit.prevent="sendMessage">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Name *" id="name" class="form-control" name="name" type="text" wire:model="name">
                                @error ('name') 
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                             </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email" wire:model="email">
                                @error ('email') 
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone" wire:model="phone">
                                @error ('phone') 
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input placeholder="Enter Subject" id="subject" class="form-control" name="subject" wire:model="subject">
                                @error ('subject') 
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <textarea required placeholder="Comment *" id="comment" class="form-control" name="comment" rows="4" wire:model="comment"></textarea>
                                @error ('comment') 
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" title="Send Message" class="btn btn-fill-out" id="submit" name="ok" value="Submit">Send Message</button>
                            </div>
                            
                        </div>
                    </form>     
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                <div class="map">
                    <iframe src="{{$setting->map}}" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

</div

