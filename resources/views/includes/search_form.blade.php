<form class="form-inline" method="get" action="tutors">

    <div class="form-group ">
        <select class="form-control" name="disciplines[]"  id="disciplines" multiple="">

                 @foreach($disciplines as  $discipline)
                     @if(isset($discipline->childrenDisciplines['0']))
                         <optgroup label="{{$discipline->name}}"
                                   data-max-options="1">
                             @foreach($discipline->childrenDisciplines as  $disciplineChild)
                                 <option value="{{$disciplineChild->name}}"  {{ !empty(\Input::get('disciplines')) ? in_array($disciplineChild->name , \Input::get('disciplines'))   ? 'selected="selected"' : '' : ''}}>{{$disciplineChild->name}}</option>                                                                            @endforeach
                     @endif
                 @endforeach
        </select>
    </div>

    <div class="form-group ">

        <select class="form-control" name="specialist[]" id="specialist" multiple="">
            @foreach($categories as  $categorieItem)
                @if(isset($categorieItem->children['0']))
                    <optgroup label="{{$categorieItem->name}}"
                              data-max-options="1">
                        @foreach($categorieItem->children as  $categorieChild)
                            <option value="{{$categorieChild->name}}" {{ !empty(\Input::get('specialist')) ? in_array($categorieChild->name , \Input::get('specialist'))   ? 'selected="selected"' : '' : ''}} >{{$categorieChild->name}}</option>
                        @endforeach
                        @endif
                        @endforeach
                    </optgroup>
        </select>
    </div>

    <div class="form-group ">
        <select class="form-control" name="level[]"  id="level" multiple="">
             @foreach($levels as  $level)
                @if(isset($level->childrenLevels['0']))
                    <optgroup label="{{$level->level}}"
                              data-max-options="1">
                        @foreach($level->childrenLevels as  $levelChild)
                            <option value="{{$levelChild->level}}" {{ !empty(\Input::get('level')) ? in_array($levelChild->level , \Input::get('level'))   ? 'selected="selected"' : '' : ''}} >{{$levelChild->level}}</option>                                                                            @endforeach
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group ">

    <select class="form-control" name="location[]" id="location" multiple="">
        @foreach($countrys as  $country)
            @if(isset($country->children['0']))
                <optgroup label="{{$country->name}}"
                          data-max-options="1">
                    @foreach($country->children as  $categorieChild)
                        <option value="{{$categorieChild->name}}" {{ !empty(\Input::get('location')) ? in_array($categorieChild->name , \Input::get('location'))   ? 'selected="selected"' : '' : ''}}>{{$categorieChild->name}}</option>
                    @endforeach
                    @endif
                    @endforeach
                </optgroup>
    </select>
    </div>
    <button type="submit" class="btn btn-primary "><i class="fas fa-search"></i>Find</button>
</form>

    @push('scripts')
        <script>
    $(document).ready(function () {
         $('#specialist').multiselect({
            nonSelectedText: 'Select specialist',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '500px'
        });

        $('#disciplines').multiselect({
            nonSelectedText: 'Select type',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '500px'
        });

        $('#level').multiselect({
            nonSelectedText: 'Select level',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '500px'
        });

        $('#location').multiselect({
            nonSelectedText: 'Select location',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '500px'
        });
    });
</script>
@endpush