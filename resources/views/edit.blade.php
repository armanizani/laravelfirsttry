<!DOCTYPE html>
<html>
<head>
    <title>Edit Text</title>
</head>
<body>
<div class="container mt-5">
    <h1>Edit Text</h1>
    <form action="{{ route('texts.update', $text->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="content">Content:</label>
        <input type="text" name="content" value="{{ $text->content }}" required>
        <button type="submit">Update Text</button>
    </form>
</div>
</body>
</html>
