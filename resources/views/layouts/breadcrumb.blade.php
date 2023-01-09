<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{Request()->route()->getName()}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">{{Request()->route()->getName()}}</li>
            </ol>
            {{--<button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="ti-plus"></i> Create New</button>--}}
            <!-- Outside of any Livewire component -->
            {{--<button onclick="Livewire.emit('openModal', 'classes')" class="btn btn-info d-none d-lg-block m-l-15 text-white"> Create New</button>--}}
        </div>
    </div>
</div>