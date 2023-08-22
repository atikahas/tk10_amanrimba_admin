<div>
    <div class="flex justify-end">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">Home</a></li> 
                <li><a href="{{ route('inv') }}">Inventory</a></li> 
                <li>Kuali</li> 
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            Inventory: Kuali
        </h2>
        <div class="flex flex-col w-full sm:flex-row gap-4">
            <div class="sm:w-1/5">
                <ul class="menu bg-white w-full rounded-box">
                    <li>
                      <a href="{{ route('inv.kuali') }}" class="{{ $activeTab == 'inv.kuali' ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        List & Update
                      </a>
                    </li>
                    <li>
                      <a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                        Report
                      </a>
                    </li>
                  </ul>
            </div>
            <div class="sm:w-4/5">
                 <div class="card w-full bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="overflow-x-auto">
                            <table class="table table-sm table-fixed w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th width="10%">No</th>
                                        <th>Item Name</th>
                                        <th>Total (Pcs)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kuali as $i => $k)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $i + 1 }}</td> 
                                        <td class="border px-4 py-2">{{ $k->item_name }}</td>
                                        <td class="border px-4 py-2">
                                            <form wire:submit.prevent="updateTtl({{ $k->id }})">
                                                <div class="form-control">
                                                    <div class="input-group">
                                                        <input type="number" id="item_ttl_{{ $k->id }}" placeholder="1,2,3, ..." wire:model="itemTtl.{{ $k->id }}" class="input input-bordered input-sm w-full" />
                                                        <button type="submit" class="btn btn-square btn-primary btn-sm {{ $savedRows[$k->id] ? 'btn-success' : 'btn-primary' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg> 
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
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

