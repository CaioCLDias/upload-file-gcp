<!DOCTYPE html>
<html>
<head>
    <title>Upload File to GCS</title>
</head>
<body>
@if (session('success'))
    <div>
        <p>{{ session('success') }}</p>
        <p>File URL: <a href="{{ session('url') }}">{{ session('url') }}</a></p>
        <img src="{{ session('url') }}" alt="Uploaded Image" style="max-width: 600px;">
    </div>
@endif

<form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <label for="file">Choose file to upload:</label>
    <input type="file" name="file" id="file">
    <br>
    <button type="submit">Upload</button>
</form>
</body>
</html>
