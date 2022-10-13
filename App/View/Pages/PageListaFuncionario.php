<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $resultado = (new DAOOperacoes)->listaFuncionario($_POST);

    $titulo = 'Lista de Funcionários';
    include 'App/View/Components/header.php';
?>
<main class="form-add w-100 m-auto">
    <div class="row">
        <div class="person">
            <div class="container">
                <div class="container-inner">
                    <img class="circle" />
                    <img class="img img1" alt="Consultar" src="App/View/Images/SystemImages/consultar.svg" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">UTILIZE OS FILTROS PARA CONSULTAR</h1>
    </div>
    <!-- Select do departamento -->
    <div>
        <!-- Selecionar todos -->
        <form method='POST'>
            <button type="submit" class="btn btn-primary" name="all">ALL</button>
        </form>
    
        <br><br>
        <form method='POST'>
            <select class="form-select col" aria-label="Default select example" name='options_dp' onchange="this.form.submit()">
                <option value="">Escolha</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Financeiro">Financeiro</option>
                <option value="RH">RH</option>
                <option value="Comercial">Comercial</option>
                <option value="Operacional">Operacional</option>
                <option value="Vendas">Vendas</option>
                <option value="TI">TI</option>
            </select>
        </form>
    </div>
        <form method='POST'>
            Ordenar:
            <select name="ordenar" id="ordenar" class="form-select col" aria-label="Default select example" onchange="this.form.submit()">
                <option value="">Escolha</option>
                <option value="nome_funcionario">Nome</option>";
                <option value="departamento_nome">Departamento</option>";
            </select>
        </form>
    <div>
        </br>
        <table class="table table-striped table-hover table-bordered border-secondary">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>DEPARTAMENTO</th>
                    <th>CARGO</th>
                    <th>PERFIL</th>
                    <th>ALTERAR</th>
                    <th>REMOVER</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $funcionarios) : ?>
                <tr>
                    <td><?= $funcionarios['nome_funcionario'] ?></td>
                    <td><?= $funcionarios['departamento_nome'] ?></td>
                    <td><?= $funcionarios['cargo'] ?></td>
                    <!-- Botão que direciona para o perfil -->
                    <td>
                        <a class='btn btn-sm btn-primary'
                            href='perfil.php?id=<?=$funcionarios['id_funcionario']?>'>
                            <!-- Botão que direciona para a página de remover -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <!-- Botão que direciona para a página de alterar conforme o id da linha clicada -->
                        <a class='btn btn-sm btn-primary'
                            href='editar.php?id=<?=$funcionarios['id_funcionario']?>'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a class='btn btn-sm btn-danger'
                            href='editarDeletar.php?id=<?=$funcionarios['id_funcionario']?>'>
                            <!-- Botão que direciona para a página de remover -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>