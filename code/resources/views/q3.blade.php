<x-app-layout title="Q3" line="67">

    @section('js')
    @include('ajax')
    <script>
        
        let jsValidation = true;

        $('#submitBtn').on('click', function() {
            var formData = new FormData();
            let choices = $('input[name="choices[]"]').map(function(){return $(this).val();}).get();
            choices = JSON.stringify(choices);
            if (choices.toLowerCase().search('calculus') < 0 && jsValidation) {
                $('#ajaxErrors .messages').html('Javascript: one of the selected cources has to be calculus.').removeClass('text-green-700 border-green-300 bg-green-200').addClass('text-orange-700 border-orange-300 bg-orange-200');
                $('#ajaxErrors').fadeIn(400);
                return;
            }
            formData.append('choices', choices);
            $.ajax({
                method: 'POST',
                url: '{{ route('q3.post') }}',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function () {
                    $('#submitBtn').addClass('cursor-wait');
                },
                complete: function () {
                    $('#submitBtn').removeClass('cursor-wait');
                },
            }).done(function (data) {
                // console.log(data);
                $('#ajaxErrors .messages').html(data.msg).removeClass('text-orange-700 border-orange-300 bg-orange-200').addClass('text-green-700 border-green-300 bg-green-200');
                $('#ajaxErrors').fadeIn(400);
                $('#submitBtn').removeClass('cursor-wait');
            }).fail(function (data) {
                // console.log(data);
                $('#ajaxErrors .messages').html('Laravel back-end: ' + formatErrorResponse(data)).removeClass('text-green-700 border-green-300 bg-green-200').addClass('text-orange-700 border-orange-300 bg-orange-200');
                $('#ajaxErrors').fadeIn(400);
            });
        });

        $('#toggleValBtn').on('click', function() {
            jsValidation = !jsValidation;
        });

    </script>
    @endsection
    <div class="flex flex-grow justify-center sm:justify-end px-8 py-4">
        <button id="toggleValBtn" class="text-blue-600 text-sm">Toggle Javascript/Backend validation *</button>
    </div>
    <div class="px-8 py-10 flex flex-col sm:flex-row sm:space-x-12">
       <x-input id="choiceA" name="choices[]" label="Choice A" :value="old('choices[0]')" placeholder="optional"></x-input>
       <x-input id="choiceB" name="choices[]" label="Choice B" :value="old('choices[1]')" placeholder="optional"></x-input>
       <x-input id="choiceC" name="choices[]" label="Choice C" :value="old('choices[2]')" placeholder="optional"></x-input>
    </div>
    <div class="flex justify-center">
        <button id="submitBtn" class="rounded-md px-5 py-3 my-5 text-white text-center bg-green-600 font-semibold shadow">
            Submit
        </button>
    </div>
    <div class="px-8 py-4 italic text-sm text-gray-600 mb-12">
        (*) When toggled to use Javascript validation the backend validation is still active, it just that it's not "visible" because the javascript kicks in first.</button>
    </div>
</x-app-layout>
