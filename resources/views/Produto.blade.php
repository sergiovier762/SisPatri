@extends('Layouts.App')
@section('content')

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sair') }}" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <img src="https://uniguacu.com.br/wp-content/uploads/2022/05/Nova-Logo-Faculdade-UNIGUACU_09.png" alt="Uniguaçu Logo" class="brand-image elevation-6 mx-auto d-block" style="border-bottom: none; width: 100px; height: 100px; margin-top: 20px;">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('Administracao') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tela Inicial
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Produtos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('produtos.create') }}" class="nav-link">
                                        <p>Cadastrar Produto</p>
                                        
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('produtos') }}" class="nav-link">
                                        <p>Listar Produto</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Salas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('salas.create') }}" class="nav-link">
                                        <p>Cadastrar Sala</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('salas') }}" class="nav-link">
                                        <p>Listar Sala</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Fornecedor
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fornecedores.create') }}" class="nav-link">
                                        <p>Cadastrar Fornecedor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fornecedores') }}" class="nav-link">
                                        <p>Listar Fornecedor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Relatório
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../relatorio/cadastrar.html" class="nav-link">
                                        <p>Cadastrar Relatório</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../relatorio/listar.html" class="nav-link">
                                        <p>Listar Relatório</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Produtos Cadastrados</h3>
                                    <div class="float-right">
                                        <form action="{{ route('produtos') }}" method="GET" class="form-inline">
                                            <input type="text" name="query" class="form-control mr-2" placeholder="Buscar Produto">
                                            <button type="submit" class="btn btn-primary mr-2">Buscar</button>
                                            <a href="{{ route('produtos.create') }}" class="btn btn-success">Cadastrar Produto</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'nome', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Nome
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'descricao', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Descrição
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'marca', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Marca
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'preco', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Preço
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'sala_id', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Sala
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'fornecedor_id', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Fornecedor
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'numero_fatura', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Número da Fatura
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'numero_patrimonio', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Número do Patrimônio
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="{{ route('produtos', ['sort' => 'data_aquisicao', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}" style="color: black;">
                                                        Data de Aquisição
                                                    </a>
                                                </th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produtos as $produto)
                                            <tr>
                                                <td>{{ $produto->nome }}</td>
                                                <td>{{ $produto->descricao }}</td>
                                                <td>{{ $produto->marca }}</td>
                                                <td>{{"R$ " . number_format($produto->preco, 2, ',', '.') }}</td>
                                                <td>{{ $produto->sala->nome }}</td>
                                                <td>{{ $produto->fornecedor->nome }}</td>
                                                <td>{{ $produto->numero_fatura }}</td>
                                                <td>{{ $produto->numero_patrimonio }}</td>
                                                <td>{{ \Carbon\Carbon::parse($produto->data_aquisicao)->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                    <a href="{{ route('produtos.duplicate', $produto->id) }}" class="btn btn-warning btn-sm">Duplicar</a>
                                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Exibir mensagens de sucesso ou erro -->
    @if(session('success'))
    <script>''
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session("success") }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: '{{ session("error") }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

</body>

@endsection