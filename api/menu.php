<?php

// Incluindo arquivo de conexão com o banco de dados
require_once('config/database.php');

// Selecionando todos os menus
$sql = "SELECT * FROM menus";
$query = $pdo->query($sql);
$menus = $query->fetchAll(PDO::FETCH_ASSOC);

/**
 * Função de apoio para contrução do menu de forma recursiva
 *
 * @param array $menus Vetor contendo todos os menus
 * @param array $menuFinal Vetor contendo o menu final com estrutura hierarquica
 * @param int $menuSuperiorId Id do menu superior para encontrarmos os sub-menus
 * @param int $nivel Nivel de hierarquia do menu
 */
function construirMenu(array $menus, array &$menuFinal, $menuSuperiorId, $nivel = 0)
{
    // Passando por todos os menus
    foreach ($menus as $menu) {
        // Se for um menu filho do menu superior que estamos procurando
        if ($menu['menu_id_superior'] == $menuSuperiorId) {
            // Armazenando no menu final
            $menuFinal[] = $menu;
        }
    }

    // Incrementando nível
    $nivel++;

    // Passando pelos menus desse nível
    for ($i = 0; $i < count($menuFinal); $i++) {

        // Inicializando indices
        $menuFinal[$i]['sub_menus'] = [];
        $menuFinal[$i]['nivel'] = $nivel;

        // Chamando a função novamente para construção dos submenus
        construirMenu($menus, $menuFinal[$i]['sub_menus'], $menuFinal[$i]['id'], $nivel);
    }

}

// Chamada inicial da função
$menuFinal = [];
construirMenu($menus, $menuFinal, null);

// Retornando menu com hierarquia
echo json_encode($menuFinal);