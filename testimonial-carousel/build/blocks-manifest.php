<?php
// This file is generated. Do not modify it manually.
return array(
	'testimonial-carousel' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/testimonial-carousel',
		'version' => '0.1.0',
		'title' => 'Testimonial Carousel',
		'category' => 'widgets',
		'icon' => 'media-interactive',
		'description' => 'An interactive block with the Interactivity API.',
		'example' => array(
			
		),
		'attributes' => array(
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'eyebrow' => array(
				'type' => 'string',
				'default' => 'Client Success Stories'
			),
			'heading' => array(
				'type' => 'string',
				'default' => 'Trusted by Forward-Thinking Teams'
			),
			'description' => array(
				'type' => 'string',
				'default' => 'Join the innovators who\'ve accelerated their delivery with AI-powered workflows'
			),
			'footer' => array(
				'type' => 'string',
				'default' => 'Powering modern WordPress development'
			),
			'testimonials' => array(
				'type' => 'array',
				'default' => array(
					array(
						'quote' => '"The AI-assisted development workflow cut our delivery time by 60%. What used to take weeks now ships in days, with cleaner code and better architecture."',
						'initials' => 'SC',
						'name' => 'Sarah Chen',
						'role' => 'Product Director',
						'company' => 'Velocity Labs',
						'metric' => '60% Faster'
					),
					array(
						'quote' => '"Finally, a team that actually understands modern workflows. The communication is crystal clear, the execution is flawless, and the automation they built has transformed how we ship features."',
						'initials' => 'MR',
						'name' => 'Marcus Rodriguez',
						'role' => 'CTO',
						'company' => 'StreamFlow Inc',
						'metric' => 'Elite Execution'
					),
					array(
						'quote' => '"Switching to their AI-powered approach was a game changer. The implementation quality is exceptional, and their proactive problem-solving saved us from countless headaches."',
						'initials' => 'EW',
						'name' => 'Emily Watson',
						'role' => 'Engineering Lead',
						'company' => 'Horizon Digital',
						'metric' => '5-Star Quality'
					)
				)
			)
		),
		'supports' => array(
			'align' => array(
				'full'
			),
			'html' => false,
			'interactivity' => true
		),
		'textdomain' => 'testimonial-carousel',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScriptModule' => 'file:./view.js'
	)
);
