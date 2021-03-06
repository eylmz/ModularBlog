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
                    Yazılar <a href="{{ route('blogs.trashes') }}" class="pull-right">Çöp Kutusu ({{ $trashCount }})</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($posts->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Yazı Adı</th>
                                <th>Kategoriler</th>
                                <th>Etiketler</th>
                                <th style="width: 100px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td class="text-center">{{ $post->categories()->count() }}</td>
                                    <td class="text-center">{{ $post->tags()->count() }}</td>
                                    <td>
                                        <a href="{{ route('blogs.edit', $post->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                        <a href="{{ route('blogs.destroy', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            Henüz hiç yazı eklenmemiş!
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