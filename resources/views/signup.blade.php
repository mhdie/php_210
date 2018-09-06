<form action="{{route('user.save')}}" method="post" >
    <input type="text" name="first_name" placeholder="first name" value="{{old('first_name')}}"></br>
    <input type="text" name="last_name" placeholder="last name" value="{{old('last_name')}}"></br>
    <input type="text" name="username" placeholder="username" value="{{old('username')}}"></br>
    <input type="password" name="password" placeholder="password" value="{{old('password')}}"></br>
    <input type="email" name="email" placeholder="email" value="{{old('email')}}"></br>

    <input type="submit" value="send">
    {{csrf_field()}}
</form>
