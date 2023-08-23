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
                <ul class="menu bg-white w-full rounded-box shadow">
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
                        <a href="{{ route('booking.summary') }}" class="{{ request()->routeIs('booking.summary') ? 'active' : '' }}">
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
                <div class="stats shadow w-full">
                    <div class="stat">
                        <div class="stat-title">Total Booked</div>
                        <div class="stat-value">{{ $ttlbooking }}</div>
                        <div class="stat-desc">Year {{ $currentYear }}</div>
                        </div>
                        
                        <div class="stat">
                        <div class="stat-title">Total Pax</div>
                        <div class="stat-value">{{ $ttlpax }}</div>
                        <div class="stat-desc">Person</div>
                        </div>
                        
                        <div class="stat">
                        <div class="stat-title">Total Days</div>
                        <div class="stat-value">{{ $ttldays }}</div>
                        <div class="stat-desc">365 Days</div>
                    </div>
                </div>
                <div class="card w-full bg-base-100 shadow mt-4">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="card w-full bg-base-100 shadow mt-4">
                    <div class="card-body">
                        <div class="stat-title">Monthly booked by Weekdays & Weekends</div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="https://d3js.org/d3.v5.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    
    // Extract data from the Blade template and convert it to JavaScript
    var monthData = @json($monthData);
    
    // Extract month names, weekdays, and weekends from monthData
    var monthNames = monthData.map(function(item) { return item.month; });
    var weekdays = monthData.map(function(item) { return item.weekdays; });
    var weekends = monthData.map(function(item) { return item.weekends; });
    
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthNames,
            datasets: [{
                label: 'Weekdays',
                data: weekdays,
                backgroundColor: 'rgba(87, 14, 248, 0.2)', // Adjust the color as needed
                borderColor: 'rgba(87, 14, 248, 1)', // Adjust the color as needed
                borderWidth: 1
            }, {
                label: 'Weekends',
                data: weekends,
                backgroundColor: 'rgba(241, 0, 184, 0.2)', // Adjust the color as needed
                borderColor: 'rgba(241, 0, 184, 1)', // Adjust the color as needed
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>

    // Define your calendar dimensions and layout parameters
     var cellSize = 14;
     var width = Math.ceil(365 / 7) * cellSize; // Number of weeks in a year
     var height = 7 * cellSize; // 7 rows for each day of the week
     var calendarData = @json($calendarData);
 
     // Adjust the width to include extra space for the day labels
     var totalWidth = width + cellSize * 2; 
 
     // Create an SVG element to contain the calendar with extra width
     var svg = d3.select("#calendar")
         .append("svg")
         .attr("width", totalWidth)
         .attr("height", height)
         .append("g")
         .attr("transform", "translate(" + cellSize * 2 + ", 0)"); // Move the calendar box to the right
 
     // Define a color scale for mapping colors
     var colorScale = d3.scaleOrdinal()
         .domain(["grey", "blue", "red"])
         .range(["#e5e5e5", "#570ef8", "#f100b8"]);
 
     // Loop through the calendarData and create rectangles for each day
     var days = svg.selectAll(".day")
         .data(calendarData)
         .enter().append("rect")
         .attr("class", "day")
         .attr("stroke", "#fff")
         .attr("width", cellSize)
         .attr("height", cellSize)
         .attr("x", function(d, i) { return Math.floor(i / 7) * cellSize; })
         .attr("y", function(d, i) { return (i % 7) * cellSize; })
         .style("fill", function(d) { return colorScale(d.color); });
 
     // Add text labels for the days on the left vertically
     var dayLabels = svg.selectAll(".dayLabel")
         .data(["S", "M", "T", "W", "T", "F", "S"])
         .enter().append("text")
         .attr("class", "dayLabel")
         .attr("x", -10) // Place the day labels to the left
         .attr("y", function(d, i) { return i * cellSize + cellSize / 2; })
         .style("text-anchor", "middle")
         .style("writing-mode", "tb-rl") // Vertical writing mode
         .text(function(d) { return d; });
 
     // Add a title for the calendar
     svg.append("text")
         .attr("x", totalWidth / 2)
         .attr("y", -25)
         .attr("text-anchor", "middle")
         .style("font-size", "18px")
         .text("Beautiful Calendar");
 
 
 
 </script>


