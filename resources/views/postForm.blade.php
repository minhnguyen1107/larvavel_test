<form method="post" action="{{route('postForm')}}">
@csrf
    <input type="text" name="HoTen" id="">
    <input type="text" name="tuoi" id="">
    <input type="submit" value="Submit">
</form>