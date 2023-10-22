<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button  wire:click.prevent="changeType('add')" class="btn btn-success">Ajouter</button>
            </div>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body">
           <div class="d-flex align-items-center">
               <div>
                   <h6 class="mb-0">La liste des categories</h6>
               </div>
               
           </div>
            <div class="table-responsive">
                @if($type == "add")
                    @include('livewire.admin.category.add')
                @else
                <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                    <th>Product</th>
                    <th>Photo</th>
                    <th>Product ID</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Iphone 5</td>
                        <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
                        <td>#9405822</td>
                        <td><span class="badge bg-success text-white shadow-sm">Paid</span></td>
                        <td>$1250.00</td>
                        <td>03 Feb 2020</td>
                        </tr>
                </tbody>
                </table>
                @endif
            </div>
        </div>
     </div>
</div>
