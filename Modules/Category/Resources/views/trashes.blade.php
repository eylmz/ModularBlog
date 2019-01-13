@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Kategoriler
                <a href="{{ route('categories.create') }}" class="btn btn-primary pull-right">Yeni Ekle</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Çöp Kutusu <a href="{{ route('categories.index') }}" class="pull-right">Kategoriler ({{ $categoryCount }})</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($categories->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Yazılar</th>
                                <th style="width: 140px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">{{ $category->posts()->count() }}</td>
                                    <td>
                                        <a href="{{ route('categories.restore', $category->id) }}" class="btn btn-primary btn-sm">Geri Yükle</a>
                                        <a href="{{ route('categories.forceDestroy', $category->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Kalıcı Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            Henüz hiç kategori eklenmemiş!
                        </div>
                @endif
                <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <div class="pull-right">
                <a href="{{ route('categories.restoreAll') }}" class="btn btn-primary btn-sm">Tümünü Geri Yükle</a>
                <a href="{{ route('categories.destroyAll') }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Tümünü Kalıcı Sil</a>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection