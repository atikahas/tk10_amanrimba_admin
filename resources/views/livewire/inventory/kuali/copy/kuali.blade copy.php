<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
                                        {{-- <div class="flex items-center space-x-2">
                                            <input type="number" id="item_ttl_{{ $k->id }}" placeholder="1,2,3, ..." wire:model="itemTtl.{{ $k->id }}" class="input input-bordered input-sm w-full" />
                                            <button type="submit" class="btn btn-primary btn-sm {{ $savedRows[$k->id] ? 'btn-success' : 'btn-primary' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>                                          
                                            </button>
                                        </div> --}}
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

