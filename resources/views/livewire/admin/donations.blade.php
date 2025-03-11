<div>
    <a href="{{ route('admin.donation-list') }}" class="text-blue-500 hover:text-blue-600 underline">Donations List</a>
    <div class="flex justify-center items-center p-4">
        <div class="  rounded-lg p-6 w-full max-w-4xl receipt-container">
            <h2 class="text-2xl font-bold text-center mb-6">Charitable Donation Receipt</h2>

            <form wire:submit.prevent="save">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Date:</label>
                        <input type="date" wire:model="date" class="w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-gray-700">Received of:</label>
                        <input type="text" wire:model="donor" class="w-full border border-gray-300 rounded-md p-2" placeholder="Donor Name">
                    </div>
                </div>

                <table class="w-full border border-gray-300 text-left mt-4">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-2 border">ICFC</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border">Goods</td>
                            <td class="p-2 border">
                                <input type="text" value="ICFC (Aglipay Memorial Church)" class="w-full border-none outline-none text-right" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 border">Services</td>
                            <td class="p-2 border">
                                <input type="text" wire:model.lazy="services" class="w-full border-none outline-none text-right">
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 border">Cash</td>
                            <td class="p-2 border">
                                <input type="text" wire:model.lazy="cash" class="w-full border-none outline-none text-right">
                            </td>
                        </tr>
                        <tr class="font-bold">
                            <td class="p-2 border">TOTAL</td>
                            <td class="p-2 border">
                                <input type="text" wire:model="total" class="w-full border-none outline-none text-right" readonly>
                            </td>
                        </tr>
                        <tr class="font-bold text-green-600">
                            <td class="p-2 border">CHANGE</td>
                            <td class="p-2 border">
                                <input type="text" wire:model="change" class="w-full border-none outline-none text-right text-green-600" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>



                <div class="mt-6 flex justify-end no-print">
                    <button type="submit" onclick="printReceipt()" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        Submit and Print
                    </button>

                </div>
            </form>
        </div>
    </div>

    <script>
        function printReceipt() {
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
