@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editer du service {{$service->titre}}</h1>
@stop

@section('content')
    <div class="container pb-5">
        <form action="{{route('services.update',$service->id)}}" method="POST">    
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="">Titre</label>
                <input type="text" class="form-control" name="titre" value="{{$service->titre}}">
            </div>
            <div class="form-group">
                <label for="">Description de du service</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$service->description}}</textarea>
            </div>
            <div class="form-group">
                <div class="row bg-white mx-0">
                    <?php
                        $tabs = ['flaticon-001-picture',
                        'flaticon-002-caliper',
                        'flaticon-003-energy-drink',
                        'flaticon-004-build',
                        'flaticon-005-thinking-1',
                        'flaticon-006-prism',
                        'flaticon-007-paint',
                        'flaticon-008-team',
                        'flaticon-009-idea-3',
                        'flaticon-010-diamond',
                        'flaticon-011-compass',
                        'flaticon-012-cube',
                        'flaticon-013-puzzle',
                        'flaticon-014-magic-wand',
                        'flaticon-015-book',
                        'flaticon-016-vision',
                        'flaticon-017-notebook',
                        'flaticon-018-laptop-1',
                        'flaticon-019-coffee-cup',
                        'flaticon-020-creativity',
                        'flaticon-021-thinking',
                        'flaticon-022-branding',
                        'flaticon-023-flask',
                        'flaticon-024-idea-2',
                        'flaticon-025-imagination',
                        'flaticon-026-search',
                        'flaticon-027-monitor',
                        'flaticon-028-idea-1',
                        'flaticon-029-sketchbook',
                        'flaticon-030-computer',
                        'flaticon-031-scheme',
                        'flaticon-032-explorer',
                        'flaticon-033-museum',
                        'flaticon-034-cactus',
                        'flaticon-035-smartphone',
                        'flaticon-036-brainstorming',
                        'flaticon-037-idea',
                        'flaticon-038-graphic-tool-1',
                        'flaticon-039-vector',
                        'flaticon-040-rgb',
                        'flaticon-041-graphic-tool',
                        'flaticon-042-typography',
                        'flaticon-043-sketch',
                        'flaticon-044-paint-bucket',
                        'flaticon-045-video-player',
                        'flaticon-046-laptop',
                        'flaticon-047-artificial-intelligence',
                        'flaticon-048-abstract',
                        'flaticon-049-projector',
                        'flaticon-050-satellite'];
                    ?>
                    @foreach ($tabs as $tab)
                        <div class="col-lg-1 col-md-2 col-sm-2 col-2 d-flex flex-column text-center">
                            <label for="{{$tab}}"><i class="{{$tab}} logo" style="font-size: 40px;"></i></label>
                            @if ($service->logo == $tab)
                                <input type="radio" name="logo" id="{{$tab}}" value="{{$tab}}" class="mx-auto" checked>
                            @else
                                <input type="radio" name="logo" id="{{$tab}}" value="{{$tab}}" class="mx-auto">
                            @endif                            
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
