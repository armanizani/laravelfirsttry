@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <head>

    </head>
 <div class="container mt-5">
    <h1>Enter Text</h1>
    <form id="textForm" action="{{ route('texts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Text:</label>
            <input type="text" name="content" class="form-control" id="content" required>
        </div>
        <p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h2 class="mt-5">Outputs</h2>
    <div id="output">
    @if(isset($texts))
        @foreach($texts as $text)
            <p id="no-texts-msg">Today I would talk about {{ $text->content }}</p>
        @endforeach
    @else
    <p>No texts found.</p>
    @endif

</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $('#textForm').on('submit', function(event){
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                url: $(this).attr('action'), // Form action URL
                method: $(this).attr('method'), // Form method (POST)
                data: $(this).serialize(), // Serialize form data
                success: function(response){
                    if(response.success) {
                        alert('Text added successfully!'); // Display success message
                        $('#content').val(''); // Clear the input field
                        $('h2.mt5').after('<p>Today I would talk about ' + response.content + '</p>');
                        $('#no-texts-msg').remove();
                    }
                    else {
                        alert('Failed to add text.');
                    }
                },
                error: function(xhr, status, error){
                    alert('There was an error: ' + error); // Display error message
                }
            });
        });
    });
</script>
@endsection

