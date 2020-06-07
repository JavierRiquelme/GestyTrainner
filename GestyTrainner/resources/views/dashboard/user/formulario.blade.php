
@csrf

        <div class="form-group">
            <label for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" value="{{old('name', $user->name)}}">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{old('email', $user->email)}}">
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
        </div>
        @if ($pasw)
        <div class="form-group">
            <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{old('password', $user->password)}}">
                @error('password')
                    <small class="text-danger">{{$message}}</small>
                @enderror
        </div>  
        @endif
 
        <input type="submit" value="Enviar" class="btn btn-primary">