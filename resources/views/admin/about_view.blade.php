@extends('layouts.admin.dashboard')
@section('page_heading','Edit')
@section('section')

    @include('message.message')

    <div class="view-page">
        <div class="text-wrap  mb2">

            <form class="form-hrizontal" method="POST" action="{{ url('admin/about') }}">
                {{ csrf_field() }}
                <input id="slug" type="hidden" class="form-control" name="slug" value="{{ \Request::segment('3') == 'faq' ? 'faq' : 'about'}}" required
                       autofocus>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Title</label>

                    <input id="title" type="text" class="form-control" name="title" value="{{ $about->title }}" required
                           autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Description</label>

                    <textarea name="description" id="description">{{ $about->description }}</textarea>
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
        <script>tinymce.init({selector: 'textarea'});</script>
    @endpush
@stop
