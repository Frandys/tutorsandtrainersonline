@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Tutor list')
<section class="inner-page-title">
    <div class="container">
        <div class="form-wrap">
            <h2>Find A...<i class="fas fa-angle-down"></i></h2>
            @include('includes.search_form')

        </div>
    </div>
</section>
<section id="tutors-listing">

    <div class="container">
        <div class="listing-wrap">
            @if(empty($usersMeta['data']))
                <div class="alert alert-primary">
                      <strong>!</strong> No data find.
                </div>
            @endif
            @foreach($usersMeta['data'] as $user)
                <div class="row no-gutters list-items">
                    <div class="col-sm-3">
                        <div class="img-wrap">
                            <img class="img-fluid"
                                 src="{{$user['user']['photo'] ? asset('images/photo/').'/'.$user['user']['photo'] : asset('images/photo/dummy.png')}}">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-wrap">
                            <a class="tutor-name" href="{{url('tutors/').'/'.encrypt($user['user']['id'])}}">
                                {{--<h4 class="media-heading">{{substr($user['user']['first_name'],'0',1  ) . str_repeat("*", strlen($user['user']['first_name'])-1)}} {{substr($user['user']['last_name'],'0',1  ) . str_repeat("*", strlen($user['user']['last_name'])-1)}} </h4>--}}
                            <h4>{{$user['uuid']}}</h4>
                            </a>
                            <p class="sub-str">{{str_limit($user['about'], 100).'...'}}</p>
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p><strong>Country:</strong><span>{{$user['country']['name']}}</span></p>
                                    </div>
                                    <div class="col-sm-6">
                                        {{--<p><strong>Discipline:</strong><span>{{$user['disciplines']['name']}}</span></p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-4">
                                        @foreach($user['categories']  as $categorie)
                                            <p><strong>Skill:</strong><span>{{$categorie['name']}}</span></p>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-4">
                                        @foreach($user['qualified_level']  as $qualified_level)
                                            <p><strong>Level:</strong><span>{{$qualified_level['level']}}</span></p>
                                        @endforeach
                                    </div>

                                    <div class="col-sm-4">
                                        @foreach($user['disciplines']  as $discipline)
                                            <p><strong>Type:</strong><span>{{$discipline['name']}}</span></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($usersMeta['last_page'] > '1')
        <ul class="pagination">
            @if ($usersMeta['prev_page_url'] != '')
                <li class="page-item "><a class="page-link" href="{{$usersMeta['prev_page_url'] . '&'. strstr($_SERVER['QUERY_STRING'], 'specialist')}}">Previous</a></li>
            @endif
            @for($i = 1; $i <= $usersMeta['last_page']; $i++)
                <li class="page-item {{$usersMeta['current_page'] == $i ? 'active' : ''}} "><a class="page-link"
                 href="{{$usersMeta['path']. '?page=' . $i . '&'. strstr($_SERVER['QUERY_STRING'], 'specialist') }}">{{$i}}</a>
                </li>
            @endfor
            @if ($usersMeta['next_page_url'] != '')
                <li class="page-item"><a class="page-link" href="{{$usersMeta['next_page_url'] . '&'. strstr($_SERVER['QUERY_STRING'], 'specialist')}}">Next</a></li>
            @endif
        </ul>
        @endif
    </div>

</section>
@stop