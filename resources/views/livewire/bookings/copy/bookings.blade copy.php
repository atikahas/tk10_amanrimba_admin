<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Booking
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create Booking</button>
            @if($isOpen)
                @include('livewire.bookings.create')
            @endif

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="">Name</th>
                            <th class="px-4 py-2">Pax</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Check In</th>
                            <th class="px-4 py-2">Check Out</th>
                            <th class="px-4 py-2">Action</th>
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
                                <button wire:click="edit({{ $b->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 18px; height: 18px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $b->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="width: 18px; height: 18px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                          
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
    </div>
</div>
