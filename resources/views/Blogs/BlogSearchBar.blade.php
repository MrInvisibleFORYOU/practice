<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<form action="{{ route('blogSearch') }}" method="POST">
    @csrf
    <input id="search-input" type="text" name="query" placeholder="Search..." data-searchInputId>
    <input type="text" id="searchInputID" name="searchInputID"  hidden/> 
    <ul id="searchResults">
        {{-- dynamically adding this through ajax --}}
        {{-- <li class="blog_search" data-searchId=${item.id}>` + item.title + '</li>' --}} 
    </ul>
    <button type="submit" class="search-button">Search</button>
</form>

<script>
    $('#search-input').on('input', function() {
        let query = $(this).val();
        let searchInputId=document.getElementById('searchInputID');
        searchInputId.value="";
        $.ajax({
    url: "{{ route('blogSearchAjax') }}", 
    method: 'POST',
    data: { query: query,
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
        const resultList = $('#searchResults');
        resultList.empty(); 

        for(var i = 0; i < response.length; i++) {
            var item = response[i];
            resultList.append(`<li class="blog_search" data-searchId=${item.id}>` + item.title + '</li>');
        }

        const searchResultBox=document.getElementById("searchResults");
    let searchResult=searchResultBox.children;
    searchResult=Array.from(searchResult);
    searchResult.forEach(result => {
        result.addEventListener('click',()=>{

        let input=document.getElementById('search-input');
       
        searchInputId.value=result.dataset.searchid;
        input.value=result.innerHTML;
        resultList.empty();    
    });
    });
  
    },
    error: function(xhr, status, error) {
        console.log(error);
    }
});
    });
   

</script>