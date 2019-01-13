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
                    Etiketler <a href="{{ route('tags.trashes') }}" class="pull-right">Çöp Kutusu ({{ $trashCount }})</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if($tags->count())
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Etiket Adı</th>
                                <th>Yazılar</th>
                                <th style="width: 100px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td class="text-center">{{ $tag->posts()->count() }}</td>
                                    <td>
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                                        <a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">Sil</a>
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
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection