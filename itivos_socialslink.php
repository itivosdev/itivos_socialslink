<?php 
/**
 * @author Bernardo Fuentes
 * @since 05/03/2024
 */

require_once(__DIR_MODULES__."itivos_socialslink/classes/itivos_socialslink.php");
class ItivosSocialsLink extends modules
{
	public $html = "";
    public function __construct()
    {
        $this->name ='itivos_socialslink';
        $this->displayName = "Social link";
        $this->description = $this->l('Agrega al footer enlaces de redes sociales');
        $this->category  ='front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Bernardo Fuentes';
        $this->versions_compliancy = array('min'=>'1.0.0', 'max'=> __SYSTEM_VERSION__);
        $this->confirmUninstall = $this->l('Are you sure about removing these details?');
        $this->template_dir = __DIR_MODULES__."itivos_socialslink/views/back/";
        $this->template_dir_front = __DIR_MODULES__."itivos_socialslink/views/front/";
        parent::__construct();

        $this->key_module = "2326d10c5c794cc6749724a4d22fa2da";
        $this->crontLink = __URI__.__ADMIN__."/module/".$this->name."/crontab?key=".$this->key_module."";
    }
    public function defaultData()
    {
        $return = true;
        $social_links = array(
            array(
                "name" => "facebook",
                "link" => "https://fb.com",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>'
            ),
            array(
                "name" => "twitter",
                "link" => "https://twitter.com",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>'
            ),
            array(
                "name" => "instagram",
                "link" => "https://instagram.com",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"/></svg>'
            ),
            array(
                "name" => "youtube",
                "link" => "https://youtube.com",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"/></svg>'
            ),
            array(
                "name" => "linkedin",
                "link" => "https://linkedin.com",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>'
            ),
        );
        foreach ($social_links as $key => $social) {
            $key = $key +1;
            $return &= connect::execute('
                        INSERT INTO `'.__DB_PREFIX__.'itivos_socialslink` 
                        (`position`, `name`, `link`, `icon`) VALUES
                        ('.$key.', "'.$social['name'].'", "'.$social['link'].'", "'.base64_encode($social['icon']).'")
                    ');
        }
        return $return;
    }
    public function install()
    {
    	 if(!$this->registerHook("displayHead") ||
            !$this->registerHook("displayFrontHead") ||
            !$this->registerHook("displayBottom") ||
            !$this->registerHook("displayFrontFooter2") ||
            !$this->installDb() ||
            !$this->defaultData()
            ){
            return false;
        }
        return true;
    }
    public function installDb()
    {
        $return = true;
        $return &= connect::execute('
                CREATE TABLE IF NOT EXISTS `'.__DB_PREFIX__.'itivos_socialslink` (
                  `id` INT(11) NOT NULL AUTO_INCREMENT,
                  `position` INT(5) NOT NULL,
                  `name` varchar(50) NOT NULL,
                  `link` varchar(1000) NOT NULL,
                  `icon` longtext null,
                  PRIMARY KEY (id)
                ) ENGINE ='.__MYSQL_ENGINE__.' DEFAULT CHARSET=utf8 ;'
            );
        return $return;
    }
    public function uninstallDB($drop_table = true)
    {   
        $return = true;
        if ($drop_table) {
            $return &= connect::execute("DELETE FROM ".__DB_PREFIX__. "configuration WHERE module = '".$this->name."'");
            $return &= connect::execute("DROP TABLE IF EXISTS ". __DB_PREFIX__. "itivos_socialslink");
        }
        return $return;
    }
    public function uninstall()
    {
        if(!$this->uninstallDB(true)) {
            return false;
        }
        return true;
    }
    public function getConfig()
    {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "ajax") {
                switch ($_POST['resource']) {
                    case 'update_order':
                        itivosSocialsLinkC::reOrderSlider($_POST['order']);
                    break;
                    default:
                        die();
                    break;
                }
            }
        }
    	if (isIsset('submit_action')) {
            unset($_POST['submit_action']);
            unset($_POST['submit']);
            foreach ($_POST as $key => $val) {
                $social_link_obj = New itivosSocialsLinkC( (int) $key );
                $social_link_obj->link = $val;
                $social_link_obj->save();
            }
            $_SESSION['message'] = "Modulo actualizado correctamente";
            $_SESSION['type_message'] = "success";
            header("Location: ".__URI__.__ADMIN__."/modules/config/".$this->name."");
    	}
        $te = itivosSocialsLinkC::getSocialsLinks();
        $values = array();
        foreach ($te as $key => $value) {
            $values[$value['id']] = $value['link'];
        }
    	$helper = new HelperForm();
        $helper->tpl_vars = array(
            'fields_values' => $values,
            'languages' => language::getLangs(),
        );
        $helper->submit_action = "updateAction";
        $this->view->assign("social_list", $te);
        $this->html = $this->view->fetch($this->template_dir."social_list_admin.tpl");
        echo $this->html;
        return $this->html .= $helper->renderForm(self::generateForm());
    }
    public function generateForm()
    {
        $form = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Configuración de enalces a redes sociales'),
                        'icon' => 'icon-cogs',
                    ),
                    'inputs' => array(),
                    'submit' => array(
                        'title' => $this->l('Guardar configuración'),
                    ),
                ),
            );
        foreach (itivosSocialsLinkC::getSocialsLinks() as $key => $social) {
            $row = array(
                'type' => 'text',
                'label' => ucwords($social['name']),
                'name' => $social['id'],
                'required' => false,
            );
            array_push($form['form']['inputs'], $row);
        }
        return $form;
    }
    public function hookDisplayHead($params = null)
    {
        $this->addCSS($this->template_dir."css/itivos_socialslink_back.css");
    }
    public function hookDisplayFrontHead($params = null)
    {
        $this->addCSS($this->template_dir_front."css/itivos_socialslink_front.css");
    }
    public function hookDisplayBottom($params = null)
    {
        $this->addJS($this->template_dir."js/itivos_socialslink_back.js");
    }
    public function hookDisplayFrontFooter2($params = null)
    {
        $social_links_list = itivosSocialsLinkC::getSocialsLinks();
        $this->view->assign("social_links_list", $social_links_list);
        $this->view->display($this->template_dir_front."social_list_front.tpl");
    }
}