<?php

/**
 * Plugin Name: af-iscas-mc
 * Plugin URI: http://#
 * Description: Insere as iscas do MailChimp dentro de um layout pre programado que tambem gera um Shortcode para se inserido em qualquer lugar. [af_isca_mc form_action="" btn_name=""]
 * Version: 1.3.0
 * Author: Filipe Lopes
 * Author URI: http://github.com/filipelopescoder
 * License: GPL2
 * Text Domain: Iscas MailChimp
 * Domain Path: languages/
 */



// Previne acesso direto

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// Carrega arquivos de traduções

function af_i_mc_load_textdomain() {

	load_plugin_textdomain( 'af-iscas-mc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}



add_action( 'plugins_loaded', 'af_i_mc_load_textdomain' );



//----------------------------------------------------//

//Função que cria o shortcode a pagina de layout da isca

//[af_isca_mc id="" name="" titulo="Cadastre-se para receber as melhores soluções para sua empresa e uso da Fibra Ótiptica."]

//Campo nome = classes: cont_txt_nome, txt_nome

//Campo email = classes: cont_txt_email, txt_email

//Isca menor = Fase 1



function inclui_layout_i_mc_ag($attrs, $content){

	extract( shortcode_atts( array(
		//'id' => '',
		//'name' => '',
		'background' => '',
		'width' => '',
		'form_action' => '',
		'btn_name' => 'b_0e33e1038e60a039d3921afd0_0bbde1745e',
		'placeholder_nome' => 'What`s your name:',
		'placeholder_email' => 'What`s your email:',
		'label_nome' => '',
		'label_email' => '',
		'texto' => '')
		,$attrs ) );



	$custom_content = '<!-- Begin MailChimp Signup Form -->

<style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>

<div id="mc_embed_signup">

<form action="'.$form_action.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
<!--<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>-->

<div class="mc-field-group vc_col-lg-5 vc_col-md-5 vc_col-sm-5 vc_col-xs-12">
    <label for="mce-FNAME">'.$label_nome.'</label>
    <input type="text" value="" name="FNAME" class="required  vc_col-lg-12 vc_col-md-12 vc_col-sm-12 vc_col-xs-12" id="mce-FNAME" placeholder="'.$placeholder_nome.'">
</div>

<div class="mc-field-group vc_col-lg-5 vc_col-md-5 vc_col-sm-5 vc_col-xs-12">
    <label for="mce-EMAIL">'.$label_email.'</label>
    <input type="email" value="" name="EMAIL" class="required email  vc_col-lg-12 vc_col-md-12 vc_col-sm-12 vc_col-xs-12" id="mce-EMAIL" placeholder="'.$placeholder_email.'">
</div>
<div class="mc-field-group vc_col-lg-2 vc_col-md-2 vc_col-sm-2 vc_col-xs-12">
    <div class="clear "><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="button  vc_col-lg-12 vc_col-md-12 vc_col-sm-12 vc_col-xs-12"></div>
</div>

    <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="'.$btn_name.'" tabindex="-1" value=""></div>
    </div>
</form>
</div>
<script type=\'text/javascript\' src=\'//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js\'></script><script type=\'text/javascript\'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]=\'FNAME\';ftypes[1]=\'text\';fnames[0]=\'EMAIL\';ftypes[0]=\'email\';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->';

	



	if( $custom_content != '' ){

		$content .= $custom_content;

    	return $content;

    }

	else

		return "Alguma coisa saiu errada :( chame o programador <_>";



}



add_shortcode( 'af_isca_mc', 'inclui_layout_i_mc_ag', 100 );





function af_i_mc_register_script(){

	wp_enqueue_style( 'af-i-layout', plugins_url('af-i-layout.css', __FILE__));

}

add_action('wp_enqueue_scripts','af_i_mc_register_script');