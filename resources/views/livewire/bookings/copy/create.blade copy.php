<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
    
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="">
                <div class="mb-4">
                    <label for="guest_name" class="block text-gray-700 text-sm font-bold mb-2">Guest Name:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="guest_name" placeholder="Enter Name" wire:model="guest_name">
                    @error('guest_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="guest_pax" class="block text-gray-700 text-sm font-bold mb-2">No. of Pax:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="guest_pax" placeholder="1,2,3, ..." wire:model="guest_pax">
                    @error('guest_pax') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="guest_group" class="block text-gray-700 text-sm font-bold mb-2">Group Type:</label>
                    <select id="countries" class="bg-gray-50 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="guest_group">
                        <option selected>-- Select Group --</option>
                        <option value="Family">Family</option>
                        <option value="Company">Company</option>
                        <option value="Internal">Internal</option>
                    </select>
                    @error('guest_group') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="check_in" class="block text-gray-700 text-sm font-bold mb-2">Check in:</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="check_in" placeholder="1,2,3, ..." wire:model="check_in">
                            @error('check_in') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="check_out" class="block text-gray-700 text-sm font-bold mb-2">Check out:</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="check_out" placeholder="1,2,3, ..." wire:model="check_out">
                            @error('check_out') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
          </div>
        </div>
    
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Save
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
          </form>
        </div>
          
      </div>
    </div>
  </div>