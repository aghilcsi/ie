@if(isset($errors))
    @foreach($errors as $error)
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" dir="rtl">
            <span class="badge badge-pill badge-danger">Error</span>
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif