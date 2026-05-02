@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
 <!-- MAIN CONTENT -->
<div class="conatiner-fluid content-inner pb-0">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-soft-info">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="bg-soft-info rounded p-3">
                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-end">
                            <h2 class="counter">{{$enCirculation}}</h2>
                        Dossier en circulation
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-soft-warning">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="bg-soft-warning rounded p-3">
                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"  viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-end">
                            <h2 class="counter">{{$totalAgents}}</h2>
                       Total liquidateurs
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-soft-danger">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="bg-soft-danger rounded p-3">
                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"  viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                    <div class="text-end">
                            <h2 class="counter">{{$avecProbleme}}</h2>
                         Dossier a probleme
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-soft-primary">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="bg-soft-primary rounded p-3">
                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px"  viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-end">
                            <h2 class="counter">{{$aValider}}</h2>
                        Dossier en opsis
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- @foreach ( $lastSheets as $sheet )
        <div class="col-lg-3 col-md-6">
            <div class="card border-bottom border-4 border-0 border-primary">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span>Productiviter du {{ \Carbon\Carbon::parse($sheet->date)->format('d/m') }}</span>
                    </div>
                    <div>
                        <span>Total : {{ $sheet->total ?? 0 }}</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach --}}
    </div>

    <div class="row">
         <div class="col-xl-4 col-lg-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <div class=" bg-soft-success rounded p-3">
                     <svg class="icon-35" xmlns="http://www.w3.org/2000/svg" width="35px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                  </div>
                  <div>
                     <h1 class="text-success counter">{{$stats->pharmacie}}</h1>
                     <p class="text-success mb-0">Pharmacies liquider</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-lg-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <div class=" bg-soft-success rounded p-3">
                     <svg class="icon-35" xmlns="http://www.w3.org/2000/svg" width="35px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                  </div>
                  <div>
                     <h1 class="text-success counter">{{$stats->examens}}</h1>
                     <p class="text-success mb-0">Examens liquider</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
        <div class="col-xl-4 col-lg-6">
         <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <div class=" bg-soft-success rounded p-3">
                     <svg class="icon-35" xmlns="http://www.w3.org/2000/svg" width="35px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                  </div>
                  <div>
                     <h1 class="text-success counter">{{$stats->soins}}</h1>
                     <p class="text-success mb-0">Soins liquider</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

    </div>

    <div class="row">
        <div class="col-lg-4">
         <div class="row">
            <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Top Liquidateurs</h4>
                     {{-- <p class="mb-0">
                        <svg class ="me-2 text-primary icon-24" width="24"  viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                        </svg>
                        15 new acquired this month
                     </p> --}}
                  </div>
               </div>
               <div class="p-0 card-body">
                  <div class="mt-4 table-responsive">
                     <table id="basic-table" class="table mb-0 table-striped" role="grid">
                        <thead>
                           <tr>
                              <th>Matricule</th>
                              <th>Nom</th>
                              <th>Score</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($topAgents as $membre )
                           <tr>
                            <td>{{$membre->agent->matricule}}</td>
                             <td>{{$membre->agent->name}}</td>
                              <td>{{$membre->total}}</td>
                           </tr>
                            @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
        <div class="col-lg-4">
                <div class="card" data-aos="fade-up" data-aos-delay="1000">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Productivité</h4>
                  </div>
                  {{-- <div class="dropdown">
                     <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                     </ul>
                  </div> --}}
               </div>
               <div class="card-body">
                  <div id="d-activity" class="d-activity"></div>
               </div>
            </div>
        </div>
         <div class="col-lg-4">
          <div class="row">
            <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Dossiers recents</h4>
                     {{-- <p class="mb-0">
                        <svg class ="me-2 text-primary icon-24" width="24"  viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                        </svg>
                        15 new acquired this month
                     </p> --}}
                  </div>
               </div>
               <div class="p-0 card-body">
                  <div class="mt-4 table-responsive">
                     <table id="basic-table" class="table mb-0 table-striped" role="grid">
                        <thead>
                           <tr>
                              <th>Tiers payant</th>
                               <th>Type</th>
                               <th>Categorie</th>
                              <th>Feuilles</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastDossiers as $dossier )
                           <tr>
                            <td>{{$dossier->tiers_payant}}</td>
                             <td>{{$dossier->type}}</td>
                             <td>{{$dossier->categorie}}</td>
                              <td>{{$dossier->nombre_fiches}}</td>
                           </tr>
                            @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
    </div>
</div>

@endsection
