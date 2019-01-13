@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Yazılar
                <a href="{{ route('blogs.create') }}" class="btn btn-primary pull-right">Yeni Ekle</a>
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
                    Çöp Kutusu <a href="{{ route('blogs.index') }}" class="pull-right">Yazılar ({{ $postCount }})</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($trashes->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Yazı Adı</th>
                                <th>Kategoriler</th>
                                <th>Etiketler</th>
                                <th style="width: 140px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trashes as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td class="text-center">{{ $post->categories()->count() }}</td>
                                    <td class="text-center">{{ $post->tags()->count() }}</td>
                                    <td>
                                        <a href="{{ route('blogs.restore', $post->id) }}" class="btn btn-primary btn-sm">Geri Yükle</a>
                                        <a href="{{ route('blogs.forceDestroy', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Kalıcı Sil</a>
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
                <a href="{{ route('blogs.restoreAll') }}" class="btn btn-primary btn-sm">Tümünü Geri Yükle</a>
                <a href="{{ route('blogs.destroyAll') }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Tümünü Kalıcı Sil</a>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection