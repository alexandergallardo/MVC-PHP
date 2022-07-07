<!DOCTYPE HTML>

<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>TO DO CON PHP</title>
        <!--link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>

        <script type="text/javascript">
            $(function(){

                $('.editar').on('click',function(){

                    $("#modal-editar").modal('show');

                    $("#detalleedit").val( $(this).attr('data-det') );
                    $("#idedit").val( $(this).attr('data-id') );
                });

            });

        </script>

    </head>
    <body>
        <form action="<?php echo $helper->url("lista","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir a la Lista</h3>
            <hr/>
            Detalle: <input type="text" name="detalle" class="form-control" />
            <input type="hidden" name="id" class="form-control" />
            <input type="submit" value="Guardar" class="btn btn-success"/>
        </form>

        <?php
            if(isset($lista) && is_array($lista))
            {
                ?>
                <div class="col-lg-7">
                    <h3>Lista Registrada</h3>
                    <hr/>
                </div>
                    <section class="col-lg-7 lista" style="height:400px;overflow-y:scroll;">
                        <?php

                                    foreach($lista as $lt)
                                    {
                            ?>
                                        <?php echo $lt->detalle; ?>

                                        <div class="right">
                                            <button type="button" class="btn btn-success editar" id="editar<?php echo $lt->id; ?>" name="editar<?php echo $lt->id; ?>" data-id="<?php echo $lt->id; ?>" data-det="<?php echo $lt->detalle; ?>">Editar</button>
                                            <a href="<?php echo $helper->url("lista", "borrar"); ?>&id=<?php echo $lt->id; ?>" class="btn btn-danger">Borrar</a>
                                        </div>
                                        <hr/>
                            <?php
                                    }

                            ?>
                    </section>
        <?php
            }else {
            ?>
                <div class="col-lg-7">
                    <h3>Lista Vacia</h3>
                    <hr/>
                </div>
        <?php } ?>

        <footer class="col-lg-12">
            <hr/>
            Ejercicio - Prueba Workana Alexander Gallardo; <?php echo  date("Y"); ?>
        </footer>



    </body>
</html>

<!-- Modal -->
<div class="modal fade" id="modal-editar" role="dialog">
    <div class="modal-dialog " role="document">
        <form action="<?php echo $helper->url("lista", "editar"); ?>" method="post">
            <div class="modal-content">

                <div class="modal-header alert-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">EDITAR</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tab-content">

                                <div class="form-group">
                                    <label>DETALLE</label>
                                    <input type="text" class="form-control" id="detalleedit" name="detalleedit"  maxlength="100" />
                                    <input type="hidden"  id="idedit" name="idedit" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button>
                </div>


            </div>
        </form>
    </div>
</div>