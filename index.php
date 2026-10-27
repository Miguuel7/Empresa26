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

<table>

<tr>
    <td>ID</td>
    <td>Nome</td>
    <td>Andar</td>
    <td>Cor</td>
    <td>Ação</td>
</tr>

<?php 
$resultado = [];
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
</table>
