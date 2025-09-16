@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Vaccination</h1>

    <form action="{{ route('vaccinations.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">Child</label>
            <select name="child_id" class="w-full border rounded p-2">
                @foreach($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>

      <div>
    <label class="block font-medium mb-1">Vaccine Name</label>
    <input type="text" name="vaccine_name" class="w-full border rounded p-2" placeholder="Vaccine Name" required>
</div>

<div>
    <label class="block font-medium mb-1">Date Given</label>
    <input type="date" name="date_given" class="w-full border rounded p-2" required>
</div>

<div>
    <label class="block font-medium mb-1">Next Due (Optional)</label>
    <input type="date" name="next_due" class="w-full border rounded p-2">
</div>


        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection
