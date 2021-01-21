<x-app-layout title="Q2">

    @section('js')
    <script>

        $(function () {
            //
        });

    </script>
    @endsection

    <div class="px-8 py-10 flex flex-col space-y-4">
       {!! $html !!}
    </div>
</x-app-layout>
