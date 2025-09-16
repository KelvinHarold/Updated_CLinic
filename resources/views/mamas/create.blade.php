@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Mama</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mamas.store') }}" class="space-y-4">
        @csrf

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
        <input type="number" name="age" placeholder="Age" value="{{ old('age') }}" class="w-full border rounded px-3 py-2">
        
        <select name="type" class="w-full border rounded px-3 py-2">
            <option value="">-- Select Type --</option>
            <option value="pregnant" @selected(old('type')=='pregnant')>Pregnant</option>
            <option value="breastfeeding" @selected(old('type')=='breastfeeding')>Breastfeeding</option>
        </select>

        <select name="visitor_id" class="w-full border rounded px-3 py-2">
    <option value="">-- Select Visitor --</option>
    @foreach($visitors as $visitor)
        <option value="{{ $visitor->id }}">{{ $visitor->name }} ({{ $visitor->email }})</option>
    @endforeach
</select>


        <input type="text" name="pregnancy_stage" placeholder="Pregnancy Stage (if pregnant)" value="{{ old('pregnancy_stage') }}" class="w-full border rounded px-3 py-2">
        <input type="text" name="contact" placeholder="Contact" value="{{ old('contact') }}" class="w-full border rounded px-3 py-2">
        <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" class="w-full border rounded px-3 py-2">
        <input type="text" name="medical_history" placeholder="Medical History" value="{{ old('medical_history') }}" class="w-full border rounded px-3 py-2">
        
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
        <input type="password" name="password" placeholder="Password" class="w-full border rounded px-3 py-2">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border rounded px-3 py-2">

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
        <a href="{{ route('mamas.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</a>
    </form>
</div>
@endsection
