
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

      <style>

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
  </style>

      </style>
   </head>
   <body>
   

    

    {{ $slot }}

    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.1/apexcharts.min.js" integrity="sha512-YwMWovbODpJxF5IN8vZI3F6v+t/Q0UBrgfeyJUEJYl00uOVWqtWWOIfpplNy88ZL2ZYb5LywrKz2aD0ZtlFU9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js" integrity="sha512-LYmkblt36DJsQPmCK+cK5A6Gp6uT7fLXQXAX0bMa763tf+DgiiH3+AwhcuGDAxM1SvlimjwKbkMPL3ZM1qLbag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/simple-datatables.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/4kwhiuae9ur1blfbr6mga6srqo0b4t2v0ag6no06ajzjvira/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('assets/js/validate.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @livewireScripts

    @stack('scripts')
</body>
</html>
