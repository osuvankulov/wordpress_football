<?php

// Avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

$auto_open = FALSE;
$first_tab = FALSE;
$first_tab_title = FALSE;

class US_Shortcodes {

	public function __construct()
	{
		add_filter('the_content', array($this, 'paragraph_fix'));
		add_filter('the_content', array($this, 'a_to_img_magnific_pupup'));

        if ( ! us_is_vc_fe()) {
            add_filter('the_content', array($this, 'sections_fix'), 99);
        }

		add_shortcode('item_title', array($this, 'item_title'));

		add_shortcode('timepoint_title', array($this, 'timepoint_title'));

		add_shortcode('vc_icon', array($this, 'vc_icon'));
		add_shortcode('vc_iconbox', array($this, 'vc_iconbox'));
		add_shortcode('vc_testimonial', array($this, 'vc_testimonial'));

		add_shortcode('vc_blog', array($this, 'vc_blog'));
		add_shortcode('vc_portfolio', array($this, 'vc_portfolio'));
		add_shortcode('vc_clients', array($this, 'vc_clients'));
		add_shortcode('vc_latest_posts', array($this, 'vc_latest_posts'));

		add_shortcode('vc_member', array($this, 'vc_member'));

		add_shortcode('vc_actionbox', array($this, 'vc_actionbox'));

		add_shortcode('pricing_table', array($this, 'pricing_table'));
		add_shortcode('pricing_column', array($this, 'pricing_column'));
		add_shortcode('pricing_row', array($this, 'pricing_row'));
		add_shortcode('pricing_footer', array($this, 'pricing_footer'));

		add_shortcode('vc_contact_form', array($this, 'vc_contact_form'));
		add_shortcode('vc_social_links', array($this, 'vc_social_links'));
		add_shortcode('vc_contacts', array($this, 'vc_contacts'));

		add_shortcode('vc_counter', array($this, 'vc_counter'));

		remove_shortcode('gallery');
		add_shortcode('gallery', array($this, 'gallery'));
		add_shortcode('vc_simple_slider', array($this, 'vc_simple_slider'));
		add_shortcode('vc_grid_blog_slider', array($this, 'vc_grid_blog_slider'));

        //VC shortcodes
        if (!class_exists('WPBakeryVisualComposerAbstract')) {
            add_shortcode('vc_row', array($this, 'vc_row'));
            add_shortcode('vc_row_inner', array($this, 'vc_row'));
            add_shortcode('vc_column', array($this, 'vc_column'));
            add_shortcode('vc_column_inner', array($this, 'vc_column'));
            add_shortcode('vc_column_text', array($this, 'vc_column_text'));
            add_shortcode('vc_separator', array($this, 'vc_separator'));
            add_shortcode('vc_button', array($this, 'vc_button'));
            add_shortcode('vc_video', array($this, 'vc_video'));
            add_shortcode('vc_gmaps', array($this, 'vc_gmaps'));
            add_shortcode('vc_accordion', array($this, 'vc_accordion'));
            add_shortcode('vc_accordion_tab', array($this, 'vc_accordion_tab'));
            add_shortcode('vc_tabs', array($this, 'vc_tabs'));
            add_shortcode('vc_tab', array($this, 'vc_tab'));
            add_shortcode('vc_gallery', array($this, 'vc_gallery'));
            add_shortcode('vc_single_image', array($this, 'vc_single_image'));
        }

	}

    public function vc_row($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_row.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_column($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_column.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_column_text($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_column_text.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_accordion($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_accordion.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_accordion_tab($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_accordion_tab.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_tabs($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_tabs.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_tab($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_tab.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_gallery($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_gallery.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_single_image($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_single_image.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_separator($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_separator.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_button($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_button.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_video($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_video.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function vc_gmaps($atts, $content = null) {
        ob_start();
        include (get_template_directory().'/vc_templates/vc_gmaps.php');
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

	public function paragraph_fix($content)
	{
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']',
			']<br>' => ']',
		);

		$content = strtr($content, $array);
		return $content;
	}

	public function sections_fix($content)
	{
		remove_shortcode('section');
		$link_pages_args = array(
			'before'           => '<div class="w-blog-pagination"><div class="g-pagination">',
			'after'            => '</div></div>',
			'next_or_number'   => 'next_and_number',
			'nextpagelink'     => __('Next', 'us'),
			'previouspagelink' => __('Previous', 'us'),
			'echo'             => 0
		);

		global $disable_section_shortcode;

		if ($disable_section_shortcode)
		{
			add_shortcode('section', array($this, 'section_dummy'));
			$content = $content.us_wp_link_pages($link_pages_args);
			return do_shortcode($content);
		}

		add_shortcode('section', array($this, 'section'));

		if (strpos($content, '[section') !== FALSE)
		{
			$content = strtr($content, array('[section' => '[/section automatic_end_section="1"][section'));

			$content = strtr($content, array('[/section]' => '[/section][section]'));

			$content = strtr($content, array('[/section automatic_end_section="1"]' => '[/section]'));

			$content = '[section]'.$content.us_wp_link_pages($link_pages_args).'[/section]';
		}
		else
		{
			$content = '[section]'.$content.us_wp_link_pages($link_pages_args).'[/section]';
		}

		$content = preg_replace('%\[section\](\\s)*\[/section\]%i', '', $content);

		return do_shortcode($content);
	}

	public function a_to_img_magnific_pupup ($content)
	{
		$pattern = "/<a(.*?)href=('|\")([^>]*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
		$replacement = '<a$1ref="magnificPopup" href=$2$3.$4$5$6>';
		$content = preg_replace($pattern, $replacement, $content);

		return $content;
	}

	public function vc_contact_form($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'form_name_field' => 'required',
				'form_email_field' => 'required',
				'form_phone_field' => 'required',
				'form_email' => '',
				'form_captcha' => '',
				'captcha_salt' => 'Impeza',
				'button_type' => '',
				'button_outlined' => false,
			), $attributes);

		$errors = array();
		if(isset($_POST['action']) AND $_POST['action'] == 'contact') {

			// Check name
			if($attributes['form_name_field'] == 'required' AND trim($_POST['contact_name']) == '') {
				$errors['contact_name'] = __('Please, enter your name', 'us');
			} elseif (in_array($attributes['form_name_field'], array('required', 'show'))) {
				$name = trim($_POST['contact_name']);
			}

			// Check email
			if($attributes['form_email_field'] == 'required' AND trim($_POST['contact_email']) == '')  {
				$errors['contact_email'] = __('Please, enter your email', 'us');
			} elseif ($attributes['form_email_field'] == 'required' AND filter_var($_POST['contact_email'],FILTER_VALIDATE_EMAIL) === false) {
				$errors['contact_email'] = __('Please, enter correct email', 'us');
			} elseif (in_array($attributes['form_email_field'], array('required', 'show'))) {
				$email = trim($_POST['contact_email']);
			}

			// Check phone
			if($attributes['form_phone_field'] == 'required' AND trim($_POST['contact_phone']) == '') {
				$errors['contact_phone'] = __('Please, enter your phone', 'us');
			} elseif (in_array($attributes['form_phone_field'], array('required', 'show'))) {
				$phone = trim($_POST['contact_phone']);
			}

			//Check message
			if(trim($_POST['contact_message']) == '') {
				$errors['contact_message'] = __('Please, enter your message', 'us');
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['contact_message']));
				} else {
					$comments = trim($_POST['contact_message']);
				}
			}

			// Check captcha
			if($attributes['form_captcha'] == 'show' AND md5(@$_POST['contact_captcha'].$attributes['captcha_salt']) != @$_POST['contact_captcha_result']) {
				$errors['contact_captcha'] = __('Please, enter correct result', 'us');
			}


			// Send the email
			if(!count($errors)) {
				$emailTo = ($attributes['form_email'] != '')?$attributes['form_email']:get_option('admin_email');
				$body = '';
				if (in_array($attributes['form_name_field'], array('required', 'show'))) {
					$body .= "Name: $name \n\n";
				}
				if (in_array($attributes['form_email_field'], array('required', 'show'))) {
					$body .= "Email: $email \n\n";
				}
				if (in_array($attributes['form_phone_field'], array('required', 'show'))) {
					$body .= "Phone: $phone \n\n";
				}
				$body .= "Message:\n $comments";
				$headers = '';

				$mail = wp_mail($emailTo, __('Contact request from', 'us')." http://".$_SERVER['HTTP_HOST'].'/', $body, $headers);

				$mailSent = true;

				$_POST['contact_name'] = $_POST['contact_email'] = $_POST['contact_phone'] = $_POST['contact_message'] = '';
			}
		}

		$output = '<form class="g-form" action="" method="post">';

		if (isset($mailSent) AND $mailSent)
		{
			$output .= '<div class="g-alert type_success with_close">
					<div class="g-alert-close">×</div>
					<div class="g-alert-body">
						<p><b>'.__('Thank You', 'us').'!</b> '.__('Your message was sent', 'us').'.</p>
					</div>
					</div>';
		}

		$output .= '<input type="hidden" name="action" value="contact">
			<div class="g-form-group">
				<div class="g-form-group-rows">';

		$name_error_text = (isset($errors['contact_name']))?'<div class="g-form-row-state">'.$errors['contact_name'].'</div>':'';
		$name_error_class = (isset($errors['contact_name']))?' check_wrong':'';
		$name_required = ($attributes['form_name_field'] == 'required')?' *':'';

		$email_error_text = (isset($errors['contact_email']))?'<div class="g-form-row-state">'.$errors['contact_email'].'</div>':'';
		$email_error_class = (isset($errors['contact_email']))?' check_wrong':'';
		$email_required = ($attributes['form_email_field'] == 'required')?' *':'';

		$phone_error_text = (isset($errors['contact_phone']))?'<div class="g-form-row-state">'.$errors['contact_phone'].'</div>':'';
		$phone_error_class = (isset($errors['contact_phone']))?' check_wrong':'';
		$phone_required = ($attributes['form_phone_field'] == 'required')?' *':'';

		$message_error_text = (isset($errors['contact_message']))?'<div class="g-form-row-state">'.$errors['contact_message'].'</div>':'';
		$message_error_class = (isset($errors['contact_message']))?' check_wrong':'';

		$captcha_error_text = (isset($errors['contact_captcha']))?'<div class="g-form-row-state">'.$errors['contact_captcha'].'</div>':'';
		$captcha_error_class = (isset($errors['contact_captcha']))?' check_wrong':'';

		if (in_array($attributes['form_name_field'], array('required', 'show'))) {
			$output .= '<div class="g-form-row'.$name_error_class.'">
						<div class="g-form-row-label">
							<label class="g-form-row-label-h" for="contact_name">'.__('Your Name', 'us').$name_required.'</label>
						</div>
						<div class="g-form-row-field">
							<div class="g-input">
								<input type="text" name="contact_name" id="contact_name" value="'.@$_POST['contact_name'].'">
							</div>
						</div>
						'.$name_error_text.'
					</div>';
		}

		if (in_array($attributes['form_email_field'], array('required', 'show'))) {
			$output .= '<div class="g-form-row'.$email_error_class.'">
						<div class="g-form-row-label">
							<label class="g-form-row-label-h" for="contact_email">'.__('Your Email', 'us').$email_required.'</label>
						</div>
						<div class="g-form-row-field">
							<div class="g-input">
								<input type="text" name="contact_email" id="contact_email" value="'.@$_POST['contact_email'].'">
							</div>
						</div>
						'.$email_error_text.'
					</div>';
		}

		if (in_array($attributes['form_phone_field'], array('required', 'show'))) {
			$output .= '<div class="g-form-row'.$phone_error_class.'">
						<div class="g-form-row-label">
							<label class="g-form-row-label-h" for="contact_phone">'.__('Your Phone', 'us').$phone_required.'</label>
						</div>
						<div class="g-form-row-field">
							<div class="g-input">
								<input type="text" name="contact_phone" id="contact_phone" value="'.@$_POST['contact_phone'].'">
							</div>
						</div>
						'.$phone_error_text.'
					</div>';
		}


		$output .= '<div class="g-form-row'.$message_error_class.'">
						<div class="g-form-row-label">
							<label class="g-form-row-label-h" for="input1x3">'.__('Your Message', 'us').' *</label>
						</div>
						<div class="g-form-row-field">
							<div class="g-input">
								<textarea name="contact_message" id="contact_message" cols="30" rows="10">'.@$_POST['contact_message'].'</textarea>
							</div>
						</div>
						'.$message_error_text.'
					</div>';

		if ($attributes['form_captcha'] == 'show') {
			$first_num = rand(0, 19);
			$second_num = rand(0, 19);
			$sign = rand(0,1);
			if ($sign) {
				$result = $first_num+$second_num;
				$equation = $first_num.' + '.$second_num;
			} else {
				if ($first_num < $second_num){
					$first_num = $first_num+$second_num;
					$second_num = $first_num-$second_num;
					$first_num = $first_num-$second_num;
				}
				$result = $first_num-$second_num;
				$equation = $first_num.' - '.$second_num;
			}
			$output .= '<div class="g-form-row'.$captcha_error_class.'">
						<div class="g-form-row-label">
							<label class="g-form-row-label-h" for="contact_captcha">'.__('Just to prove you are a human, please solve the equation: ', 'us').' '.$equation.'</label>
						</div>
						<div class="g-form-row-field">
							<div class="g-input">
								<input type="hidden" name="contact_captcha_result" value="'.md5($result.$attributes['captcha_salt']).'">
								<input type="text" name="contact_captcha" id="contact_captcha" value="">
							</div>
						</div>
						'.$captcha_error_text.'
					</div>';
		}

        $btn_type = ($attributes['button_type'] != '')?' color_'.$attributes['button_type']:' color_primary';
        $btn_outlined = ($attributes['button_outlined'] == 1 OR $attributes['button_outlined'] == 'yes')?' outlined':'';

		$output .= '<div class="g-form-row">
						<div class="g-form-row-label"></div>
						<div class="g-form-row-field">
							<button class="g-btn'.$btn_type.$btn_outlined.'"><span>'.__('Send Message', 'us').'</span></button>
						</div>
					</div>
				</div>
			</div>
		</form>';

		return $output;
	}

	public function vc_social_links($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'size' => '',
                'align' => '',
				'email' => '',
				'facebook' => '',
				'twitter' => '',
				'google' => '',
				'linkedin' => '',
				'youtube' => '',
				'vimeo' => '',
				'flickr' => '',
				'instagram' => '',
				'behance' => '',
				'xing' => '',
				'pinterest' => '',
				'skype' => '',
				'tumblr' => '',
				'dribbble' => '',
				'vk' => '',
				'rss' => '',
			), $attributes);

		$socials = array (
			'email' => 'Email',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'google' => 'Google+',
			'linkedin' => 'LinkedIn',
			'youtube' => 'YouTube',
			'vimeo' => 'Vimeo',
			'flickr' => 'Flickr',
			'instagram' => 'Instagram',
			'behance' => 'Behance',
			'xing' => 'Xing',
			'pinterest' => 'Pinterest',
			'skype' => 'Skype',
			'tumblr' => 'Tumblr',
			'dribbble' => 'Dribbble',
			'vk' => 'Vkontakte',
			'rss' => 'RSS',
		);

		$size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';
		$align_class = ($attributes['align'] != '')?' align_'.$attributes['align']:'';

		$output = '<div class="w-socials'.$size_class.$align_class.'">
			<div class="w-socials-list">';

		foreach ($socials as $social_key => $social)
		{
			if ($attributes[$social_key] != '')
			{
				if ($social_key == 'email')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" href="mailto:'.$attributes[$social_key].'">
						<i class="fa fa-envelope"></i>
					</a>
					<div class="w-socials-item-popup">
						<span>'.$social.'</span>
					</div>
					</div>';

				}
				elseif ($social_key == 'google')
				{
					$output .= '<div class="w-socials-item gplus">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-google-plus"></i>
					</a>
					<div class="w-socials-item-popup">
						<span>'.$social.'</span>
					</div>
					</div>';

				}
				elseif ($social_key == 'youtube')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-youtube-play"></i>
					</a>
					<div class="w-socials-item-popup">
						<span>'.$social.'</span>
					</div>
					</div>';

				}
				elseif ($social_key == 'vimeo')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-vimeo-square"></i>
					</a>
					<div class="w-socials-item-popup">
						<span>'.$social.'</span>
					</div>
					</div>';

				}
				else
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-'.$social_key.'"></i>
					</a>
					<div class="w-socials-item-popup">
						<span>'.$social.'</span>
					</div>
					</div>';
				}

			}
		}

		$output .= '</div></div>';

		return $output;
	}

	public function vc_contacts($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'phone' => '',
				'fax' => '',
				'email' => '',
				'address' => '',
			), $attributes);


		$output = 	'<div class="w-contacts">
						<div class="w-contacts-h">
							<div class="w-contacts-list">';
		if ($attributes['address'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-map-marker"></i>
									<span class="w-contacts-item-value">'.$attributes['address'].'</span>
								</div>';
		}
		if ($attributes['phone'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-phone"></i>
									<span class="w-contacts-item-value">'.$attributes['phone'].'</span>
								</div>';
		}
		if ($attributes['fax'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-print"></i>
									<span class="w-contacts-item-value">'.$attributes['fax'].'</span>
								</div>';
		}
		if ($attributes['email'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-envelope"></i>
									<span class="w-contacts-item-value"><a href="mailto:'.$attributes['email'].'">'.$attributes['email'].'</a></span>
								</div>';
		}

		$output .= 			'</div>
						</div>
					</div>';

		return $output;
	}

	public function pricing_table($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = '<div class="w-pricing">'.do_shortcode($content).'</div>';

		return $output;
	}

	public function pricing_column($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
				'type' => '',
				'price' => '',
				'time' => '',
			), $attributes);

		$featured_class = ($attributes['type'] == 'featured')?' type_featured':'';

		$output = 	'<div class="w-pricing-item'.$featured_class.'"><div class="w-pricing-item-h">
						<div class="w-pricing-item-header">
							<div class="w-pricing-item-title">'.$attributes['title'].'</div>
							<div class="w-pricing-item-price">'.$attributes['price'].'<small>'.$attributes['time'].'</small></div>
						</div>
						<ul class="w-pricing-item-features">'.
						do_shortcode($content).
					'</ul></div></div>';

		return $output;
	}

	public function pricing_row($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = 	'<li class="w-pricing-item-feature">'.do_shortcode($content).'</li>';

		return $output;

	}

	public function pricing_footer($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'url' => '',
				'type' => 'default',
				'outlined' => false,
				'size' => '',
				'icon' => '',
			), $attributes);

		if ($attributes['url'] == '') $attributes['url'] = 'javascript:void(0)';
        $outlined_class = ($attributes['outlined'] == 1 OR $attributes['outlined'] == 'yes')?' outlined':'';
		$output = 	'<div class="w-pricing-item-footer">
						<a class="w-pricing-item-footer-button g-btn'.$outlined_class;
		$output .= ($attributes['type'] != '')?' color_'.$attributes['type']:'';
		$output .= ($attributes['size'] != '')?' size_'.$attributes['size']:'';
		$output .= '" href="'.$attributes['url'].'"><span>'.do_shortcode($content).'</span></a>
					</div>';

		return $output;

	}



	public function timepoint_title($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
                'active' => false,
			), $attributes);

		global $first_tab_title, $auto_open;
		if ($auto_open) {
//			$active_class = ($first_tab_title)?' active':'';
			$first_tab_title = FALSE;
		} else {
			$active_class = ($attributes['open'])?' active':'';
		}

        $active_class = ($attributes['active'] == 1 OR $attributes['active'] == 'yes')?' active':'';

		$output = 	'<div class="w-timeline-item'.$active_class.'"><span class="w-timeline-item-title">'.$attributes['title'].'</span></div> ';

		return $output;
	}

	public function item_title($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
                'active' => false,
				'icon' => '',
			), $attributes);

		global $first_tab_title, $auto_open;
		if ($auto_open) {
			$active_class = ($first_tab_title)?' active':'';
			$first_tab_title = FALSE;
		} else {
			$active_class = ($attributes['open'])?' active':'';
		}

        $active_class = ($attributes['active'] == 1 OR $attributes['active'] == 'yes')?' active':'';

		$icon_class = ($attributes['icon'] != '')?' fa fa-'.$attributes['icon']:'';
		$item_icon_class = ($attributes['icon'] != '')?' with_icon':'';

		$output = 	'<div class="w-tabs-item'.$active_class.$item_icon_class.'">'.
						'<span class="w-tabs-item-icon'.$icon_class.'"></span>'.
						'<span class="w-tabs-item-title">'.$attributes['title'].'</span>'.
					'</div>';

		return $output;
	}

    public function vc_icon($attributes, $content = null)
    {
        $attributes = shortcode_atts(
            array(
                'icon' => "",
                'color' => "",
                'size' => "",
                'with_circle' => false,
                'link' => "",
                'external' => false,
            ), $attributes);

        $color_class = ($attributes['color'] != '')?' color_'.$attributes['color']:' color_text';
        $size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';
        $with_circle_class = ($attributes['with_circle'] == 1 OR $attributes['with_circle'] == 'yes')?' with_circle':'';

        if ($attributes['link'] != '') {
            $link = $attributes['link'];
            $link_start = '<a class="w-icon-link" href="'.$link.'"';
            $link_start .= ($attributes['external'] == 1 OR $attributes['external'] == 'yes')?' target="_blank"':'';
            $link_start .= '>';
            $link_end = '</a>';
        }
        else
        {
            $link_start = '<span class="w-icon-link">';
            $link_end = '</span>';
        }

        $output = 	'<span class="w-icon'.$color_class.$size_class.$with_circle_class.'">
						'.$link_start.'
							<i class="fa fa-'.$attributes['icon'].'"></i>
						'.$link_end.'
					</span>';

        return $output;
    }

	public function vc_actionbox ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'type' => 'grey',
				'title' => 'ActionBox title',
				'title_size' => 'h2',
				'message' => '',
				'button1' => '',
				'link1' => '',
				'style1' => 'default',
				'outlined1' => false,
                'size1' => '',
                'icon1' => '',
                'target1' => '',
                'button2' => '',
				'link2' => '',
				'style2' => 'default',
                'outlined2' => false,
				'size2' => '',
                'icon2' => '',
                'target2' => '',
				'animate' => '',
			), $attributes);

		$animate_class = ($attributes['animate'] != '')?' animate_'.$attributes['animate']:'';

		$actionbox_controls_position_class = ' controls_aside';


		$output = 	'<div class="w-actionbox color_'.$attributes['type'].$actionbox_controls_position_class.$animate_class.'">'.
			'<div class="w-actionbox-text">';
		if ($attributes['title'] != '')
		{
			$output .= 			'<h3>'.html_entity_decode($attributes['title']).'</h3>';
		}
		if ($attributes['message'] != '')
		{
			$output .= 			'<p>'.html_entity_decode($attributes['message']).'</p>';
		}


		$output .=			'</div>'.
			'<div class="w-actionbox-controls">';

		if ($attributes['button1'] != '' AND $attributes['link1'] != '')
		{
			$colour_class = ($attributes['style1'] != '')?' color_'.$attributes['style1']:'';
			$size_class = ($attributes['size1'] != '')?' size_'.$attributes['size1']:'';
            $outlined_class = ($attributes['outlined1'] == 1 OR $attributes['outlined1'] == 'yes')?' outlined':'';
            $taget_part = ($attributes['target1'] == '_blank')?' target="_blank"':'';
            $icon_part = ($attributes['icon1'] != '')?'<i class="fa fa-'.$attributes['icon1'].'"></i>':'';
			$output .= '<a class="w-actionbox-button g-btn'.$size_class.$colour_class.$outlined_class.'" href="'.$attributes['link1'].'"'.$taget_part.'><span>'.$icon_part.$attributes['button1'].'</span></a>';
		}

		if ($attributes['button2'] != '' AND $attributes['link2'] != '')
		{
			$colour_class = ($attributes['style2'] != '')?' color_'.$attributes['style2']:'';
			$size_class = ($attributes['size2'] != '')?' size_'.$attributes['size2']:'';
            $outlined_class = ($attributes['outlined2'] == 1 OR $attributes['outlined2'] == 'yes')?' outlined':'';
            $taget_part = ($attributes['target2'] == '_blank')?' target="_blank"':'';
            $icon_part = ($attributes['icon2'] != '')?'<i class="fa fa-'.$attributes['icon2'].'"></i>':'';
			$output .= 			'<a class="w-actionbox-button g-btn'.$size_class.$colour_class.$outlined_class.'" href="'.$attributes['link2'].'"'.$taget_part.'><span>'.$icon_part.$attributes['button2'].'</span></a>';
		}

		$output .=			'</div>'.
			'</div>';
		return $output;
	}

	public function section ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'background' => FALSE,
				'img' => FALSE,
				'bg_fade' => FALSE,
				'parallax' => FALSE,
				'parallax_bg_width' => FALSE,
				'parallax_speed' => FALSE,
				'full_width' => FALSE,
				'full_height' => FALSE,
				'class' => FALSE,
				'id' => FALSE,

			), $attributes);

		$output_type = ($attributes['background'] != '')?' color_'.$attributes['background']:'';
		$full_width_type = ($attributes['full_width'] != '')?' full_width':'';
		$full_height_type = ($attributes['full_height'] != '')?' full_height':'';
		$fade_class = ($attributes['bg_fade'] != '')?' bg_fade '.$attributes['bg_fade']:'';
		$background_tag = '';
		if ($attributes['img'] != '')
		{
//			$output_type = ' type_background';
			if (is_numeric($attributes['img']))
			{
				$img_id = preg_replace('/[^\d]/', '', $attributes['img']);
				$img = wp_get_attachment_image_src($img_id, 'full', 0);

				if ( $img != NULL )
				{
					$img = $img[0];
                    $background_tag = '<div class="l-submain-bg" style="background-image: url('.$img.');"></div>';
				}


			}
			else
			{
                $background_tag = '<div class="l-submain-bg" style="background-image: url('.$attributes['img'].');"></div>';
			}

		}

		$parallax_class = '';
		$additional_class = ($attributes['class'] != '')?' '.$attributes['class']:'';
        $section_id = ($attributes['id'] != '')?$attributes['id']:'';
        $section_id_string = ($attributes['id'] != '')?' id="'.$attributes['id'].'"':'';
		$js_output = '';
		if ($attributes['parallax'] == 'vertical') {
            if ($section_id_string == '') {
                $section_id = 'section_'.rand(99999, 999999);
                $section_id_string = ' id="'.$section_id.'"';
            }
			$parallax_class = ' parallax_ver';

			$js_output = "<script type='text/javascript'>jQuery(document).ready(function(){ jQuery('#".$section_id." .l-submain-bg').parallax('50%', '".$attributes['parallax_speed']."'); });</script>";
		} elseif ($attributes['parallax'] == 'horizontal') {
            if ($section_id_string == '') {
                $section_id = 'section_'.rand(99999, 999999);
                $section_id_string = ' id="'.$section_id.'"';
            }
            $parallax_class = ' parallax_hor';
            if ($attributes['parallax_bg_width'] != '') {
                $parallax_class .= ' bgwidth_'.$attributes['parallax_bg_width'];
            }

            $js_output = "<script type='text/javascript'>jQuery(document).ready(function(){ jQuery('#".$section_id."').horparallax(); });</script>";
        }

		$output =	'<div class="l-submain'.$fade_class.$full_width_type.$full_height_type.$output_type.$parallax_class.$additional_class.'"'.$section_id_string.'>'.
                        $background_tag.
						'<div class="l-submain-h g-html i-cf">'.
							do_shortcode($content).
						'</div>'.
					'</div>'.$js_output;

		return $output;
	}

	public function section_dummy ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'type' => FALSE,
				'with' => FALSE,

			), $attributes);

		$output = 	'<div>'.do_shortcode($content).'</div>';

		return $output;
	}

	public function vc_iconbox($attributes, $content)
    {
        $attributes = shortcode_atts(
            array(
                'icon' => '',
                'img' => '',
                'title' => '',
                'with_circle' => false,
                'link' => '',
                'iconpos' => 'top',
                'external' => false,

            ), $attributes);

        $img_class = ($attributes['img'] != '')?' custom_img':'';
        $iconpos_class = ($attributes['iconpos'] != '')?' iconpos_'.$attributes['iconpos']:'';
        $with_circle_class = ($attributes['with_circle'] == 1 OR $attributes['with_circle'] == 'yes')?' with_circle':'';

        if ($attributes['link'] != '') {
            $link = $attributes['link'];
            $link_start = '<a class="w-iconbox-link" href="'.$link.'"';
            $link_start .= ($attributes['external'] == 1 OR $attributes['external'] == 'yes')?' target="_blank"':'';
            $link_start .= '>';
            $link_end = '</a>';
        }
        else
        {
            $link_start = '<span class="w-iconbox-nolink">';
            $link_end = '</span>';
        }

        $output =	'<div class="w-iconbox'.$img_class.$iconpos_class.$with_circle_class.'">
						'.$link_start.'
						<div class="w-iconbox-icon">
							<i class="fa fa-'.$attributes['icon'].'"></i>';
        if ($attributes['img'] != '') {
            if (is_numeric($attributes['img']))
            {
                $img_id = preg_replace('/[^\d]/', '', $attributes['img']);
                $img = wp_get_attachment_image_src($img_id, 'full', 0);

                if ( $img != NULL )
                {
                    $img = $img[0];
                }
            }
            else
            {
                $img =  $attributes['img'];
            }
			$output .=		'<img src="'.$img.'" alt="">';
        }
        $output .=	'	</div>
						<h4 class="w-iconbox-title">'.$attributes['title'].'</h4>
						'.$link_end.'
						<div class="w-iconbox-text">
							<p>'.do_shortcode($content).'</p>
						</div>
					</div>';

        return $output;
    }

	public function vc_testimonial($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'author' => '',
				'company' => '',
				'animate' => '',

			), $attributes);

		$animate_class = ($attributes['animate'] != '')?' animate_'.$attributes['animate']:'';

        $separator = '';
        if ($attributes['author'] != '' AND $attributes['company'] != '') {
            $separator = ',';
        }

		$output = 	'<div class="w-testimonial'.$animate_class.'">
						<blockquote>
							<q class="w-testimonial-text">'.do_shortcode($content).'</q>
							<div class="w-testimonial-person">
								<i class="fa fa-user"></i>
								<span class="w-testimonial-person-name">'.$attributes['author'].'</span>'.$separator.'
								<span class="w-testimonial-person-meta">'.$attributes['company'].'</span>
							</div>
						</blockquote>
					</div>';

		return $output;
	}

	public function vc_member ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'name' => '',
				'role' => '',
				'img' => '',
				'email' => '',
				'facebook' => '',
				'twitter' => '',
				'google_plus' => '',
				'linkedin' => '',
				'link' => '',
				'animate' => '',
			), $attributes);

		$animate_class = ($attributes['animate'] != '')?' animate_'.$attributes['animate']:'';

		if (is_numeric($attributes['img']))
		{
			$img_id = preg_replace('/[^\d]/', '', $attributes['img']);
            $img = wp_get_attachment_image_src($img_id, 'full', 0);

			if ( $img != NULL )
			{
				$img = $img[0];
			}
		}
		else
		{
			$img =  $attributes['img'];
		}

		if ( $img == NULL OR $img == '' )
		{
			$img = get_template_directory_uri().'/img/placeholder/500x500.gif';
		}

		$social_output = '';

		if ($attributes['facebook'] != '' OR $attributes['twitter'] != '' OR $attributes['google_plus'] != '' OR $attributes['linkedin'] != '' OR $attributes['email'] != '')
		{
			$social_output .=		'<div class="w-team-links">'.
										'<div class="w-team-links-list">';
			if ($attributes['email'] != '')
			{
				$social_output .= 			'<a class="w-team-links-item" href="mailto:'.$attributes['email'].'"><i class="fa fa-envelope"></i></a>';
			}
			if ($attributes['facebook'] != '')
			{
				$social_output .= 			'<a class="w-team-links-item" href="'.$attributes['facebook'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
			}
			if ($attributes['twitter'] != '')
			{
				$social_output .= 			'<a class="w-team-links-item" href="'.$attributes['twitter'].'" target="_blank"><i class="fa fa-twitter"></i></a>';
			}
			if ($attributes['google_plus'] != '')
			{
				$social_output .= 			'<a class="w-team-links-item" href="'.$attributes['google_plus'].'" target="_blank"><i class="fa fa-google-plus"></i></a>';
			}
			if ($attributes['linkedin'] != '')
			{
				$social_output .= 			'<a class="w-team-links-item" href="'.$attributes['linkedin'].'" target="_blank"><i class="fa fa-linkedin"></i></a>';
			}
			$social_output .=			'</div>'.
									'</div>';
		}

        $link_start = $link_end = '';

        if ($attributes['link'] != '') {
            $link_start = '<a class="w-team-link" href="'.$attributes['link'].'">';
            $link_end = '</a>';
        }

		$output = 	'<div class="w-team'.$animate_class.'">
						<div class="w-team-image">
							'.$link_start.'<img src="'.$img.'" alt="" />'.$link_end.'
							'.$social_output.'
						</div>
						<div class="w-team-content">
							'.$link_start.'<h4 class="w-team-name"><span>'.$attributes['name'].'</span></h4>'.$link_end.'
							<div class="w-team-role">'.$attributes['role'].'</div>
							<div class="w-team-description">
								<p>'.do_shortcode($content).'</p>
							</div>
						</div>
					</div>';

		return $output;
	}

    public function vc_blog($attributes, $content)
    {
        $attributes = shortcode_atts(
            array(
                'pagination' => false,
                'type' => 'large_image',
                'show_date' => null,
                'show_author' => null,
                'show_categories' => null,
                'show_tags' => null,
                'show_comments' => null,
                'show_read_more' => null,
                'category' => null,
                'items' => null,
            ), $attributes);

        $blog_thumbnails = array(
            'large_image' => 'blog-large', 'small_square_image' => 'blog-small', 'small_circle_image' => 'blog-small','masonry_ajax' => 'blog-grid', 'masonry_paginated' => 'blog-grid'
        );

        if ( ! in_array($attributes['type'], array('large_image','small_square_image','small_circle_image','masonry_ajax','masonry_paginated')))
        {
            $attributes['type'] = 'large_image';
        }

        global $paged;

        if (is_front_page()) {
            $page_string = 'page';
        } else {
            $page_string = 'paged';
        }

        if ($attributes['pagination'] == 1 OR $attributes['pagination'] == 'yes') {
            $paged = get_query_var($page_string) ? get_query_var($page_string) : 1;
        } else {
            $paged = 1;
        }

        $args = array(
//            'post_type' 		=> 'us_portfolio',
            'post_type' 		=> 'post',
            'post_status' 		=> 'publish',
            'orderby' 			=> 'date',
            'order' 			=> 'DESC',
            'paged' 			=> $paged
        );

        $categories_slugs = null;

        if ( ! empty($attributes['category']))
        {
            $categories_slugs = explode(',', $attributes['category']);
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $categories_slugs
                )
            );
        }

        $attributes['items'] = intval($attributes['items']);
        if (is_integer($attributes['items']) AND $attributes['items'] > 0) {
            $args['posts_per_page'] = $attributes['items'];
        }

        $classes = 'w-blog';

        switch ($attributes['type']) {
            case 'large_image': $classes .= ' imgpos_attop';
                break;
            case 'small_square_image': $classes .= ' imgpos_atleft';
                break;
            case 'small_circle_image': $classes .= ' imgpos_atleft imgtype_circle';
                break;
            case 'masonry_ajax':
            case 'masonry_paginated': $classes .= ' type_masonry imgpos_attop';
                break;
        }

        $output = '<div class="'.$classes.'">
						<div class="w-blog-list">';

        global $wp_query;

        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); $wp_query->query($args);

        while ($wp_query->have_posts())
        {
            $wp_query->the_post();
            global $us_thumbnail_size, $post, $smof_data;
            $us_thumbnail_size = $blog_thumbnails[$attributes['type']];

            $post_format = get_post_format()?get_post_format():'standard';

            if (empty($us_thumbnail_size))
            {
                $us_thumbnail_size = 'blog-grid';
            }


            if ($post_format == 'image')
            {
                $preview = us_post_format_image_preview($us_thumbnail_size);
            }
            elseif ($post_format == 'gallery')
            {
                $preview = (has_post_thumbnail())?get_the_post_thumbnail(get_the_ID(), $us_thumbnail_size):'';

                if ($preview == '') {
                    if ($us_thumbnail_size == 'blog-small') {
                        $preview = '<span class="w-blog-entry-preview-icon">
                            <i class="fa fa-camera"></i>
                        </span>';
                    } else {
                        $preview = us_post_format_gallery_preview(true, $us_thumbnail_size);
                    }
                }
            }
            elseif ($post_format == 'video')
            {
                $preview = (has_post_thumbnail())?get_the_post_thumbnail(get_the_ID(), $us_thumbnail_size):'';

                if ($preview == '') {
                    if ($us_thumbnail_size == 'blog-small' OR $us_thumbnail_size == 'blog-grid') {
                        $preview = '<span class="w-blog-entry-preview-icon">
						<i class="fa fa-film"></i>
					</span>';
                    } else {
                        $preview = us_post_format_video_preview();
                    }
                }

            }
            elseif ($post_format == 'quote')
            {
                $preview = (has_post_thumbnail())?get_the_post_thumbnail(get_the_ID(), $us_thumbnail_size):'';

                if ($preview == '' AND $us_thumbnail_size == 'blog-small') {
                    $preview = '<span class="w-blog-entry-preview-icon">
						<i class="fa fa-quote-left"></i>
					</span>';
                }
            }
            else
            {
                $preview = (has_post_thumbnail())?get_the_post_thumbnail(get_the_ID(), $us_thumbnail_size):'';
            }

            if (empty($preview) AND $us_thumbnail_size == 'blog-small')
            {
                $preview = '<img src="'.get_template_directory_uri().'/img/placeholder/500x500.gif" alt="">';
            }
            $output .= '<div class="' . join( ' ', get_post_class( 'w-blog-entry', null ) ) . '">
                <div class="w-blog-entry-h">';
            if ($preview AND ($post_format == 'video')) {
                $output .= '<span class="w-blog-entry-preview">'.$preview.'</span>';
            }
            $output .= '<a class="w-blog-entry-link" href="'.get_permalink().'">';
            if ($preview AND ! ($post_format == 'video')) {
                $output .= '<span class="w-blog-entry-preview">'.$preview.'</span>';
            }
            if ($post_format == 'quote')
            {
                $output .= '<div class="w-blog-entry-title">
                <blockquote class="w-blog-entry-title-h">'.get_the_title().'</blockquote>
                </div>';
            }
            else
            {
                $output .= '<h2 class="w-blog-entry-title">
                <span class="w-blog-entry-title-h">'.get_the_title().'</span>
                </h2>';
            }
            $output .= '</a>
                    <div class="w-blog-entry-body">
                        <div class="w-blog-meta">';
            if ($attributes['show_date'] == 1 OR $attributes['show_date'] == 'yes') {
                $output .= '<div class="w-blog-meta-date">
                                <i class="fa fa-clock-o"></i>
                                <span>'.get_the_date().'</span>
                            </div>';
            }
            if ($attributes['show_author'] == 1 OR $attributes['show_author'] == 'yes') {
                $output .= '<div class="w-blog-meta-author">
                                <i class="fa fa-user"></i>';
                if (get_the_author_meta('url')) {
                    $output .= '<a href="'.esc_url( get_the_author_meta('url') ).'">'.get_the_author().'</a>';
                } else {
                    $output .= '<span>'.get_the_author().'</span>';
                }
                $output .= '</div>';
            }
            if ($attributes['show_categories'] == 1 OR $attributes['show_categories'] == 'yes') {
                $output .= '<div class="w-blog-meta-category">
                                <i class="fa fa-folder-open"></i>';
                $categories = get_the_category();
                $categories_output = '';
                $separator = ', ';
                if($categories){
                    foreach($categories as $category) {
                        $categories_output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                    }
                }
                $output .= trim($categories_output, $separator).'
                                </div>';
            }
            if ($attributes['show_tags'] == 1 OR $attributes['show_tags'] == 'yes') {
                $tags = wp_get_post_tags($post->ID);
                if ($tags) {
                    $output .= '<div class="w-blog-meta-tags">
                                    <i class="fa fa-tags"></i>';

                    $tags_output = '';
                    $separator = ', ';
                    foreach($tags as $tag) {
                        $tags_output .= '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'.$separator;
                    }

                    $output .= trim($tags_output, $separator).'
                                    </div>';
                }
            }
            if ($attributes['show_comments'] == 1 OR $attributes['show_comments'] == 'yes') {

                if ( ! (get_comments_number() == 0 AND ! comments_open() AND ! pings_open())) {
                    $output .= '<div class="w-blog-meta-comments">';
                    $output .= '<i class="fa fa-comments"></i>';
                    $number = get_comments_number();

                    if ( 0 == $number ) {
                        $comments_link = get_permalink() . '#respond';
                    }
                    else {
                        $comments_link = esc_url(get_comments_link());
                    }

                    $output .= '<a href="'.$comments_link.'" class="w-blog-entry-meta-comments-h">';


                    if ( $number > 1 )
                        $output .= str_replace('%', number_format_i18n($number), __('% Comments', 'us'));
                    elseif ( $number == 0 )
                        $output .= __('No Comments', 'us');
                    else // must be one
                        $output .= __('1 Comment', 'us');
                    $output .= '</a></div>';
                }

            }
            $output .= '</div>';

            $output .= '<div class="w-blog-entry-short">';

            $excerpt = $post->post_excerpt;
            if ($excerpt == '') {
                $excerpt = get_the_content(get_the_ID());
                $excerpt = do_shortcode($excerpt);
                $excerpt = $this->sections_fix($excerpt);
            }

            $excerpt = apply_filters('the_excerpt', $excerpt);
            $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
            $excerpt_length = apply_filters('excerpt_length', 55);
            $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
            $excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );

            $output .= $excerpt;

            $output .= '</div>';

            if ($attributes['show_read_more'] == 1 OR $attributes['show_read_more'] == 'yes') {
                $output .= '<a class="w-blog-entry-more g-btn color_default size_small outlined" href="'.get_permalink().'"><span>'.__('Read More', 'us').'</span></a>';
            }



			$output .= '</div></div></div>';
        }

        $output .= '</div></div>';

        if ($attributes['pagination'] == 1 OR $attributes['pagination'] == 'yes') {
            if ($pagination = us_pagination()) {
                $output .= '<div class="g-pagination align_center">
                        '.$pagination.'
                </div>';
            }
        }

        wp_reset_postdata();
        $wp_query= $temp;

        return $output;

    }

	public function vc_portfolio($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'pagination' => false,
				'filters' => false,
				'columns' => 3,
				'category' => null,
				'items' => null,
				'ratio' => '3:2',
				'with_indents' => false,
			), $attributes);

        if ( ! in_array($attributes['columns'], array(2,3,4,5)))
        {
            $attributes['columns'] = 3;
        }

        if ( ! in_array($attributes['ratio'], array('3:2','4:3','1:1', '2:3', '3:4',)))
        {
            $attributes['ratio'] = '3:2';
        }

        $attributes['ratio'] = str_replace(':', '-', $attributes['ratio']);

        global $wp_query;

        $attributes['items'] = intval($attributes['items']);
        $portfolio_items = (is_integer($attributes['items']) AND $attributes['items'] > 0)?$attributes['items']:$attributes['columns'];

        global $paged;

        if (is_front_page()) {
            $page_string = 'page';
        } else {
            $page_string = 'paged';
        }

        if ($attributes['pagination'] == 1 OR $attributes['pagination'] == 'yes') {
            $paged = get_query_var($page_string) ? get_query_var($page_string) : 1;
        } else {
            $paged = 1;
        }

        $args = array(
            'post_type' 		=> 'us_portfolio',
            'posts_per_page' 	=> $portfolio_items,
            'post_status' 		=> 'publish',
            'orderby' 			=> 'date',
            'order' 			=> 'DESC',
            'paged' 			=> $paged
        );

        $filters_html = $sortable_class = '';
        $categories_slugs = null;

        if ( ! empty($attributes['category'])) {

            $categories_slugs = explode(',', $attributes['category']);
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'us_portfolio_category',
                    'field' => 'slug',
                    'terms' => $categories_slugs
                )
            );
        }


        if ($attributes['filters'] == 1 OR $attributes['filters'] == 'yes') {
            $categories = get_terms('us_portfolio_category');

            if ( ! empty($categories_slugs))
            {
                foreach ($categories as $cat_id => $category)
                {
                    if ( ! in_array($category->slug, $categories_slugs)) {
                        unset($categories[$cat_id]);
                    }
                }
            }

            if (count($categories) > 1) {
                $filters_html .= '<div class="w-filters"><div class="w-filters-list">
                                    <div class="w-filters-item active">
										<a class="w-filters-item-link" href="javascript:void(0);" data-filter="*">'.__('All', 'us').'</a>
									</div>';
                foreach($categories as $category) {
                    $filters_html .= '<div class="w-filters-item">
										<a class="w-filters-item-link" href="javascript:void(0);" data-filter=".'.$category->slug.'">'.$category->name.'</a>
									</div>';
                }

                $filters_html .= '</div></div>';
            }
        }

        if ($filters_html != '') {
            $sortable_class = ' type_sortable';
        }

        $with_indents_class = ($attributes['with_indents'] == 1 OR $attributes['with_indents'] == 'yes')?' with_indents':'';

        $output = '<div class="w-portfolio type_1 align_center columns_'.$attributes['columns'].' ratio_'.$attributes['ratio'].$sortable_class.$with_indents_class.'">
						'.$filters_html;

        $temp = $wp_query; $wp_query= null;

        $output .= '<div class="w-portfolio-list">';

        $wp_query = new WP_Query($args);

        $portfolio_order_counter = 0;

        while ( $wp_query->have_posts() )
        {
            $wp_query->the_post();
            $portfolio_order_counter++;
            $item_categories_links = '';
            $item_categories_classes = '';
            $item_categories = get_the_terms(get_the_ID(), 'us_portfolio_category');
            if (is_array($item_categories))
            {
                foreach ($item_categories as $item_category)
                {
                    $item_categories_links .= $item_category->name.' / ';
                    $item_categories_classes .= ' '.$item_category->slug;
                }
            }
            if (function_exists('mb_strlen'))
            {
                if (mb_strlen($item_categories_links) > 0 )
                {
                    $item_categories_links = mb_substr($item_categories_links, 0, -2);
                }
            }
            else
            {
                if (strlen($item_categories_links) > 0 )
                {
                    $item_categories_links = substr($item_categories_links, 0, -2);
                }
            }

            $link_ref = $link_target = '';
            $link = esc_url( apply_filters( 'the_permalink', get_permalink() ) );

            if (rwmb_meta('us_custom_link') != ''){
                $link = rwmb_meta('us_custom_link');
                if (rwmb_meta('us_custom_link_blank') == 1){
                    $link_target = ' target="_blank"';
                }
            }

            if (rwmb_meta('us_lightbox') == 1){
                $img_id = get_post_thumbnail_id();
                $link = wp_get_attachment_image_src($img_id, 'full');
                $link = $link[0];
                $link_ref = ' ref="magnificPopup"';
            }

            $output .= '<div class="w-portfolio-item order_'.$portfolio_order_counter.$item_categories_classes.'">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor"'.$link_target.$link_ref.' href="'.$link.'">
									<div class="w-portfolio-item-image">';
            if (has_post_thumbnail()) {
                $output .= get_the_post_thumbnail(null, 'portfolio-list-'.$attributes['ratio'], array('class' => 'w-portfolio-item-image-first'));
            } else {
                $output .= '<img class="w-portfolio-item-image-first" src="'.get_template_directory_uri().'/img/placeholder/500x500.gif" alt="">';
            }

            $additional_image = '';
            if (rwmb_meta('us_additional_image') != '')
            {
                $additional_img_id = preg_replace('/[^\d]/', '', rwmb_meta('us_additional_image'));
                $additional_img = wp_get_attachment_image_src($additional_img_id, 'portfolio-list-'.$attributes['ratio'], 0);

                if ( $additional_img != NULL )
                {
                    $additional_image = $additional_img[0];
                }
            }
            if ($additional_image != '')
            {
                $output .= '<img class="w-portfolio-item-image-second" src="'.$additional_image.'" alt="">';
            }
                    $output .= '	</div>
									<div class="w-portfolio-item-meta">
										<div class="w-portfolio-item-meta-h">
											<h2 class="w-portfolio-item-title">'.the_title('','', FALSE).'</h2>
											<span class="w-portfolio-item-arrow"></span>
										</div>
									</div>
								</a>
							</div>
						</div>';
        }

        $output .= '</div>';
        if ($attributes['pagination'] == 1 OR $attributes['pagination'] == 'yes') {
            if ($pagination = us_pagination()) {
                $output .= '<div class="w-portfolio-pagination">
                    <div class="g-pagination align_center">
                        '.$pagination.'
                    </div>
                </div>';
            }
        }

        $output .= '</div>';

        wp_reset_postdata();
        $wp_query= $temp;

        return $output;

    }

	public function vc_clients($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'amount' => 1000,
				'auto_scroll' => false,
				'interval' => 1,
			), $attributes);

		$args = array(
			'post_type' => 'us_client',
			'paged' => 1,
			'posts_per_page' => $attributes['amount'],
		);

        $rand_id = rand(100000, 999999);

        $auto_scroll = ($attributes['auto_scroll'] == 1 OR $attributes['auto_scroll'] == 'yes')?'true':'false';
        $interval = intval($attributes['interval']);
        if ($interval < 1) {
            $interval = 1;
        }
        $interval = $interval*1000;

		$cleints = new WP_Query($args);

		$output = 	'<div class="w-clients columns_5 clients_'.$rand_id.'">
						<div class="w-clients-list">
							<div class="w-clients-list-h">';

		while($cleints->have_posts())
		{
			$cleints->the_post();
			if(has_post_thumbnail())
			{
				if (rwmb_meta('us_client_url') != '')
				{
					$client_new_tab = (rwmb_meta('us_client_new_tab') == 1)?' target="_blank"':'';
					$client_url = (rwmb_meta('us_client_url') != '')?rwmb_meta('us_client_url'):'javascript:void(0);';
					$client_url = (substr($client_url, 0, 4) == 'http' OR $client_url == 'javascript:void(0);' OR $client_url == '#')?$client_url:'//'.$client_url;
					$output .= 			'<a class="w-clients-item" href="'.$client_url.'"'.$client_new_tab.'>'.
							get_the_post_thumbnail(get_the_ID(), 'carousel-thumb').
						'</a>';
				}
				else
				{
					$output .= 			'<div class="w-clients-item">'.
							get_the_post_thumbnail(get_the_ID(), 'carousel-thumb').
						'</div>';
				}

			}
		}

	    $output .=			'</div>
						</div>
						<a class="w-clients-nav to_prev disabled" href="javascript:void(0)" title=""></a>
						<a class="w-clients-nav to_next" href="javascript:void(0)" title=""></a>
					</div>';
        $output .= '<script type="text/javascript">
						jQuery(window).load(function() {
							jQuery(".clients_'.$rand_id.'").carousello({use3d: false, autoScroll: '.$auto_scroll.',interval: '.$interval.'});
						});
					</script>';
		return $output;
	}

	public function vc_latest_posts($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'posts' => 2,
				'category' => null,
			), $attributes);

		if ( ! in_array($attributes['posts'], array(1,2,3)))
		{
			$attributes['posts'] = 2;
		}

		$args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
			'paged' => 1,
			'posts_per_page' => $attributes['posts'],
			'post__not_in' => get_option( 'sticky_posts' )
		);

		if ( ! empty($attributes['category'])) {
			$args['category_name'] = $attributes['category'];
		}

		$latest_posts = new WP_Query($args);

		$output = 	'<div class="w-shortblog columns_'.$attributes['posts'].' date_atleft">
							<div class="w-shortblog-h">
								<div class="w-shortblog-list">';
		global $disable_section_shortcode;
		$disable_section_shortcode_tmp = $disable_section_shortcode;
		$disable_section_shortcode = TRUE;
		while($latest_posts->have_posts())
		{
			$latest_posts->the_post();


			$excerpt = get_the_content(get_the_ID());
			$excerpt = do_shortcode($excerpt);
			$excerpt = $this->sections_fix($excerpt);


			$excerpt = apply_filters('the_excerpt', $excerpt);
			$excerpt = str_replace(']]>', ']]&gt;', $excerpt);
			$excerpt_length = apply_filters('excerpt_length', 55);
			$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
			$excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );

			$output .= 				'<div class="w-shortblog-entry">
										<div class="w-shortblog-entry-h">
											<a class="w-shortblog-entry-link" href="'.get_permalink(get_the_ID()).'">
												<h4 class="w-shortblog-entry-title">
													<span class="w-shortblog-entry-title-h">'.get_the_title().'</span>
												</h4>
											</a>
											<div class="w-shortblog-entry-meta">
												<div class="w-shortblog-entry-meta-date">
													<span class="w-shortblog-entry-meta-date-month">'.get_the_date('M').'</span>
										<span class="w-shortblog-entry-meta-date-day">'.get_the_date('d').'</span>
										<span class="w-shortblog-entry-meta-date-year">'.get_the_date('Y').'</span>
												</div>
											</div>
											<div class="w-shortblog-entry-short">
											'.$excerpt.'
											</div>
										</div>
									</div>';
		}
		$output .=				'</div>
							</div>
						</div>';
		$disable_section_shortcode = $disable_section_shortcode_tmp;
		return $output;
	}

    public function vc_counter ($attributes, $content)
    {
        $attributes = shortcode_atts(
            array(
                'count' => '99',
                'suffix' => '',
                'prefix' => '',
                'color' => '',
                'title' => '',
            ), $attributes);

        $color_class = ($attributes['color'] != '')?' color_'.$attributes['color']:'';

        $output = 	'<div class="w-counter'.$color_class.'" data-count="'.$attributes['count'].'" data-prefix="'.$attributes['prefix'].'" data-suffix="'.$attributes['suffix'].'">
						<div class="w-counter-h">
							<div class="w-counter-number">'.$attributes['prefix'].$attributes['count'].$attributes['suffix'].'</div>
							<h6 class="w-counter-title">'.$attributes['title'].'</h6>
						</div>
					</div>';

        return $output;

    }

	public function vc_simple_slider($attributes)
	{
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attributes['ids'] ) )
		{
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attributes['orderby'] ) )
			{
				$attributes['orderby'] = 'post__in';
			}
			$attributes['include'] = $attributes['ids'];
		}

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attributes['orderby'] ) )
		{
			$attributes['orderby'] = sanitize_sql_orderby( $attributes['orderby'] );
			if ( !$attributes['orderby'] )
			{
				unset( $attributes['orderby'] );
			}
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'type'       => 's',
			'include'    => '',
			'exclude'    => '',
			'auto_rotation'    => null,
		), $attributes));


		$type_classes = ' type_slider';
		$size = 'gallery-full';


		$id = intval($id);

		if ( !empty($include) )
		{
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			if (is_array($_attachments))
			{
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			}
		}
		elseif ( !empty($exclude) )
		{
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
		else
		{
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
		{
			return '';
		}

		$rand_id = rand(100000, 999999);
		$output = '<div class="w-gallery'.$type_classes.'"><div class="w-gallery-main"><div class="w-gallery-main-h flexslider flex-loading" id="slider_'.$rand_id.'">';

		$i = 1;
		if (is_array($attachments))
		{

			$output .= '<ul class="slides">';
			foreach ( $attachments as $id => $attachment ) {

				$output .= '<li>';
				$output .= wp_get_attachment_image( $id, $size, 0 );
				$output .= '</li>';

				$i++;

			}
			$output .= '</ul>';

		}

		$output .= "</div></div></div>\n";

		$disable_rotation = '';
		if ( ! ($auto_rotation == 'yes' OR $auto_rotation == 1)) {
			$disable_rotation = 'slideshow: false,';
		}

		$output .= '<script type="text/javascript">
						jQuery(window).load(function() {
							jQuery("#slider_'.$rand_id.'").flexslider({
								'.$disable_rotation.'controlsContainer: "#slider_'.$rand_id.'",
								directionalNav: true,
								controlNav: false,
								start: function(slider) {
									slider.resize();
									jQuery("#slider_'.$rand_id.'").removeClass("flex-loading");
								}
							});
						});
					</script>';

		return $output;
	}

	public function vc_grid_blog_slider($attributes)
	{
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attributes['ids'] ) )
		{
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attributes['orderby'] ) )
			{
				$attributes['orderby'] = 'post__in';
			}
			$attributes['include'] = $attributes['ids'];
		}

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attributes['orderby'] ) )
		{
			$attributes['orderby'] = sanitize_sql_orderby( $attributes['orderby'] );
			if ( !$attributes['orderby'] )
			{
				unset( $attributes['orderby'] );
			}
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'type'       => 's',
			'include'    => '',
			'exclude'    => '',
			'auto_rotation'    => '1',
		), $attributes));


		$type_classes = ' type_slider';
		$size = 'gallery-full';


		$id = intval($id);

		if ( !empty($include) )
		{
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			if (is_array($_attachments))
			{
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			}
		}
		elseif ( !empty($exclude) )
		{
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
		else
		{
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
		{
			return '';
		}


		$rand_id = rand(100000, 999999);
		$output = '<div class="w-gallery'.$type_classes.'"><div class="w-gallery-main"><div class="w-gallery-main-h flexslider flex-loading" id="slider_'.$rand_id.'">';



		$i = 1;
		if (is_array($attachments))
		{

			$output .= '<ul class="slides">';
			foreach ( $attachments as $id => $attachment ) {

				$output .= '<li>';
				$output .= wp_get_attachment_image( $id, 'portfolio-list', 0 );
				$output .= '</li>';

				$i++;

			}
			$output .= '</ul>';



		}

		$output .= "</div></div></div>";

		$disable_rotation = '';
		if ($auto_rotation == 0) {
			$disable_rotation = 'slideshow: false,';
		}

		$output .= '<script type="text/javascript">
						jQuery(window).load(function() {
							jQuery("#slider_'.$rand_id.'").flexslider({
								'.$disable_rotation.'controlsContainer: "#slider_'.$rand_id.'",
								directionalNav: true,
								controlNav: false,
								start: function(slider) {
									jQuery("#slider_'.$rand_id.'").removeClass("flex-loading");
									slider.resize();
									jQuery(".w-blog.type_masonry .w-blog-list").isotope("reLayout");
								}
							});
						});
					</script>';

		return $output;
	}

	public function gallery($attributes)
	{
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attributes['ids'] ) )
		{
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attributes['orderby'] ) )
			{
				$attributes['orderby'] = 'post__in';
			}
			$attributes['include'] = $attributes['ids'];
		}

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attributes['orderby'] ) )
		{
			$attributes['orderby'] = sanitize_sql_orderby( $attributes['orderby'] );
			if ( !$attributes['orderby'] )
			{
				unset( $attributes['orderby'] );
			}
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'type'       => 's',
			'include'    => '',
			'exclude'    => ''
		), $attributes));

		if ( ! in_array($type, array('xs', 's', 'm', 'l', 'masonry', 'slider',))) {
			$type = "s";
		}

		$size = 'gallery-'.$type;
		if ($type == 'masonry') {
			$type_classes = ' type_masonry';
		} elseif ($type == 'slider') {
			$type_classes = ' type_slider';
			$size = 'gallery-full';
		} else {
			$type_classes = ' layout_tile size_'.$type;
		}


		$id = intval($id);
		if ( 'RAND' == $order )
		{
			$orderby = 'none';
		}

		if ( !empty($include) )
		{
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			if (is_array($_attachments))
			{
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			}
		}
		elseif ( !empty($exclude) )
		{
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
		else
		{
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
		{
			return '';
		}

		if ( is_feed() )
		{
			$output = "\n";
			if (is_array($attachments))
			{
				foreach ( $attachments as $att_id => $attachment )
					$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			}
			return $output;
		}


		if ($type == 'slider') {
			$rand_id = rand(100000, 999999);
			$output = '<div class="w-gallery'.$type_classes.'"><div class="w-gallery-main"><div class="w-gallery-main-h flexslider flex-loading" id="slider_'.$rand_id.'">';
		} else {
			$output = '<div class="w-gallery'.$type_classes.'"><div class="w-gallery-tnails">';
		}


		$i = 1;
		if (is_array($attachments))
		{
			if ($type == 'slider') {
				$output .= '<ul class="slides">';
				foreach ( $attachments as $id => $attachment ) {

					$output .= '<li>';
					$output .= wp_get_attachment_image( $id, $size, 0 );
					$output .= '</li>';

					$i++;

				}
				$output .= '</ul>';
				$output .= '<script type="text/javascript">
								jQuery(window).load(function() {
									jQuery("#slider_'.$rand_id.'").flexslider({
										controlsContainer: "#slider_'.$rand_id.'",
										directionalNav: true,
										controlNav: false,
										start: function(slider) {
											slider.resize();
											jQuery("#slider_'.$rand_id.'").removeClass("flex-loading");
										}
									});
								});
							</script>';
			} else {
				foreach ( $attachments as $id => $attachment ) {


					$title = trim(strip_tags( get_post_meta($id, '_wp_attachment_image_alt', true) ));
					if (empty($title))
					{
						$title = trim(strip_tags( $attachment->post_excerpt )); // If not, Use the Caption
					}
					if (empty($title ))
					{
						$title = trim(strip_tags( $attachment->post_title )); // Finally, use the title
					}

					$output .= '<a class="w-gallery-tnail order_'.$i.'" href="'.wp_get_attachment_url($id).'" title="'.$title.'">';
					$output .= '<span class="w-gallery-tnail-h">';
					$output .= wp_get_attachment_image( $id, $size, 0 );
					$output .= '<span class="w-gallery-tnail-title"></span>';

					$output .= '</span>';
					$output .= '</a>';

					$i++;

				}
			}

		}

		$output .= "</div></div>";

		return $output;
	}
}

global $us_shortcodes;

$us_shortcodes = new US_Shortcodes;

// Add buttons to tinyMCE
function us_add_buttons() {
	if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
	{
		add_filter('mce_external_plugins', 'us_tinymce_plugin');
		add_filter('mce_buttons_3', 'us_tinymce_buttons');
	}
}

function us_tinymce_buttons($buttons) {
	array_push($buttons, "columns", "separator_btn", "button_btn", "tabs", "accordion", "icon", "iconbox", "testimonial", "services", "team", "latest_posts", "portfolio", "clients", "actionbox", "video", "pricing_table", "counter", "alert", "contact_form", "contacts", "social_links", "gmaps");
	if(class_exists('RevSlider')){
		$slider_revolution = array();
		$slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		foreach($arrSliders as $revSlider) {
			$slider_revolution[$revSlider->getAlias()] = $revSlider->getTitle();
		}

		if (count ($slider_revolution) > 0) {
			array_push($buttons, "rev_slider");
		}
	}
	return $buttons;
}

function us_tinymce_plugin($plugin_array) {
	$plugin_array['columns'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['alert'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['tabs'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['accordion'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['video'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['team'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['button_btn'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['separator_btn'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['icon'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['iconbox'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['testimonial'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['latest_posts'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['portfolio'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['clients'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['actionbox'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['pricing_table'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['contact_form'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['social_links'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['contacts'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['gmaps'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['rev_slider'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['counter'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
//	$plugin_array['animate'] = get_template_directory_uri().'/functions/tinymce/buttons.js';

	return $plugin_array;
}

add_action('admin_init', 'us_add_buttons');

function us_media_templates(){

	?>
	<script type="text/html" id="tmpl-my-custom-gallery-setting">
		<label class="setting">
			<span>Type</span>
			<select data-setting="type">
				<option value="default_val">S size thumbs</option>
				<option value="xs">XS size thumbs</option>
				<option value="m">M size thumbs</option>
				<option value="l">L size thumbs</option>
				<option value="masonry">Masonry</option>
				<option value="slider">Slider</option>
			</select>
		</label>
	</script>

	<script>

		jQuery(document).ready(function(){

			// add your shortcode attribute and its default value to the
			// gallery settings list; $.extend should work as well...
			_.extend(wp.media.gallery.defaults, {
				type: 'default_val'
			});

			// merge default gallery settings template with yours
			wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
				template: function(view){
					return wp.media.template('gallery-settings')(view)
						+ wp.media.template('my-custom-gallery-setting')(view);
				}
			});

		});

	</script>
<?php

}

// Add Type select to Gallery window
//add_action('print_media_templates', 'us_media_templates');

