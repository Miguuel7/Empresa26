<?php 
include_once './classes/Cargos.php';
include_once './classes/Setores.php';
include_once './classes/Categorias.php';
include_once './classes/Clientes.php';
include_once './classes/Funcionarios.php';
include_once './config.php';


$objCargos = new Cargos();
$objSetores = new Setores();
$objCategorias = new Categorias();
$objClientes = new Clientes();
$objFuncionarios = new Funcionarios();
?>

<!-- $ObjSetores = new Setores(); -->

<table border="1">
    <tr>
        <th>CargoID</th>
        <th>Nome</th>
        <th>TetoSalarial</th>
        <th>Ações</th>
    </tr>

<?php 
$resultado = $objSetores->exibirSetores();
foreach ($resultado as $key => $value) { ?>
<tr>
    <td><?php echo $value['SetorID']; ?></td>
    <td><?php echo $value['Nome']; ?></td>
    <td><?php echo $value['Andar']; ?></td>
    <td><?php echo $value['Cor']; ?></td>
    <td>
    
        <a href="#">Visualizar</a>
        -
        <a href="#">Excluir</a>
        -
        <a href="#">Atualizar</a>

    </td>
</tr>
<?php  
}
?>

<tr>
    <td colspan="5"> Total de <?php echo count($resultado); ?> Setor(es) cadastrado(s)</td>
</tr>
</table>
