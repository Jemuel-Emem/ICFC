<div>

    <div class="flex justify-center items-center p-4">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-7xl">
            <h2 class="text-2xl font-bold text-start mb-6">Donations List</h2>

            <table class="w-full border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">Date</th>
                        <th class="p-2 border">Donor Name</th>
                        <th class="p-2 border">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <td class="p-2 border">{{ $donation->donation_date }}</td>
                            <td class="p-2 border">{{ $donation->donor_name }}</td>
                            <td class="p-2 border">{{ number_format($donation->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-4 flex justify-between items-center">
                <div>

                    {{ $donations->links() }}
                </div>
                {{-- <button type="button" onclick="printDonations()" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                    Print Donations
                </button> --}}
            </div>
        </div>
    </div>

    <script>
        function printDonations() {
            window.print();
        }
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .receipt-container, .receipt-container * {
                visibility: visible;
            }
            .receipt-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</div>
