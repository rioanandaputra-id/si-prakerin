<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="bg-white close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="bg-white close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>