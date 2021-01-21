<x-app-layout title="Q1" line="18">

    @section('js')
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>

        var countriesTable;

        $(function() {
            countriesTable = $('#countries').DataTable({
                pageLength: 10,
                responsive: true,
                language: {
                    emptyTable: 'No countries to display. You might want to run migration again to get the right data (it\'s randomly generated).'
                },
                dom: "<'grid grid-cols-1 sm:grid-cols-2'<'col-span-1 my-4'l><'col-span-1 flex my-4 justify-start sm:justify-end'f>>t<'grid grid-cols-1 sm:grid-cols-2'<'col-span-1 my-4'i><'col-span-1 flex my-4 justify-center leading-10 sm:leading-normal sm:justify-end'p>>",
                order: [
                    [1, 'desc']
                ]
            });
        });
    </script>
    @endsection

    <div class="px-8 py-10 flex flex-col">
        <table id="countries" class="table-auto w-full">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Average Debt over the last 4 years</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $item)
                <tr class="border text-base">
                    <td class="font-semibold">
                        {{ $item->code }}
                    </td>
                    <td class="text-center">
                        {{ $item->debt }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
