@if(session('flashes'))
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    @foreach(session('flashes') as $flash)
    <div class="px-5 py-2 mt-8 text-xl border rounded-md border-{{ $flash->color }}-300 bg-{{ $flash->color }}-200 text-{{ $flash->color }}-700">
        {!! $flash->msg !!}
    </div>
    @endforeach
</div>
@endif
@if(config('app.flashes'))
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    @foreach(config('app.flashes') as $flash)
    <div class="px-5 py-2 mt-8 text-xl border rounded-md border-{{ $flash->color }}-300 bg-{{ $flash->color }}-200 text-{{ $flash->color }}-700">
        {!! $flash->msg !!}
    </div>
    @endforeach
</div>
@endif
@if ($errors->any())
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="px-5 py-2 mt-8 text-xl border rounded-md border-orange-300 bg-orange-200 text-orange-700">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
</div>
@endif
<div id="ajaxErrors" class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8" style="display: none;">
    <div class="px-5 py-2 mt-8 text-xl border rounded-md border-orange-300 bg-orange-200 text-orange-700 messages"></div>
</div>