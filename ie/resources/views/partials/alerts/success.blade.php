@if(isset($success))
    @foreach($success as $s)
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" dir="rtl">
            <span class="badge badge-pill badge-danger">Error</span>
            {{$s}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif