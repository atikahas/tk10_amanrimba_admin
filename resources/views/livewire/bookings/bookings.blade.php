{{-- <div class="">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if($isOpen)
            @include('livewire.bookings.create')
        @endif
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-actions justify-end">
                    <button wire:click="create()" class="btn btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Create Booking
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-sm table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="" width="20%">Name</th>
                                <th class="px-4 py-2" width="10%">Pax</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Check In</th>
                                <th class="px-4 py-2">Check Out</th>
                                <th class="px-4 py-2" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $b)
                            <tr>
                                <td class="border px-4 py-2">{{ $b->guest_name }}</td>
                                <td class="border px-4 py-2">{{ $b->guest_pax }}</td>
                                <td class="border px-4 py-2">{{ $b->guest_group }}</td>
                                <td class="border px-4 py-2">{{ $b->check_in }}</td>
                                <td class="border px-4 py-2">{{ $b->check_out }}</td>
                                <td class="border px-4 py-2" width="10%">
                                    <button wire:click="edit({{ $b->id }})" class="btn btn-xs btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 15px; height: 15px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $b->id }})" class="btn btn-xs btn-error">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 15px; height: 15px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                          
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div>
    <div class="flex justify-end">
      <div class="text-sm breadcrumbs">
          <ul>
              <li><a href="{{ route('dashboard') }}">Home</a></li> 
              <li>Booking</li> 
          </ul>
      </div>
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
          Booking
        </h2>
        <div class="flex flex-col w-full sm:flex-row gap-4">
            <div class="sm:w-1/5">
                <ul class="menu bg-white w-full rounded-box">
                    <li>
                        <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            List
                        </a>
                    </li>
                    <li>
                        <a wire:click="create()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Create New
                        </a>
                    </li>
                    <li>
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                            Summary
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sm:w-4/5">
                @if($isOpen)
                    @include('livewire.bookings.create')
                @endif
                <div class="card w-full bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="overflow-x-auto">
                            <table class="table table-sm table-fixed w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="" width="20%">Name</th>
                                        <th class="px-4 py-2" width="10%">Pax</th>
                                        <th class="px-4 py-2">Type</th>
                                        <th class="px-4 py-2">Check In</th>
                                        <th class="px-4 py-2">Check Out</th>
                                        <th class="px-4 py-2" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $b)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $b->guest_name }}</td>
                                        <td class="border px-4 py-2">{{ $b->guest_pax }}</td>
                                        <td class="border px-4 py-2">{{ $b->guest_group }}</td>
                                        <td class="border px-4 py-2">{{ $b->check_in }}</td>
                                        <td class="border px-4 py-2">{{ $b->check_out }}</td>
                                        <td class="border px-4 py-2" width="10%">
                                            <button wire:click="edit({{ $b->id }})" class="btn btn-xs btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 15px; height: 15px;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </button>
                                            <button wire:click="delete({{ $b->id }})" class="btn btn-xs btn-error">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 15px; height: 15px;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>                                          
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>