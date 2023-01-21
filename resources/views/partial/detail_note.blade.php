<div class="col-7 col-sm-9">
    <div class="tab-content" id="vert-tabs-tabContent">
        <div class="tab-pane text-left fade show active" id="vert-tabs-{{ $note_taking->title }}" role="tabpanel"
            aria-labelledby="vert-tabs-home-tab">
            @foreach ($note_taking as $note_taking)
                <div class="list-group list-group-flush border-bottom scrollarea">
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <h5 class="mb-1">{{ $note_taking->title }}</h5>
                            <small>Last Update : {{ $note_taking->updated_at->diffForHumans() }}</small>
                        </div>
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <small> <b>Event :</b>{{ $note_taking->event }}</small>
                        </div>
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <small> <b>Company :</b> {{ $note_taking->company->company_name }}</small>
                        </div>
                        <div class="col-10 mb-1 small">{!! $note_taking->body !!}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
