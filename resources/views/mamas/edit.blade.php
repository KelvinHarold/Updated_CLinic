@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Mama</h1>

    <form method="POST" action="{{ route('mamas.update', $mama) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $mama->name) }}"
            class="w-full border rounded px-3 py-2">

        <input type="number" name="age" value="{{ old('age', $mama->age) }}"
            class="w-full border rounded px-3 py-2">

        <select name="type" class="w-full border rounded px-3 py-2">
            <option value="pregnant" @selected($mama->type=='pregnant')>Pregnant</option>
            <option value="breastfeeding" @selected($mama->type=='breastfeeding')>Breastfeeding</option>
        </select>

        <input type="text" name="pregnancy_stage" value="{{ old('pregnancy_stage', $mama->pregnancy_stage) }}"
            class="w-full border rounded px-3 py-2">

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
        <a href="{{ route('mamas.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</a>
    </form>
</div>
@endsection
