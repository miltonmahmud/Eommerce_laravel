
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Cartvelly</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
      <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      @stack('css')
      <link href="{{asset('assets3/css/style.css')}}" rel="stylesheet">

      <style>

        body {
            font-family: 'Open sans', sans-serif;
            background: #f1f4ff;
        }

        table tbody td {
          font-size: 14px;
        }

        table thead tr th {
          background-color: #e8fffc !important;
          color: #006659;
        }

        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #dbe7e5 !important; //your desired color
}

        label {
          font-weight: 600; 
        }

        .bi-grid,
        .bi-box,
        .bi-diagram-3,
        .bi-gift,
        .bi-stack,
        .bi-layout-text-window-reverse,
        .bi-card-image,
        .bi-front,
        .bi-cart4,
        .bi-envelope,
        .bi-gear,
        .bi-person,
        .bi-shop,
        .bi-alarm,
        .bi-power {
          font-size: 18px !important;
          color: #0AB395 !important;
        }

        .bi-person {
            font-size: 32px;
            color: #0AB395 !important;
        }

        .ri-close-circle-fill {
          color: #FF324D;
        }

        textarea:hover, 
        input:hover, 
        textarea:active, 
        input:active, 
        textarea:focus, 
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active,
        .btn:focus,
        select:active,
        select:focus
        {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }

        .btn-primary {
            color: #fff;
            background-color: #0AB395;
            border-color: #0AB395;
            
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #03c9a5;
            border-color: #03c9a5;
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

        .headline {
          vertical-align: middle;
          font-size: 20px;
          color: #333;
          font-weight: 600;
        }

        .tox-tinymce {
          border-radius: 5px;
        }

        .tox-menubar,
        .tox-statusbar {
          display: none !important;
        }

        .tox .tox-edit-area__iframe,
        .form-control {
            background-color: #f1f4ff !important;
        }

        .card-header {
          color: #333;
        }

        .bxs-edit:before {
            color: #0ab39c;
        }

        /*pagination*/

        .pl-4,
.px-4 {
    padding: 1rem !important;
}

.pb-2,
.py-2 {
    padding: 1rem !important;
}

.pt-2,
.py-2 {
    padding: 1rem !important;
}

.bg-white {
    color: white;
    margin: 2px;
    background-color: #ff2832 !important;
    font: 14px bold, "ARIAL";
}

.border {
    border: 1px solid #dee2e6 !important;
}

nav svg {
    height: 20px;
}

svg {
    overflow: hidden;
    vertical-align: middle;
}

.wrap-pagination-info {
    margin-top: 46px;
    border-top: 1px solid #e6e6e6;
    padding-top: 10px;
}

.wrap-pagination-info .hidden {
    display: block !important;
    margin-top: 30px;
    margin-left: -3px;
}

.wrap-pagination-info .rounded-l-md {
    margin-left: 5px;
}
.wrap-pagination-info .rounded-r-md {
    margin-left: 5px;
}

[role=navigation] {
    display: inline-block;
    margin-left: 20px;
    margin-bottom: 20px;
  
  </style>

   </head>
   <body>
   

    

    {{ $slot }}

    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('assets3/js/validate.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets3/js/main.js')}}"></script>
    @livewireScripts
    <script>
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                Livewire.emit('deleteConfirmed');
              }
            })
        })

        window.addEventListener('show-sdelete-confirmation', event => {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                Livewire.emitSelf('sdeleteConfirmed');
              }
            })
        })

         window.addEventListener('scategoryDelete', event => {
            Swal.fire('Deleted', 'Sub Category Deleted Successfully!', 'success');
        })

        window.addEventListener('popupDelete', event => {
            Swal.fire('Deleted', 'Popup Deleted Successfully!', 'success');
        })

        window.addEventListener('addPopup', event => {
            Swal.fire('Success', 'Popup Added Successfully!', 'success');
        })


        window.addEventListener('popupUpdate', event => {
            Swal.fire('Success', 'Popup Updated Successfully!', 'success');
        })

        window.addEventListener('addProduct', event => {
            Swal.fire('Success', 'Product Added Successfully!', 'success');
        })

        window.addEventListener('updateProduct', event => {
            Swal.fire('Success', 'Product Updated Successfully!', 'success');
        })

        window.addEventListener('productDelete', event => {
            Swal.fire('Deleted', 'Product Deleted Successfully!', 'success');
        })

        window.addEventListener('updateOnsale', event => {
            Swal.fire('Success', 'On Sale Updated Successfully!', 'success');
        })

        window.addEventListener('updateHomeCategories', event => {
            Swal.fire('Success', 'Home Categories Updated Successfully!', 'success');
        })

        window.addEventListener('updateSettings', event => {
            Swal.fire('Success', 'Settings Updated Successfully!', 'success');
        })

        window.addEventListener('updateOrder', event => {
            Swal.fire('Success', 'Order Status Updated Successfully!', 'success');
        })

        window.addEventListener('homepageBannerFirstLeftDelete', event => {
            Swal.fire('Deleted', 'Banner Deleted Successfully!', 'success');
        })

        window.addEventListener('HomepageBannerFirstLeftUpdate', event => {
            Swal.fire('Success', 'Banner Updated Successfully!', 'success');
        })

        window.addEventListener('addHomepageBannerFirstLeft', event => {
            Swal.fire('Success', 'Banner Created Successfully!', 'success');
        })

        window.addEventListener('AddHomepageBannerFirstRight', event => {
            Swal.fire('Success', 'Banner Created Successfully!', 'success');
        })

        window.addEventListener('EditHomepageBannerFirstRight', event => {
            Swal.fire('Success', 'Banner Updated Successfully!', 'success');
        })

        window.addEventListener('HomepageBannerFirstRightDelete', event => {
            Swal.fire('Deleted', 'Banner Deleted Successfully!', 'success');
        })

        window.addEventListener('AddHomepageBannerSecond', event => {
            Swal.fire('Success', 'Banner Created Successfully!', 'success');
        })

        window.addEventListener('HomepageBannerSecondUpdate', event => {
            Swal.fire('Success', 'Banner Updated Successfully!', 'success');
        })

        window.addEventListener('HomepageBannerSecondDelete', event => {
            Swal.fire('Deleted', 'Banner Deleted Successfully!', 'success');
        })

        window.addEventListener('EditShoppageBanner', event => {
            Swal.fire('Success', 'Banner Updated Successfully!', 'success');
        })

        window.addEventListener('AddShoppageBanner', event => {
            Swal.fire('Success', 'Banner Created Successfully!', 'success');
        })

        window.addEventListener('ShoppageBannerDelete', event => {
            Swal.fire('Deleted', 'Banner Deleted Successfully!', 'success');
        })

        window.addEventListener('AttributeDelete', event => {
            Swal.fire('Deleted', 'Banner Deleted Successfully!', 'success');
        })

        window.addEventListener('addAttribute', event => {
            Swal.fire('Success', 'Attribute Created Successfully!', 'success');
        })

        window.addEventListener('attributeUpdate', event => {
            Swal.fire('Success', 'Attribute Updated Successfully!', 'success');
        })

        window.addEventListener('HomeSliderDelete', event => {
            Swal.fire('Deleted', 'Slider Deleted Successfully!', 'success');
        })

        window.addEventListener('addSlider', event => {
            Swal.fire('Success', 'Slide Created Successfully!', 'success');
        })

        window.addEventListener('sliderUpdate', event => {
            Swal.fire('Success', 'Slider Updated Successfully!', 'success');
        })

        window.addEventListener('CouponDelete', event => {
            Swal.fire('Deleted', 'Coupon Deleted Successfully!', 'success');
        })

        window.addEventListener('addCoupon', event => {
            Swal.fire('Success', 'Coupon Created Successfully!', 'success');
        })

        window.addEventListener('updateCoupon', event => {
            Swal.fire('Success', 'Coupon Updated Successfully!', 'success');
        })

         window.addEventListener('categoryDelete', event => {
            Swal.fire('Deleted', 'Popup Deleted Successfully!', 'success');
        })

    </script>

    @stack('scripts')
</body>
</html>
