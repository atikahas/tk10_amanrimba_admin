<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;

class Bookings extends Component
{
    public $booking, $guest_name, $guest_pax, $guest_group, $check_in, $check_out, $days, $created_by, $booking_id;
    public $isOpen = 0;
    
    public function render()
    {
        // $this->bookings = Booking::orderBy('check_in','DESC')->get();
        $bookings = Booking::orderBy('check_in', 'DESC')->paginate(10);

        return view('livewire.bookings.bookings', [
            'bookings' => $bookings,
        ]);

        // return view('livewire.bookings.bookings');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    private function resetInputFields(){
        $this->guest_name = '';
        $this->guest_pax = '';
        $this->guest_group = '';
        $this->check_in = '';
        $this->check_out = '';
        $this->booking_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'guest_name' => 'required',
            'guest_pax' => 'required',
            'guest_group' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
   
        Booking::updateOrCreate(['id' => $this->booking_id], [
            'guest_name' => $this->guest_name,
            'guest_pax' => $this->guest_pax,
            'guest_group' => $this->guest_group,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
        ]);
  
        session()->flash('message', 
            $this->booking_id ? 'Booking Updated Successfully.' : 'Booking Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $this->booking_id = $id;
        $this->guest_name = $booking->guest_name;
        $this->guest_pax = $booking->guest_pax;
        $this->guest_group = $booking->guest_group;
        $this->check_in = $booking->check_in;
        $this->check_out = $booking->check_out;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Booking::find($id)->delete();
        session()->flash('message', 'Booking Deleted Successfully.');
    }
}
