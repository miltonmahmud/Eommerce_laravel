@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div id="content">
  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Sale Settings</span>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form action="" wire:submit.prevent="updateşale">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sale_date" class="form-label">Sale Date</label>
                                     <input id="sale_date" type="text" class="form-control" wire:model="sale_date">
                                </div>
                                <div class="text-center mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                                </div>
                            </form>
                          </div>
                      </div>
                </div>
            </div>
        </div>
     </section>
  </main>
</div>


@push('scripts')

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
      flatpickr("#sale_date", {
        enableTime: true,
    dateFormat: "Y-m-d H:i",
      });
  </script>

@endpush