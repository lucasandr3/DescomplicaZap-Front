<!-- Content -->
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h3><?=$title?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                <form class="basic-repeater">
                        <div data-repeater-list="group-a">
                            <div data-repeater-item>
                                <h5 style="color:#555;margin-bottom:1.0rem;">Segunda Feira</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_segunda'], -15, -10)?>" name="h_segunda" id="hsa"
                                               placeholder="Enter email id">
                                    </div>
                                   
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_segunda'], -5)?>" name="h_segunda" id="hsf"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_segunda('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_segunda('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-s"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Terça Feira</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_terca'], -15, -10)?>"  name="h_terca" id="hta"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_terca'], -5)?>"  name="h_terca" id="htf"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_terca('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_terca('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-t"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Quarta Feira</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_quarta'], -15, -10)?>"  name="h_quarta" id="hqa"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_quarta'], -5)?>"  name="h_quarta" id="hqf"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_quarta('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_quarta('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-q"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Quinta Feira</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_quinta'], -15, -10)?>"  name="h_quinta" id="hquia"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_quinta'], -5)?>"  name="h_quinta" id="hquif"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_quinta('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_quinta('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-qui"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Sexta Feira</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_sexta'], -15, -10)?>"  name="h_sexta" id="hsea"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_sexta'], -5)?>"  name="h_sexta" id="hsef"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_sexta('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_sexta('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-sex"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Sábado</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_sabado'], -15, -10)?>"  name="h_sabado" id="hsaa"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_sabado'], -5)?>"  name="h_sabado" id="hsaf"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_sabado('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_sabado('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-saa"></div>
                                </div>
                                <hr>

                                <h5 style="color:#555;margin-bottom:1.0rem;">Domingo</h5>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="name">Abre ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_domingo'], -15, -10)?>"  name="h_domingo" id="hdoma"
                                               placeholder="Enter email id">
                                    </div>
                                    <div class="col-md-4 col-sm-12 form-group">
                                        <label for="email">Fecha ás</label>
                                        <input type="time" class="form-control" value="<?=substr($data['h_domingo'], -5)?>"  name="h_domingo" id="hdomf"
                                               placeholder="Enter email id">
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-danger btn-block" onClick="hora_domingo('apagar')" data-repeater-delete>
                                            <i class="ti-close font-size-10 mr-2"></i> Apagar
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <div><label>&nbsp;</label></div>
                                        <button type="button" class="btn btn-success btn-block" onClick="hora_domingo('salvar')" data-repeater-delete>
                                            <i class="ti-check font-size-10 mr-2"></i> Salvar
                                        </button>
                                    </div>
                                    <div id="horario-msg-dom"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->