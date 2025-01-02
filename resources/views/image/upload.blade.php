<x-home-page-layout :user="$user">

    <h1>Upload Image to Generate Hashtags, Add Watermark & Display Metadata</h1>

    @if ($errors->any())
        <div style="color: red;">
            <p>Error: {{ $errors->first('error') }}</p>
        </div>
    @endif

    <form action="{{ route('image.process') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <label for="watermark">Select Watermark Image:</label>
        <input type="file" name="watermark" id="watermark" accept="image/*"><br><br>

        <label for="caption">Caption :</label>
        <textarea id="post_caption" style="resize:none;" name="caption" rows="4" cols="50"
            placeholder="Masukkan caption di sini"></textarea>

        <button type="submit">Upload and Process Image</button>
    </form>
</x-home-page-layout>
