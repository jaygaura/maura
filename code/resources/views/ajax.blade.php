<script>

    function formatErrorResponse(xhr, withBadges) {
        var prefix;
        var errors;

        if (withBadges) {
            prefix = '<span class="rounded-md py-1 px-3 text-white font-semibold bg-red-600 border-red-700">ERROR</span> ' +
                 '<span class="rounded-md py-1 px-3 text-white font-semibold bg-blue-600 border-blue-700">HTTP ' + xhr.status + '</span> ';
        } else {
            prefix = '';
        }

        switch (xhr.status) {
            case 403:
            case 404:
            case 422:
                if (xhr.responseJSON) {
                    errors = Object.values(xhr.responseJSON.errors);

                    errors = errors.map(function (error) {
                        return error;
                    })

                    return prefix + errors.join('<br/>');
                } else {
                    return prefix + xhr.responseText;
                }
            case 500:
                return prefix + 'A server error (HTTP 500) has occurred. Please check the application log for details.';
            default:
                return prefix + 'An unknown error has occurred.';
        }
    }

    // Ajax Setup

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

</script>
