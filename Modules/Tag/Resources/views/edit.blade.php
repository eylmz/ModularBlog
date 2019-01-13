@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Etiketler
                <a href="{{ route('tags.index') }}" class="btn btn-primary pull-right">Geri Dön</a>
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
                    Kategori Düzenle
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{ route('tags.update', $tag["id"]) }}">
                        @csrf

                        <div class="form-group">
                            <label id="name">Etiket Adı</label>
                            <input class="form-control" name="name" id="name" value="{{ old('name', $tag["name"]) }}">

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