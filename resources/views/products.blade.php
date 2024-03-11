<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ajax Crud</title>

    {{-- my default font family part start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    {{-- my default font family part end --}}

    {{-- custom link from utube bootstarp & line awesome part start --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    {{-- custom link from utube bootstarp & line awesome part ens --}}



    {{-- my custom links part start --}}
    <link rel="stylesheet" href="{{ asset('contents_main/admin/css/style.css') }}">
    {{-- my custom links part end --}}


    {{-- tostr part start --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    {{-- tostr part end --}}
</head>

<body>
    <img src="{{ asset('contents_main/admin/img/background.jpg') }}" class="position-absolute w-100 h-100 z-n1"
        alt="">
    {{-- my customr part start --}}
    <div class="container">
        <div class="row">

            <div class="col-md-2"></div>

            <div class="col-md-8">

                <h2 class="my-3 text-center text-success-emphasis"
                    style="font-family: 'Aref Ruqaa Ink', serif ; font-size: 60px; color: #248c53!important;">Ajax Crud
                    {{-- <span style="font-family: 'Bungee Spice', cursive;">Prianka</span> --}}
                </h2>

                {{-- heading part start --}}
                <div class="heading_part">
                    <a href="#" class="btn btn-success my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add
                        Product</a>

                    <input type="text" name="search" id="search" class="form-control"
                        placeholder="Search Here....">
                </div>
                {{-- heading part end --}}

                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $key => $product)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} /-</td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="las la-eye"></i></a>

                                        <a href="#" class="btn btn-success update_product_form"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}">
                                            <i class="las la-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-danger delete_product"
                                            data-id="{{ $product->id }}">
                                            <i class="las la-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {!! $products->links() !!}

                </div>

            </div>

        </div>
    </div>
    {{-- my customr part end --}}
    {{-- ------------------------------------------------------------------------------------------------------------------------- --}}

    @include('add_product_modal')
    @include('update_product_modal')
    @include('product_js')

    {{-- tostr part start --}}
    {!! Toastr::message() !!}
    {{-- tostr part end --}}

</body>

</html>
