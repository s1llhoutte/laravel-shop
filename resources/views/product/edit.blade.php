@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
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
            <div class="row">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Наименование"
                               value="{{ old('title', $product->title) }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Описание"
                               value="{{ old('description', $product->description) }}">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Контент">{{ old('content', $product->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Цена"
                               value="{{ old('price', $product->price) }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" class="form-control" placeholder="Количество на складе"
                               value="{{ old('count', $product->count) }}">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                        @if($product->preview_image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview" width="120">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тэг" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}"
                                    {{ in_array($color->id, old('colors', $product->colors->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    #{{ $color->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
