<div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-primary border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Commandes</p>
                            <h4 class="my-1 text-primary">{{count($commandes)}}</h4>
                        </div>
                        <div class="text-primary ms-auto font-35"><i class="bx bx-cart-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-success border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Produits</p>
                            <h4 class="my-1 text-success">{{count($produits)}}</h4>
                        </div>
                        <div class="text-success ms-auto font-35"><i class="bx bx-basket"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10  border-warning border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Clients</p>
                            <h4 class="text-warning my-1">{{count($clients)}}</h4>
                        </div>
                        <div class="text-warning ms-auto font-35"><i class="bx bx-user-pin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-danger border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Catégories</p>
                            <h4 class="my-1 text-danger">{{count($categories)}}</h4>
                        </div>
                        <div class="text-danger ms-auto font-35"><i class="bx bx-tag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

    <!--<div class="row">
       <div class="col-12 col-lg-8">
          <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Sales Overview</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
              <div class="card-body">
                <div class="chart-container-0">
                    <canvas id="chart1"></canvas>
                  </div>
              </div>
          </div>
       </div>
       <div class="col-12 col-lg-4">
           <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Trending Products</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
               <div class="card-body">
                <div class="chart-container-0">
                    <canvas id="chart2"></canvas>
                  </div>
               </div>
           </div>
       </div>
    </div>--><!--end row-->
    
    @if(count($ordersAch) > 0)
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Dernières commandes des produits externes</h6>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Reference</th>
                        <th>Etat</th>
                        <th>Client</th>
                        <th>Pays d'origine</th>
                        <th>Livraison</th>
                        <th>Montant Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordersAch as $o)
                        <tr>
                            <td>{{$o->reference}}</td>
                            <td>
                                @if($o->statut == 0)
                                    <span class="badge bg-info">En attente</span>
                                @elseif($o->statut == 1)
                                    <span class="badge bg-success">Acceptée</span>
                                @else
                                    <span class="badge bg-danger">Rejetée</span>
                                @endif
                            </td>
                            <td>{{$o->user->prenom}} {{$o->user->nom}}</td>
                            <td>{{$o->products[0]->acheminement->pays}}</td>
                            <td>{{$o->shipping}} F CFA</td>
                            <td>{{$o->total_amount}} F CFA</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if(count($orders) > 0)
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Dernières commandes des produits locaux</h6>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                    </a>
                    {{-- <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Reference</th>
                        <th>Etat</th>
                        <th>Client</th>
                        <th>Livraison</th>
                        <th>Montant Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $o)
                        <tr>
                            <td>{{$o->reference}}</td>
                            <td>
                                @if($o->statut == 0)
                                    <span class="badge bg-info">En attente</span>
                                @elseif($o->statut == 1)
                                    <span class="badge bg-success">Acceptée</span>
                                @else
                                    <span class="badge bg-danger">Rejetée</span>
                                @endif
                            </td>
                            <td>{{$o->user->prenom}} {{$o->user->nom}}</td>
                            <td>{{$o->shipping}} F CFA</td>
                            <td>{{$o->total_amount}} F CFA</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
