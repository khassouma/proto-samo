@extends('layouts.app')

@section('title')
Home
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
                            <h2 class="counter">{{$aControler}}</h2>
                        Dossier en pre-controle
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

        @foreach ( $lastSheets as $sheet )
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
        @endforeach
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
                     <h1 class="text-success counter">250M</h1>
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
                     <h1 class="text-success counter">250M</h1>
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
                     <h1 class="text-success counter">250M</h1>
                     <p class="text-success mb-0">Soins liquider</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

    </div>

    <div class="row">
         <div class="col-lg-4">
         <div class="card">
            <div class="card-body">
               <h2 class="counter mb-3">$3450</h2>
               <p class="mb-2">Your Current Balance</p>
               <h6>20% ($520)</h6>
               <a href="#" class="mt-4 btn btn-danger d-block rounded">Add credit</a>
               <div class="mt-3">
                  <div class="pb-3">
                     <div class="d-flex align-items-center justify-content-between mb-2">
                        <p class="mb-0">Insurance</p>
                        <h4>18</h4>
                     </div>
                     <div class="progress bg-soft-info shadow-none w-100" style="height: 10px">
                        <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div class="pb-3">
                     <div class="d-flex align-items-center justify-content-between mb-2">
                        <p class="mb-0">Savings</p>
                        <h4>124</h4>
                     </div>
                     <div class="progress bg-soft-success shadow-none w-100" style="height: 10px">
                        <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div class="pb-3">
                     <div class="d-flex align-items-center justify-content-between mb-2">
                        <p class="mb-0">Investment</p>
                        <h4>74</h4>
                     </div>
                     <div class="progress bg-soft-primary shadow-none w-100" style="height: 10px">
                        <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div>
                     <div class="d-flex align-items-center justify-content-between mb-2">
                        <p class="mb-0">Progress</p>
                        <h4>89</h4>
                     </div>
                     <div class="progress bg-soft-success shadow-none w-100" style="height: 10px">
                        <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-between">
                        <div>
                           <div class="d-flex">
                              <div class="bg-primary text-white p-3 rounded">
                                 <svg class="icon-25" xmlns="http://www.w3.org/2000/svg" width="25px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <span>CUSTOMER</span>
                           <div>
                              <h3 class="counter">60,586</h3>
                           </div>
                        </div>
                        <div class="mt-3">
                           <div class="badge bg-primary">
                              <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                              <span>3.48%</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-between">
                        <div>
                           <div class="d-flex">
                              <div class="bg-warning text-white p-3 rounded">
                                 <svg class="icon-25" xmlns="http://www.w3.org/2000/svg" width="25px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <span>SALES</span>
                           <div>
                              <h3 class="counter">80,586</h3>
                           </div>
                        </div>
                        <div class="mt-3">
                           <div class="badge bg-warning">
                              <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                              <span>3.48%</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-between">
                        <div>
                           <div class="d-flex">
                              <div class="bg-info text-white p-3 rounded">
                                 <svg class="icon-25" xmlns="http://www.w3.org/2000/svg" width="25px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <span>PROFIT</span>
                           <div>
                              <h3 class="counter">80%</h3>
                           </div>
                        </div>
                        <div class="mt-3">
                           <div class="badge bg-info">
                              <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                              <span>3.48%</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-between">
                        <div>
                           <div class="d-flex">
                              <div class="bg-danger text-white p-3 rounded">
                                 <svg class="icon-25" xmlns="http://www.w3.org/2000/svg" width="25px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <span>LOSS</span>
                           <div>
                              <h3 class="counter">15%</h3>
                           </div>
                        </div>
                        <div class="mt-3">
                           <div class="badge bg-danger">
                              <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                              <span>3.48%</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card">
            <div class="card-body p-3">
               <h5>Assets</h5>
               <div class="text-center">
                  <h1 class="counter mb-2">-108.56K</h1>
                  <p class="mb-0">Lorem ipsum dolor sit amet</p>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body p-3">
               <h5>Liabilities</h5>
               <div class="text-center">
                  <h1 class="counter mb-2">-425.20K</h1>
                  <p class="mb-0">Lorem ipsum dolor sit amet</p>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body p-3">
               <h5>Working Capital</h5>
               <div class="text-center">
                  <h1 class="counter mb-2">-380.40K</h1>
                  <p class="mb-0">Lorem ipsum dolor sit amet</p>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>

@endsection
