@if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>正しく入力してください。</strong>

        <br><br>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
