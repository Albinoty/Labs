@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout d'un service</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('services.store')}}" method="POST">    
            @csrf
            @method('post')
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="">Titre</label>
                <input type="text" class="form-control" name="titre">
            </div>
            <div class="form-group">
                <label for="">Description de du service</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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
                        <div class="col-1 d-flex flex-column text-center">
                            <label for="{{$tab}}"><i class="{{$tab}} logo"></i></label>
                            <input type="radio" name="logo" id="{{$tab}}" value="{{$tab}}" class="mx-auto">
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
