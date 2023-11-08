<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Administrateurs</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                @if($type != "list")
                <button  wire:click.prevent="changeType('list')" class="btn btn-info">Retour</button>
                @else
                <button  wire:click.prevent="changeType('add')" class="btn btn-success">Ajouter</button>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 card border-primary border-bottom border-3 border-0">
            <img src="themes/images/gallery/01.png" width="100%" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-primary">Card title</h5>
                <hr>
                <div class="d-flex align-items-center gap-2">
                    <a href="javascript:;" class="btn btn-inverse-primary"><i class="bx bx-star"></i></a>
                    <a href="javascript:;" class="btn btn-primary"><i class="bx bx-microphone"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
