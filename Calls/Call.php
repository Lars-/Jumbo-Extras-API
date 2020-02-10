<?php


namespace LJPc\JumboExtras\Calls;


class Call {
	private const BASE = 'https://loyalty-app.jumbo.com';
	/**
	 * @var string
	 */
	private static $accessToken = '';
	/**
	 * @var string
	 */
	private static $refreshToken = '';

	/**
	 * @return string
	 */
	protected static function getRefreshToken(): string {
		return self::$refreshToken;
	}

	/**
	 * @param string $refreshToken
	 */
	public static function setRefreshToken( string $refreshToken ): void {
		self::$refreshToken = $refreshToken;
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @param array $data
	 *
	 * @return array|null|bool
	 */
	protected static function execute( string $url, string $method = 'GET', array $data = [] ) {
		if ( strtoupper( $method ) === 'GET' ) {
			return self::getCall( $url );
		}

		if ( strtoupper( $method ) === 'POST' ) {
			return self::postCall( $url, $data );
		}

		if ( strtoupper( $method ) === 'PUT' ) {
			return self::putCall( $url, $data );
		}
	}

	/**
	 * @param string $url
	 *
	 * @return array|null
	 */
	private static function getCall( string $url ): ?array {
		$curl = curl_init();

		$headers = [
			'Content-Type: application/json',
		];
		if ( ! empty( self::getAccessToken() ) ) {
			$headers[] = 'Authorization: Bearer ' . self::getAccessToken();
		}

		curl_setopt_array( $curl, [
			CURLOPT_URL            => self::BASE . $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'GET',
			CURLOPT_HTTPHEADER     => $headers,
		] );

		$response = curl_exec( $curl );

		curl_close( $curl );

		return json_decode( $response, true );
	}

	/**
	 * @return string
	 */
	protected static function getAccessToken(): string {
		return self::$accessToken;
	}

	/**
	 * @param string $accessToken
	 */
	public static function setAccessToken( string $accessToken ): void {
		self::$accessToken = $accessToken;
	}

	/**
	 * @param string $url
	 * @param array $data
	 *
	 * @return array|null
	 */
	private static function postCall( string $url, array $data ): ?array {
		$curl = curl_init();

		$headers = [
			'Content-Type: application/json',
		];
		if ( ! empty( self::getAccessToken() ) ) {
			$headers[] = 'Authorization: Bearer ' . self::getAccessToken();
		}

		curl_setopt_array( $curl, [
			CURLOPT_URL            => self::BASE . $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => json_encode( $data ),
			CURLOPT_HTTPHEADER     => $headers,
		] );

		$response = curl_exec( $curl );

		curl_close( $curl );

		return json_decode( $response, true );
	}

	/**
	 * @param string $url
	 * @param array $data
	 *
	 * @return bool|null
	 */
	private static function putCall( string $url, array $data ): ?bool {
		$curl = curl_init();

		$headers = [
			'Content-Type: application/json',
		];
		if ( ! empty( self::getAccessToken() ) ) {
			$headers[] = 'Authorization: Bearer ' . self::getAccessToken();
		}

		curl_setopt_array( $curl, [
			CURLOPT_URL            => self::BASE . $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'PUT',
			CURLOPT_POSTFIELDS     => json_encode( $data ),
			CURLOPT_HTTPHEADER     => $headers,
		] );

		$response = curl_exec( $curl );

		curl_close( $curl );

		return json_decode( $response, true );
	}
}
