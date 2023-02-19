<div id="content">

  @livewire('admin.admin-sidebar')

  <main id="main" class="main">
     <section class="section product">
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header align-middle">
                   <span class="headline">All Products</span>
                   <a href="{{route('admin.addproduct')}}" type="button" class="btn btn-primary btn-md float-end">Add New</a>
                </div>
                 <div class="card-body my-3">
                    
                    <table class="table table-bordered">
                       <thead class="table-primary">
                          <tr>
                             <th>Id</th>
                             <th>Image</th>
                             <th>Name</th>
                             <th>Stock</th>
                             <th>Price</th>
                             <th>Sale Price</th>
                             <th>Category</th>
                             <th>Date</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          @foreach($products as $product)
                          <tr class="align-middle" style="font-size: 15px;" >
                             <td>{{$product->id}}</td>
                             <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="40" height="40" /></td>
                              <td style="text-transform: capitalize; font-weight: 600;">{{$product->name}}</td>
                              <td ><span style="text-transform: capitalize; background-color: rgba(10,179,156,.1); color: #0ab39c; padding: 3px 5px; border-radius: 5px;">{{$product->stock_status}}</span></td>
                              <td>{{$product->regular_price}}</td>
                              <td>{{$product->sale_price}}</td>
                              <td style="text-transform: capitalize;">{{$product->category->name}}</td>
                              <td>{{$product->created_at}}</td>
                              <td>
                                  <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}">
                                    <i class="bx bxs-edit" style="font-size: 28px"></i> 
                                  </a>
                                  <a href="#" style="color: #FF324D;" style="margin-left:5px;" wire:click.prevent="deleteConfirmation({{$product->id}})">
                                    <i class="ri-close-circle-fill" style="font-size: 26px;"></i>
                                  </a>

                              </td>
                          </tr>
                          @endforeach
                       </tbody>
                    </table>
                 </div>
              {{$products->links()}}
              </div>
           </div>
        </div>
     </section>
  </main>
</div>