<?php

class Formulario
{
    public static function titulo($titulo, $parametro = [])
    {
        // Seta sub titulo
        if (isset($parametro['acao'])) {

            if ($parametro['acao'] == "insert") {
                $titulo .= " - Novo";
            } else if ($parametro['acao'] == "update") {
                $titulo .= " - Alteração";
            } else if ($parametro['acao'] == "delete") {
                $titulo .= " - Exclusão";
            } else if ($parametro['acao'] == "view") {
                $titulo .= " - Visualização";
            }
        }

        $textoBtnNovo = "";

        if (!isset($parametro['btNovo'])) {
            $textoBtnNovo = '
                            <a href="'. SITEURL . '/' . $parametro['controller'] .'/form/insert" class="btn btn-secondary btn-sm btn-icons-crud" title="Novo">
                                <i class="fa fa-plus" area-hidden="true"></i>
                            </a>
            ';
        }

        $cTexto = '        
        <br />
        <br /><section class="container">
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-10">
                            <h3>' . $titulo . '</h3>
                        </div>
                        <div class="col-2 text-right">
                            ' . $textoBtnNovo . '
                            <a href="'. SITEURL . '/' . $parametro['controller'] .'/lista" class="btn btn-secondary btn-sm" title="Lista">
                                <i class="fa fa-list"></i>
                            </a>
                        </div>
                    </div>
                    ' . Formulario::exibeMsgSucesso() . Formulario::exibeMsgError()  . '
                </section>';

        return $cTexto;
    }

    /**
     * exibeMsgError
     *
     * @return string
     */
    public static function exibeMsgError() 
    {
        $texto = "";

        if (isset($_SESSION['msgError'])) {

            $texto .= '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['msgError'] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';

            unset($_SESSION['msgError']);

        }

        return $texto;
    }

    /**
     * exibeMsgSucesso
     *
     * @return string
     */
    public static function exibeMsgSucesso() 
    {
        $texto = "";

        if (isset($_SESSION['msgSucesso'])) {

            $texto .= '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['msgSucesso'] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            
            unset($_SESSION["msgSucesso"]);

        }

        return $texto;
    }

    /**
     * botoes
     *
     * @param string $btn 
     * @param string $controller 
     * @param integer $id 
     * @return string
     */
    public static function botoes($btn, $controller, $id = 0)
    {
        $cRet = '';

        if ($btn == 'view') {
            $cRet = '<a class="btn btn-secondary btn-sm" href="' . SITEURL .  '/' . $controller . '/form/view/'. $id . '" title="Visualizar"><i class="fa fa-thin fa-eye"></i></a>';
        } else if ($btn == 'update') {
            $cRet = '<a class="btn btn-secondary btn-sm" href="' . SITEURL .  '/' . $controller . '/form/update/'. $id . '" title="Alterar"><i class="fa fa-pen"></i></a>';
        } else if ($btn == 'delete') {
            $cRet = '<a class="btn btn-secondary btn-sm" href=" http://localhost/Projetos_da_UP/formularioContratacao/site/comuns' .  '/' . $controller . '/form/delete/'. $id . '" title="Excluir"><i class="fa fa-trash"></i></a>';
        } else if ($btn == 'voltar') {
            $cRet = '<a href="' . SITEURL . '/' . $controller . '/lista" class="btn btn-outline-danger mr-3">Voltar</a>';
        }   

        return $cRet;
    }

    /**
     * botoesFormulario
     *
     * @param string $controller 
     * @param string $acao 
     * @return string
     */
    public static function botoesFormulario($controller, $acao)
    {
        $cRet = '<div class="form-group col-12 col-md-4">';
            $cRet .= Formulario::botoes("voltar", $controller);

            if ($acao != "view") {
                $cRet .= '<button type="submit" value="submit" class="btn btn-outline-secondary">Gravar</button>';
            }

        $cRet .= '</div>';

        return $cRet;
    }


    /**
     * mostraStatus
     *
     * @param int $status 
     * @return string
     */
    public static function mostraStatus($status = 0)
    {
        if ($status == 0) {
            
        } else if ($status == 1) {
            return "Ativo";
        } else if ($status == 2) {
            return "Inativo";            
        }
    }

     /**
     * mostraStatusSala
     *
     * @param int $status 
     * @return string
     */
    public static function mostraStatusSala($status = 0)
    {
        if ($status == 0) {
            
        } else if ($status == 1) {
            return "Livre";
        } else if ($status == 2) {
            return "Ocupada";            
        } else if ($status == 3) {
            return "Em manutenção";            
        }
    }

    /**
     * comboboxStatus
     *
     * @param int $status 
     * @return string
     */
    public static function comboboxStatus($status = 0)
    {
        return '<label for="statusRegistro" class="form-label">Status</label>
                <select name="statusRegistro" id="statusRegistro" class="form-control" required>
                    <option value=""  ' . (isset($status) ? ($status == 0 ? "selected" : "") : "") . '>...</option>
                    <option value="1" ' . (isset($status) ? ($status == 1 ? "selected" : "") : "") . '>Ativo</option>
                    <option value="2" ' . (isset($status) ? ($status == 2 ? "selected" : "") : "") . '>Inativo</option>
                </select>';
    }

    /**
     * getDataTables
     *
     * @param string $table_id 
     * @return string
     */
    public static function getDataTables($table_id)
    {
        return '
            <script>
                $(document).ready( function () {
                    $("#' . $table_id . '").DataTable( {
                        language:   {
                                        "sEmptyTable":      "Nenhum registro encontrado",
                                        "sInfo":            "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                        "sInfoEmpty":       "Mostrando 0 até 0 de 0 registros",
                                        "sInfoFiltered":    "(Filtrados de _MAX_ registros)",
                                        "sInfoPostFix":     "",
                                        "sInfoThousands":   ".",
                                        "sLengthMenu":      "_MENU_ resultados por página",
                                        "sLoadingRecords":  "Carregando...",
                                        "sProcessing":      "Processando...",
                                        "sZeroRecords":     "Nenhum registro encontrado",
                                        "sSearch":          "Pesquisar",
                                        "oPaginate": {
                                            "sNext":        "Próximo",
                                            "sPrevious":    "Anterior",
                                            "sFirst":       "Primeiro",
                                            "sLast":        "Último"
                                        },
                                        "oAria": {
                                            "sSortAscending":   ": Ordenar colunas de forma ascendente",
                                            "sSortDescending":  ": Ordenar colunas de forma descendente"
                                        }
                                    }
                    });
                } );
            </script>
        ';
    }
}