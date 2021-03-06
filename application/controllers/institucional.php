<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Institucional extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $this->load->model('gerenciador/empresa_cliente');
        $this->load->model('gerenciador/empresa_cliente');

        $config = $this->configs->select_by_id(1);

        $this->template->set('title', $config->conf_name);
        $this->template->set('description', $config->conf_seo_description);
        $this->template->set('keywords', $config->conf_seo_keywords);
        $this->template->set('emailConf', $config->conf_email);
        $this->template->set('foneConf', $config->conf_phone_one);
        $this->template->set('foneConfTwo', $config->conf_phone_two);
        $this->template->set('adressConf', $config->conf_adress);
        $this->template->set('body_class', 'pg-interna pg-empresa');
        $this->template->set('phone1', $config->conf_phone_one);
        $this->template->set('phone2', $config->conf_phone_two);
        $this->template->set('endereco', $config->conf_adress);
    }

    public function index() {
        $dados = array();

        $config = $this->configs->select_by_id(1);
        $dados['empresas'] = $this->empresa_cliente->listar_empresa_cliente([], 0, 99999);
        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 1));

        $dados['adressConf'] =  $config->conf_adress;

        $dados['titulo'] = 'Institucional';

        $this->template->load($this->tpl, 'institucional/index', $dados);
    }

    public function ambiente() {
        $dados = array();

        $config = $this->configs->select_by_id(1);

        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 2));

        $dados['adressConf'] =  $config->conf_adress;

        $dados['titulo'] = 'Institucional - Ambiente';

        $this->template->load($this->tpl, 'institucional/ambiente', $dados);
    }

    public function clientes() {
        $dados = array();

        $config = $this->configs->select_by_id(1);

        $dados['adressConf'] =  $config->conf_adress;

	$dados['clientes'] = $this->empresa_cliente->listar_empresa_cliente(array(),0,99);

        $dados['titulo'] = 'Institucional - Clientes';

        $this->template->load($this->tpl, 'institucional/clientes', $dados);
    }

}
