<h3 class="text-2xl font-worksans font-semibold ">Personal Information</h3>
<h3 class="text-sm font-worksans mb-6">Update your account information, confirm password to update </h3>
{{-- Success Message --}}
@if(session('success'))
<div class="mb-4 p-4 rounded-md bg-green-100 border border-green-400 text-green-700">
  {{ session('success') }}
</div>
@endif

{{-- Error Message --}}
@if(session('error'))
<div class="mb-4 p-4 rounded-md bg-red-100 border border-red-400 text-red-700">
  {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="mb-4 p-4 rounded-md bg-red-100 border border-red-400 text-red-700">
  <ul class="list-disc list-inside">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<div class="flex gap-10">
  <form method="POST" action="{{ route('p.update', encrypt($user->id)) }}" class="border w-2/3 bg-gray-100 rounded-lg p-3">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form" value="personal">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Name -->
      <div class="flex flex-col">
        <label for="name" class="mb-2 font-medium text-gray-700">Full Name</label>
        <input type="text" id="name" name="name" value="{{$user->name}}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Date of Birth -->
      <div class="flex flex-col">
        <label for="dob" class="mb-2 font-medium text-gray-700">Date of Birth</label>
        <input type="date" id="dob" name="dob" value="{{$user->dob}}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Phone Number -->
      <div class="flex flex-col">
        <label for="phone" class="mb-2 font-medium text-gray-700">Phone Number</label>
        <input type="number" id="phone" value="{{$user->phone}}" name="phone" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Gender -->
      <div class="flex flex-col">
        <label for="gender" class="mb-2 font-medium text-gray-700">Gender</label>
        <select id="gender" name="gender" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
          <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Male</option>
          <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Female</option>
        </select>
      </div>

      <!-- Email -->
      <div class="flex flex-col">
        <label for="email" class="mb-2 font-medium text-gray-700">Email Address</label>
        <input type="email" disabled id="email" value="{{$user->email}}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Username -->
      <div class="flex flex-col">
        <label for="username" class="mb-2 font-medium text-gray-700">Username</label>
        <input type="text" name="username" id="username" value="{{$user->username}}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Password -->
      <div class="flex flex-col">
        <label for="password" class="mb-2 font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>

      <!-- Confirm Password -->
      <div class="flex flex-col">
        <label for="confirm-password" class="mb-2 font-medium text-gray-700">Confirm Password</label>
        <input type="password" name="password_confirmation" id="confirm-password" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
      </div>
    </div>

    <!-- Save Button -->
    <button type="submit" class="bg-black mt-10 text-white px-2 py-1 rounded-md hover:bg-gray-700 flex items-center gap-2">
      <i class="fa fa-floppy-o"></i> Save Changes
    </button>

  </form>
  <div class=" flex items-center flex-col bg-gray-100 rounded-lg p-7 w-1/3">
    <img
      src="{{ $user->avatar ? asset('/' . $user->avatar) : asset('images/default-avatar.png') }}"
      class="w-32 h-32 rounded-full object-cover mb-10" />

    <h1 class="text-md font-worksans font-bold ">Amazing Things awaits you!</h1>
    <h1 class="text-md font-worksans "> The amazing part of being involved in our webiste is the value of our customers</h1>
  </div>
</div>