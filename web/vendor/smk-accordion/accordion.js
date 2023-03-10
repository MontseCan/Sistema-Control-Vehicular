/**
 * Plugin Name : Accordion.JS
 * Version     : 2.1.0
 * Author      : ZeroWP Team
 * Author URL  : http://zerowp.com/
 * Plugin URL  : http://accordionjs.zerowp.com/
 * License     : MIT
 */
;(function ( $ ) {

	"use strict";

	$.fn.accordionjs = function( options ) {

		// Select all accordions that match a CSS selector
		if (this.length > 1){
			this.each(function() {
				$(this).accordionjs(options);
			});
			return this;
		}

		// Current accordion instance
		var accordion = this;

		// Setup utility functions
		var util = {

			/**
			 * Is integer
			 *
			 * Check if a value is a valid integer number
			 *
			 * @param {number} value
			 * @return {bool}
			 */
			isInteger:  function(value) {
				return typeof value === 'number' &&
					isFinite(value) &&
					Math.floor(value) === value;
			},

			//------------------------------------//--------------------------------------//

			/**
			 * Is array
			 *
			 * Check if a value is a valid array.
			 *
			 * @param {Array} arg
			 * @return {bool}
			 */
			isArray: function(arg) {
				return Object.prototype.toString.call(arg) === '[object Array]';
			},

			//------------------------------------//--------------------------------------//

			/**
			 * Is object
			 *
			 * Check if a value is a valid object.
			 *
			 * @param {Object} arg
			 * @return {bool}
			 */
			isObject: function isObject(arg) {
				return Object.prototype.toString.call(arg) === '[object Object]';
			},

			//------------------------------------//--------------------------------------//

			/**
			 * Sections is open
			 *
			 * Check if a section from current accordion is open.
			 *
			 * @param {Object}(jQuery) section
			 * @return {bool}
			 */
			sectionIsOpen: function( section ){
				return section.hasClass( 'acc_active' );
			},


			//------------------------------------//--------------------------------------//

			/**
			 * Get hash
			 *
			 * Get hash substring without # or false if the window does not have one.
			 *
			 * @return {string|bool(false)}
			 */
			getHash: function(){
				if(window.location.hash) {
					return window.location.hash.substring(1);
				}

				return false;
			},
		};

		/* Setup options
		---------------------*/
		var settings = $.extend({
			// Allow self close.
			closeAble   : false,

			// Close other sections.
			closeOther  : true,

			// Animation Speed.
			slideSpeed  : 150,

			// The section open on first init. A number from 1 to X or false.
			activeIndex : 1,

			// Callback when a section is open
			openSection: false, // function( section ){}

			// Callback before a section is open
			beforeOpenSection: false, // function( section ){}
		}, options );

		// Assign to accordion options data-* attributes if they exists
		$.each(settings, function( option ) {
			var data_attr = option.replace(/([A-Z])/g, '-$1').toLowerCase().toString(), //`optionsName` becomes `option-name`
			new_val       =  accordion.data( data_attr );

			if( new_val || false === new_val ){
				settings[ option ] = new_val;
			}
		});

		/*
		If the activeIndex is false then all sections are closed by default.
		If the closeOther is false then other section will not be closed when
		this is opened. That means, in both cases, sections should be able
		to be closed independently.
		*/
		if( settings.activeIndex === false || settings.closeOther === false ){
			settings.closeAble = true;
		}

		//------------------------------------//--------------------------------------//

		/**
		 * "Constructor"
		 *
		 * @return void
		 */
		var init = function() {
			accordion.create();
			accordion.openOnClick();

			$(window).on( 'load', function(){
				accordion.openOnHash();
			});

			$(window).on( 'hashchange', function(){
				accordion.openOnHash();
			});
		};

		//------------------------------------//--------------------------------------//

		/**
		 * Open section
		 *
		 * Open a single section. ???X  ???Q  ???I  ???A  ???:  ???3  ???,  ???%  ???  ???  ???  ???  ???   ???y  ???r  ???k  ???c  ???\  ???T  ???M  ???F  ????  ???8  ???1  ???*  ???#  ???  ???  ???  ???  ???~  ???w  ???p  ???i  ???b  ???[  ???T  ???M  ???F  ????  ???8  ???1  ???*  ???#  ???  ???  ???  ???  ???  ???x  ???p  ???i  ???b  ???[  ???T  ???M  ???F  ????  ???8  ???1  ???*  ???#  ???  ???  ???  ???  ???   ???y  ???r  ???k  ???d  ???]  ???V  ???O  ???Hm???   SQLite format 3   @    5~  K                                                           5~ .WJ   ?    ?? ? ?                                                                                                ?77?[tableabnormal_uidelay_dataabnormal_uidelay_dataCREATE TABLE abnormal_uidelay_data (_ID INTEGER PRIMARY KEY NOT NULL, timestamp INTEGER NOT NULL, formatted_timestamp TEXT NOT NULL, uidelay_reason INTEGER NOT NULL, uidelay_list TEXT NOT NULL, system_total_mem INTEGER NOT NULL, system_total_virtual_mem INTEGER NOT NULL, standby_cache INTEGER NOT NULL, cpu_usage_list TEXT NOT NULL, cpu_freq_list TEXT NOT NULL, gpu0_usage_list TEXT NOT NULL, gpu1_usage_list TEXT NOT NULL, sys_mem_list TEXT NOT NULL, page_usage_list TEXT NOT NULL, process_cpu_top5 TEXT NOT NULL, process_mem_top5 TEXT NOT NULL, process_page_top5 TEXT NOT NULL, process_gpu_top3 TEXT NOT NULL, foreground_process_list TEXT NOT NULL, cpu_power_list TEXT NOT NULL, cpu_ewma_power_list TEXT NOT NULL, gpu_power_list TEXT NOT NULL, igpu_power_list TEXT NOT NULL, create_process_info_list TEXT NOT NULL, if_foreground_process_delay INTEGER NOT NULL, ac_status INTEGER NOT NULL, power_slider INTEGER NOT NULL, pl1 REAL NOT NULL, pl2 REAL NOT NULL, peci_pl1 REAL NOT NULL, peci_pl2 REAL NOT NULL, psys1 INTEGER NOT NULL, psys2 INTEGER NOT NULL, bios_reason INTEGER NOT NULL, prochot_reason_time TEXT NOT NULL, msr_reason1 TEXT NOT NULL, msr_reason2 TEXT NOT NULL, msr_reason3 TEXT NOT NULL, prochot INTEGER NOT NULL, position INTEGER NOT NULL)?O99?9tableabnormal_prochot_eventabnormal_prochot_eventCREATE TABLE abnormal_prochot_event (_ID INTEGER PRIMARY KEY NOT NULL, start_time INTEGER NOT NULL, formatted_timestamp TEXT NOT NULL, bios_detect_reason INTEGER NOT NULL, msr_reason1 TEXT NOT NULL, msr_reason2 TEXT NOT NULL, msr_reason3 TEXT NOT NULL, battery_capacity INTEGER NOT NULL, charge INTEGER NOT NULL, cpu_temp INTEGER NOT NULL, dgpu_dts_temp INTEGER NOT NULL, soc_ntc_temp INTEGER NOT NULL, gpu_ntc_temp INTEGER NOT NULL, typec_ntc_temp INTEGER NOT NULL, charge_ntc_temp INTEGER NOT NULL, ddr_ntc_temp INTEGER NOT NULL, battery_ntc_temp INTEGER NOT NULL, ambience_ntc_temp INTEGER NOT NULL, typec2_ntc_temp INTEGER NOT NULL, soc2_ntc_temp INTEGER NOT NULL, virt_ambience_temp INTEGER NOT NULL, virt_ccase_temp1 INTEGER NOT NULL, virt_ccase_temp2 INTEGER NOT NULL, virt_ccase_left_edge_temp INTEGER NOT NULL, virt_ccase_right_edge_temp INTEGER NOT NULL, virt_keyboard_temp1 INTEGER NOT NULL, virt_keyboard_temp2 INTEGER NOT NULL, virt_left_palm_temp INTEGER NOT NULL, virt_right_palm_temp INTEGER NOT NULL, virt_touchpad_temp INTEGER NOT NULL, virt_dcase_cpu_temp INTEGER NOT NULL, virt_dcase_gpu_temp INTEGER NOT NULL, virt_dcase_airout_temp INTEGER NOT NULL, otp_temp INTEGER NOT NULL, power_on_ambience_temp INTEGER NOT NULL, cpu_freq_list TEXT NOT NULL, top5_cpu_usage_app TEXT NOT NULL)?0II?[tableabnormal_memory_high_used_dataabnormal_memory_high_used_dataCREATE TABLE abnormal_memory_high_used_data (_ID INTEGER PRIMARY KEY NOT NULL, start_time INTEGER NOT NULL, formatted_start_time TEXT NOT NULL, end_time INTEGER NOT NULL, formatted_end_time TEXT NOT NULL, duration INTEGER NOT NULL, sys_phy_memory INTEGER NOT NULL, sys_phy_memory_usage INTEGER NOT NULL, sys_page_file INTEGER NOT NULL, sys_page_file_usage INTEGER NOT NULL, proc_mem_topN TEXT NOT NULL, proc_page_topN TEXT NOT NULL, user_mem INTEGER NOT NULL, user_page INTEGER NOT NULL)?99?!tableabnormal_cpu_high_loadabnormal_cpu_high_loadCREATE TABLE abnormal_cpu_high_load (_ID INTEGER PRIMARY KEY NOT NULL, start_time INTEGER NOT NULL, formatted_start_time TEXT NOT NULL, end_time INTEGER NOT NULL, formatted_end_time TEXT NOT NULL, app TEXT NOT NULL, usage_rate REAL NOT NULL, service_name TEXT NOT NULL, bg_usage INTEGER NOT NULL, bg_energy INTEGER NOT NULL, fg_usage INTEGER NOT NULL, fg_energy INTEGER NOT NULL, pid INTEGER NOT NULL, type INTEGER NOT NULL, charge_duration INTEGER NOT NULL)y?Atabledb_statusdb_statusCREATE TABLE db_status (_ID INTEGER PRIMARY KEY NOT NULL, db_create_time INTEGER   	
   m??                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ??? ?c?    ???#  K                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        