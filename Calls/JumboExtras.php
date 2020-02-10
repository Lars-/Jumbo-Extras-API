<?php


namespace LJPc\JumboExtras\Calls;


class JumboExtras extends Call {
	/**
	 * @param string $username
	 * @param string $password
	 *
	 * @return $this
	 */
	public function login( string $username, string $password ): self {
		$data = self::execute( '/api/auth/login', 'POST', [
			'username' => $username,
			'password' => $password,
		] );

		self::setAccessToken( $data['accessToken'] );
		self::setRefreshToken( $data['refreshToken'] );

		return $this;
	}

	/**
	 * @return $this
	 */
	public function refreshToken(): self {
		$data = self::execute( '/api/auth/refresh', 'POST', [
			'refreshToken' => self::getRefreshToken(),
		] );

		self::setAccessToken( $data['accessToken'] );
		self::setRefreshToken( $data['refreshToken'] );

		return $this;
	}

	/**
	 * @return array
	 */
	public function getBalance(): array {
		return self::execute( '/api/balance' );
	}

	/**
	 * @return array
	 */
	public function getSavingOffers(): array {
		return self::execute( '/api/promotions/savingoffers' );
	}

	/**
	 * @return array
	 */
	public function getRedeemOffers(): array {
		return self::execute( '/api/promotions/redeemoffers' );
	}

	/**
	 * @return array
	 */
	public function getProfile(): array {
		return self::execute( '/api/user/profile' );
	}

	/**
	 * @return array
	 */
	public function getHomeScreen(): array {
		return self::execute( '/api/promotions/homescreen' );
	}

	/**
	 * @param bool $purchaseStamps
	 * @param bool $promotionStamps
	 * @param bool $printReceipt
	 *
	 * @return bool
	 */
	public function updateProfile( bool $purchaseStamps, bool $promotionStamps, bool $printReceipt ): bool {
		return self::execute( '/api/user/profile', 'PUT', [
			'checkoutPreferences' => [
				'purchaseStamps'  => $purchaseStamps,
				'promotionStamps' => $promotionStamps,
				'printReceipt'    => $printReceipt,
			],
		] );
	}
}
