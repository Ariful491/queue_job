<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gain</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       <link href="{{asset('/assets')}}/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-light">
    @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <div class="container-xxl my-3  card container-xl ">
        <div class="row card-body my-5">
            <div class="col-xxl-12 col-xl-12 col-md-12 mx-auto">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Variant Name</th>
                            <th scope="col">Variant Value</th>
                            <th scope="col" class="text-end">Sku</th>
                            <th scope="col">Barcode</th>
                            <th scope="col" class="text-end">Price</th>
                        </tr>
                    </thead>
                        <tbody>
                            @each('table',$data,'item','no-product')
                        </tbody>
                </table>
            </div>
        </div>
    </div>

     <script src="{{asset('/assets')}}/js/bootstrap.min.js" rel="script"></script>
    </body>
</html>
