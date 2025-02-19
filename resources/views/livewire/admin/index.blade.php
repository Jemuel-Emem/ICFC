<div>
    <!-- Event Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-green-500 mb-2">Total Weddings</h2>
            <p class="text-4xl font-bold text-green-500 mb-4">{{ $totalWeddings }}</p>
            <p class="text-sm text-gray-600">This year</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-blue-500 mb-2">Total Baptisms</h2>
            <p class="text-4xl font-bold text-blue-500 mb-4">{{ $totalBaptisms }}</p>
            <p class="text-sm text-gray-600">This year</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-red-500 mb-2">Total Funerals</h2>
            <p class="text-4xl font-bold text-red-500 mb-4">{{ $totalFunerals }}</p>
            <p class="text-sm text-gray-600">This year</p>
        </div>
    </div>

    <!-- Load Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

    <!-- Separate Calendars for Each Event Type -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Wedding Calendar -->
        <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
            <h2 class="text-xl font-bold text-green-500 mb-2">Wedding Schedules</h2>
            <div id="weddingCalendar"></div>
        </div>

        <!-- Baptism Calendar -->
        <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
            <h2 class="text-xl font-bold text-blue-500 mb-2">Baptism Schedules</h2>
            <div id="baptismCalendar"></div>
        </div>

        <!-- Funeral Calendar -->
        <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
            <h2 class="text-xl font-bold text-red-500 mb-2">Funeral Schedules</h2>
            <div id="funeralCalendar"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var approvedEvents = @json($approvedSchedules);

            console.log("Approved Events:", approvedEvents); // Debugging

            // Separate event types
            let weddingDates = approvedEvents.filter(event => event.type === "wedding").map(event => event.date);
            let baptismDates = approvedEvents.filter(event => event.type === "baptism").map(event => event.date);
            let funeralDates = approvedEvents.filter(event => event.type === "funeral").map(event => event.date);

            console.log("Wedding Dates:", weddingDates);
            console.log("Baptism Dates:", baptismDates);
            console.log("Funeral Dates:", funeralDates);

            // Function to initialize a Flatpickr calendar
            function initCalendar(elementId, eventDates, color) {
                flatpickr(elementId, {
                    inline: true,
                    dateFormat: "Y-m-d",
                    disableMobile: true,
                    enable: eventDates,
                    onDayCreate: function(dObj, dStr, fp, dayElem) {
                        let date = fp.formatDate(fp.parseDate(dayElem.dateObj), "Y-m-d");

                        console.log("Checking date:", date);

                        if (eventDates.includes(date)) {
                            dayElem.style.borderRadius = "50%";
                            dayElem.style.padding = "5px";
                            dayElem.style.backgroundColor = color;
                            dayElem.style.color = "white";

                            let eventLabel = document.createElement("span");
                            eventLabel.innerText = "✓";
                            eventLabel.style.fontSize = "10px";
                            eventLabel.style.display = "block";
                            eventLabel.style.fontWeight = "bold";
                            dayElem.appendChild(eventLabel);
                        }
                    }
                });
            }

            // Initialize calendars with their respective event types
            initCalendar("#weddingCalendar", weddingDates, "#16a34a"); // Green
            initCalendar("#baptismCalendar", baptismDates, "#2563eb"); // Blue
            initCalendar("#funeralCalendar", funeralDates, "#dc2626"); // Red
        });
    </script>
</div>
