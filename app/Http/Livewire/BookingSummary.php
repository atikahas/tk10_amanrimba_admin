<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;

class BookingSummary extends Component
{
    public $booking, $guest_name, $guest_pax, $guest_group, $check_in, $check_out, $days, $created_by, $booking_id;
    public $isOpen = 0;

    public function render()
    {
        $currentYear = now()->year;

        $ttlbooking = Booking::whereYear('check_in', $currentYear)->count();
        $ttlpax = Booking::whereYear('check_in', $currentYear)->sum('guest_pax');
        $ttldays = Booking::whereYear('check_in', $currentYear)->sum('days');

        $booking = Booking::whereYear('check_in', $currentYear)->get();
        $monthData = []; // Initialize an array to hold data for each month

        for ($month = 1; $month <= 12; $month++) {
            $monthName = date('F', mktime(0, 0, 0, $month, 1, $currentYear));
            $weekdaysCount = 0;
            $weekendsCount = 0;

            // Calculate weekdays and weekends for this month based on $bookings data
            foreach ($booking as $bookingItem) {
                $checkInDate = strtotime($bookingItem->check_in);
                $checkOutDate = strtotime($bookingItem->check_out);
        
                // Check if the booking overlaps with the current month
                if (date('n', $checkInDate) <= $month && date('n', $checkOutDate) >= $month) {
                    // Loop through each day of the booking
                    $currentDate = $checkInDate;
                    while ($currentDate <= $checkOutDate) {
                        // Check if the current day is a weekend (Saturday or Sunday)
                        $dayOfWeek = date('N', $currentDate);
                        if ($dayOfWeek >= 6) {
                            $weekendsCount++;
                        } else {
                            $weekdaysCount++;
                        }
                        
                        // Move to the next day
                        $currentDate = strtotime('+1 day', $currentDate);
                    }
                }
            }

            $monthData[] = [
                'month' => $monthName,
                'weekdays' => $weekdaysCount,
                'weekends' => $weekendsCount,
            ];
        }


        $calendarData = [];

        for ($day = 1; $day <= 365; $day++) {
            $calendarData[] = [
                'day' => $day,
                'color' => 'grey',
            ];
        }
    
        // Update the color for weekends and booked days
        foreach ($booking as $bookingItem) {
            $checkInDate = strtotime($bookingItem->check_in);
            $checkOutDate = strtotime($bookingItem->check_out);
    
            while ($checkInDate <= $checkOutDate) {
                $dayOfYear = date('z', $checkInDate); // Get the day of the year (0-364)
                $dayOfWeek = date('N', $checkInDate); // Get the day of the week (1-7)
    
                // Update the color based on the day of the week
                if ($dayOfWeek >= 6) {
                    $calendarData[$dayOfYear]['color'] = 'red'; // Weekend
                } else {
                    $calendarData[$dayOfYear]['color'] = 'blue'; // Weekday
                }
    
                // Move to the next day
                $checkInDate = strtotime('+1 day', $checkInDate);
            }
        }

        // dd($calendarData);

        return view('livewire.bookings.booking-summary', compact('currentYear','ttlbooking','ttlpax','ttldays','monthData','calendarData'));
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
}
