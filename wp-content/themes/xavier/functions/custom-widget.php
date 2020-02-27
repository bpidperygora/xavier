<?php

function console_log( $data ) {
	echo '<script>';
	echo 'console.log(' . json_encode( $data ) . ')';
	echo '</script>';
}

class WP_Widget_Get_Currency extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'currency',
			'description'                 => __( 'to_currency' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'to_currency', __( 'Currency' ), $widget_ops );
		$this->alt_option_name = 'to_currency';
	}


	public function widget( $args, $instance ) {
		echo '<h5 class="mb-5">This is widget, currency course taken by API on PHP</h5>';

		function convertCurrency() {
			$apikey        = '532d3ce88aff5865acea';
			$amount        = 1;
			$from_Currency = 'USD';
			$to_Currency   = 'UAH';

			$list     = file_get_contents( "https://free.currconv.com/api/v7/currencies?apiKey={$apikey}" );
			$items    = json_decode( $list, true );
			$itemsIds = array_map(
				function ( $person ) {
					return $person['id'];
				},
				$items['results']
			);
			echo '<div id="selectBlock" class=""data-api="', $apikey, '">';
			echo '<div class="flex justify-content-between w-100">';

				echo '<select class="w-50 mr-1 ml-1 currency" id="fromCurrency">';
				foreach ( $itemsIds as $id ) {
					if ( $id === $from_Currency ) {
						echo '<option value="', $id, '" selected>';
					} else {
						echo '<option value="', $id, '">';
					}
					echo $id, '</option>';
				}
				echo '</select>';
				echo '<select class="w-50 mr-1 ml-1 currency" id="toCurrency">';
				foreach ( $itemsIds as $id ) {
					if ( $id === $to_Currency ) {
						echo '<option value="', $id, '" selected>';
					} else {
						echo '<option value="', $id, '">';
					}
					echo $id, '</option>';
				}
				echo '</select>';
			echo '</div>';

			$query    = "{$from_Currency}_{$to_Currency}";
			$currency = file_get_contents( "https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}" );
			$obj      = json_decode( $currency, true );

			$val   = floatval( $obj["$query"] );
			$total = $val * $amount;
			echo '<p class="mt-4" id="currencyCourse"> Currency course is: ', '<span class="font-weight-bolder">', number_format( $total, 2, '.', '' ), '</span></p>';
			echo '</div>';
		}

		convertCurrency();

		echo '<h5 class="mb-1">To change currency pair or Show history we will be using JavaScript</h5>';
		echo '<h6 class="mb-4">(max renge 8 days with this API)</h6>';

		wp_enqueue_script( 'jq-ui.min.js' );
		wp_enqueue_script( 'apiControl.js' );
		wp_enqueue_style( 'datepicker.css' );

		echo '
		<div id="sandbox-container">
			<div class="input-daterange input-group" id="datepicker">
			    <input type="text" class="input-sm form-control" name="start">
			    <span class="input-group-addon">to</span>
			    <input type="text" class="input-sm form-control" name="end">
			</div>
		</div>
		';

		echo '<div class="mt-2" id="history"></div>';
		echo '<button class="mt-2" id="show">Show History</button>';
	}
}


// Регистрация класса виджета
add_action( 'widgets_init', 'my_register_widgets' );
function my_register_widgets() {
	register_widget( 'WP_Widget_Get_Currency' );
}
