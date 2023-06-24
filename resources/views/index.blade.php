<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>URL Shortener</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var url = $('input[name="url"]').val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('shorten.url') }}',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        url: url
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#result').html('Short URL: <a href="' + response.data.url + '">' + response.data.url + '</a>');
                    },
                    error: function(xhr, status, error) {
                        $('#result').html('URL is invalid!');
                    }
                });
            });
        });

    </script>
</head>
<body>
<form method="POST" action="{{ route('shorten.url') }}">
    @csrf
    <input type="text" name="url" placeholder="Enter URL" required>
    <button type="submit">Shorten</button>
</form>

<div id="result"></div>
</body>
</html>
