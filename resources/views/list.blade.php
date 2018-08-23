<div class="row">
    <div class="col-lg-12 text-right">
        {!! $records->render() !!}
    </div>
</div>
@forelse ($records as $record)
    <div class="col-xs-12 col-sm-6 col-lg-4">
        <li class="survey-item">
            <span class="survey-name">
                @if(isset($record->text))
                    {{ $record->text }}
                @else
                    <span style="color:#fff">.</span>
                @endif
            </span>
            <div class="input-list">
                <input class="hash" type="text" value="{{ $record->hash }}">
            </div>
            <div class="pull-right-ml">
                <span class="survey-progress">
                    <span class="survey-progress-bg">
                        <span class="survey-progress-fg" style="width: 100%;"></span>
                    </span>
                    <span class="survey-progress-labels">
                        <div class="btn-group">
                            <div class=" dropup icon-option-ml">
                                <span class="glyphicon glyphicon-option-vertical icon-option "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
                                <ul class="dropdown-menu">
                                    <li ><a href="#" class="remove-item" data-id="{{ $record->id }}" data-url="{{ route('record.remove') }}" onclick="return false;">Eliminar</a></li>
                                  </ul>
                            </div>
                            
                        </div>
                    </span>
                </span>
                <span class="survey-end-date ended">{{ $record->created_at->diffForHumans() }}</span>
                <span class="survey-stage">
                    <span class="stage ended active"></span>        
                </span>
            </div>
        </li>
    </div>
@empty
    <div class="no-data">
        <p class="title-no-data">Oops!</p>
        <p class="text">Aún no tienes datos registrados.</p>
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </div>
@endforelse