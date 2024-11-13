@extends('Layouts/App')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="https://uniguacu.com.br/wp-content/uploads/2022/05/Nova-Logo-Faculdade-UNIGUACU_09.png" alt="Logo UNIGUAÇU" style="max-width: 50%; height: auto;">
        <p>Patrimonio Uniguaçu</p>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('login.post') }}" method="post">
            @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="usuario" name="usuario" value="" placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="senha" name="senha" value="" placeholder="Senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</body> 
@endsection