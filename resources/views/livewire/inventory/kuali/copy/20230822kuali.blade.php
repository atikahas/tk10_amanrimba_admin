<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-col w-full sm:flex-row gap-4">
            <div class="sm:w-1/5">
                <ul class="menu bg-white w-full rounded-box">
                    <li>
                      <a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        List
                      </a>
                    </li>
                    <li>
                      <a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Update
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
                            <table class="table table-xs table-fixed w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="">Item Name</th>
                                        <th class="px-4 py-2" width="15%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kuali as $k)
                                    <tr>
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

