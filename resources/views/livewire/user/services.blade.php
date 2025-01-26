<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">

    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
      <h2 class="text-2xl font-bold text-pink-500 mb-2">Wedding</h2>
      <p class="text-gray-600 mb-4">Celebrate the union of love and commitment in a beautiful ceremony.</p>
     <a href="{{ route('user-wedding') }}"> <button class="bg-gray-700 text-white py-2 px-4 rounded hover:bg-gray-800">
        Appoint Now
      </button></a>
    </div>


    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
      <h2 class="text-2xl font-bold text-blue-500 mb-2">Baptism</h2>
      <p class="text-gray-600 mb-4">Welcome a new member into the faith with a sacred and joyful celebration.</p>
      <a href="{{ route('user-baptism') }}"> <button class="bg-gray-700 text-white py-2 px-4 rounded hover:bg-gray-800">
        Appoint Now
      </button></a>
    </div>


    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
      <h2 class="text-2xl font-bold text-gray-700 mb-2">Funeral</h2>
      <p class="text-gray-600 mb-4">Honor and remember a loved one with a meaningful ceremony.</p>
     <a href="{{ route('user-funeral') }}">
        <button class="bg-gray-700 text-white py-2 px-4 rounded hover:bg-gray-800">
            Appoint Now
          </button>
     </a>
    </div>
  </div>
