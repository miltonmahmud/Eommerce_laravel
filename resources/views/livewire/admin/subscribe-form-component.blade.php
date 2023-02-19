
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">{{Session::get('message')}}
    </div>
@endif

<form wire:submit.prevent="addSubscriber">
    <div class="form-group">
        <input name="email" required type="email" class="form-control rounded-0" placeholder="Enter Your Email" wire:model="email">
    </div>
    <div class="form-group">
        <button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
    </div>
</form>