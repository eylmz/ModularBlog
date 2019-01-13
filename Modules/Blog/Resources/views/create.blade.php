@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Yazılar
                <a href="{{ route('blogs.index') }}" class="btn btn-primary pull-right">Geri Dön</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if($errors->any())
        <div class="alert bg-danger" role="alert">
            <strong>Hata!</strong><br/>
            @foreach($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Yazı Ekle
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{ route('blogs.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Yazı Adı</label>
                            <input class="form-control" name="name" id="name" value="{{ old('name') }}">

                        </div>

                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>

                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select multiple id="category" name="categories[]" class="form-control">,

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', []))  ? 'selected':null }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tag">Etiketler</label>
                            <select multiple id="tag" name="tags[]" class="form-control">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected':null }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>

                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection