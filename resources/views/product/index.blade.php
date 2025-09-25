@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Контент</th>
                                    <th>Картинка-превью</th>
                                    <th>Цена</th>
                                    <th>Количество на складе</th>
                                    <th>Категория</th>
                                    <th>Тэги</th>
                                    <th>Цвета</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}">
                                              {{ $product->title }}
                                            </a>
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>
                                            <div style="width: 100px; height: 100px;
                                                background: url('{{ asset('storage/' . $product->preview_image) }}'); background-size: cover; background-position: center center;
                                                ">
                                            </div>
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{ $product->category->title }}</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                <div>{{ $tag->title }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <div style="width: 16px; height: 16px;
                                                background: {{ '#' . $color->title }};"
                                                class="mb-2">
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
