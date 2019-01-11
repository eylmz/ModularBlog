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
            @if(session('success') == 'create')
                Kategori başarıyla eklendi!
            @elseif(session('success') == 'update')
                Kategori başarıyla düzenlendi!
            @elseif(session('success') == 'delete')
                Kategori başarıyla silindi!
            @endif
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kategoriler
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($categories->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Yazılar</th>
                                <th style="width: 100px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">{{ $category->posts()->count() }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                        <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Sil</a>
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
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection