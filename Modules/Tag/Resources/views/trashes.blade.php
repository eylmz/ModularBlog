@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Etiketler
                <a href="{{ route('tags.create') }}" class="btn btn-primary pull-right">Yeni Ekle</a>
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
                    Çöp Kutusu <a href="{{ route('tags.index') }}" class="pull-right">Etiketler ({{ $tagCount }})</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($tags->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Etiket Adı</th>
                                <th>Yazılar</th>
                                <th style="width: 140px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td class="text-center">{{ $tag->posts()->count() }}</td>
                                    <td>
                                        <a href="{{ route('tags.restore', $tag->id) }}" class="btn btn-primary btn-sm">Geri Yükle</a>
                                        <a href="{{ route('tags.forceDestroy', $tag->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Kalıcı Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            Henüz hiç etiket eklenmemiş!
                        </div>
                @endif
                <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <div class="pull-right">
                <a href="{{ route('tags.restoreAll') }}" class="btn btn-primary btn-sm">Tümünü Geri Yükle</a>
                <a href="{{ route('tags.destroyAll') }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Tümünü Kalıcı Sil</a>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection