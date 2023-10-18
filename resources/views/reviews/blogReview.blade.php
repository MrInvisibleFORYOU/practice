<form action="{{route('blogReview')}}" method="POST">
        @csrf
        <input type="text" name="blog_slug" value="{{$slug}}" checked hidden/>
        <div class="form-group">
            <label for="content">Review</label>
            <textarea name="comment" class="form-control" required></textarea>
        </div>
    
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit Review</button>
</form>