<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="form-control w-full">
              <label class="label"><span class="label-text">Guest name?</span></label>
              <input type="text" id="guest_name" placeholder="Enter Name" wire:model="guest_name" class="input input-bordered input-sm w-full" />
              @error('guest_name') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="form-control w-full">
              <label class="label"><span class="label-text">No. of Pax?</span></label>
              <input type="number" id="guest_name" placeholder="1,2,3, ..." wire:model="guest_pax" class="input input-bordered input-sm w-full" />
              @error('guest_pax') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Group Type</span>
              </label>
              <select class="select select-bordered select-sm w-full" wire:model="guest_group">
                <option disabled selected>Select Group</option>
                <option value="Family">Family</option>
                <option value="Company">Company</option>
                <option value="Internal">Internal</option>
              </select>
              @error('guest_group') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="grid grid-cols-2 gap-2">
              <div>
                  <label class="label"><span class="label-text">Check In</span></label>
                  <input type="date" class="input input-bordered input-sm w-full" id="check_in" placeholder="1,2,3, ..." wire:model="check_in">
                  @error('check_in') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div>
                  <label class="label"><span class="label-text">Check Out</span></label>
                  <input type="date" class="input input-bordered input-sm w-full" id="check_out" placeholder="1,2,3, ..." wire:model="check_out">
                  @error('check_out') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 flex w-full sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="btn btn-sm btn-success">
              Save
            </button>
          </span>
          <span class="mt-3 flex w-full sm:mt-3 sm:w-auto">
            <button wire:click="closeModal()" type="button" class="btn btn-sm">
              Cancel
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
