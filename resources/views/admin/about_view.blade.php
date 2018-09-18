@extends('layouts.admin.dashboard')
@section('page_heading','Edit')
@section('section')

    <div class="view-page">
        <div class="text-wrap  mb2">
            @include('message.message')
            <form class="form-hrizontal" method="POST" action="{{ url('admin/about') }}">
                {{ csrf_field() }}
                <input id="slug" type="hidden" class="form-control"  name="slug" value="{{ \Request::segment('3') == 'faq' ? 'faq' : 'about'}}" required
                       autofocus>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Title</label>

                    <input id="title" type="text" maxlength="255" class="form-control" name="title" value="{{ $about->title }}" required
                           autofocus>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Short description to be shown in homepage</label>

                    <textarea name="shot"  class="form-control"  maxlength="255" id="shot">{{ $about->shot }}</textarea>
                    @if ($errors->has('shot'))
                        <span class="help-block">
                            <strong>{{ $errors->first('shot') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Description</label>

                    <textarea name="description"  class="form-control"  id="description">{{ $about->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="button-wrap">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
    <style>
        div#mceu_31 {
            display: none;
        }
    </style>
    @push('scripts')
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector: "#description" });</script>
    @endpush
@stop
