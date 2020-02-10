# Jumbo Extra's API
This API is intended to do the same things as the Jumbo Extra's API.

## Installation
Include this repository in your project with composer:
```
composer require ljpc/jumboextras
```

## Authentication
Authentication is pretty simple.

With username/password:
```php
$jumboExtraInstance = new \LJPc\JumboExtras\Calls\JumboExtras();
$jumboExtraInstance->login($username, $password);
```

With accesstoken/refreshtoken:
```php
$jumboExtraInstance = new \LJPc\JumboExtras\Calls\JumboExtras();
$jumboExtraInstance::setAccessToken($accessToken);
$jumboExtraInstance::setRefreshToken($refreshToken);
```

To refresh an access token:
```php
$jumboExtraInstance->refreshToken();
```

## Get balance
Call:
```php
$balance = $jumboExtraInstance->getBalance();
```

Returns:
```json
{
    "balance": 123,
    "cardId": "2622274330410"
}
```

## Get saving offers
Call:
```php
$savingOffers = $jumboExtraInstance->getSavingOffers();
```

Returns:
```json
[
    ...
    {
        "id": "1500000168",
        "promotionType": "GENERAL",
        "points": 35,
        "spendType": "UNIT",
        "minimumSpent": 1,
        "incentiveVersion": "PRODUCT_EARN",
        "image": "https:\/\/www.jumbo.com\/dam\/extra\/instore\/p2\/Lor_espressocapsules.png",
        "title": "L'or koffiecups",
        "description": "Pak 10 stuks",
        "startDate": "2020-01-29",
        "expirationDate": "2020-02-25"
    },
    ...
]
```

## Get redeem offers
Call:
```php
$redeemOffers = $jumboExtraInstance->getRedeemOffers();
```

Returns:
```json
[
    ...
    {
        "id": "1500000190",
        "incentiveVersion": "PRODUCT_BURN",
        "image": "https:\/\/www.jumbo.com\/dam\/extra\/instore\/p2\/Jumbo_cola.png",
        "title": "Jumbo regular, light en zero cola",
        "description": "Fles 1,5L",
        "startDate": "2020-01-29",
        "expirationDate": "2020-02-25",
        "percentageDiscount": 100,
        "burnPointsAmount": 100,
        "buyItemsAmount": 1
    },
    ...
]
```

## Get homescreen
Call:
```php
$homescreen = $jumboExtraInstance->getHomescreen();
```

Returns:
```json
[
    {
        "id": "1500000082",
        "incentiveVersion": "MASS_CASH_BURN",
        "image": "https:\/\/www.jumbo.com\/dam\/extra\/alg\/2.50-korting.png",
        "title": "2,50 euro korting",
        "description": "Op je kassabon",
        "startDate": "2019-12-04",
        "expirationDate": "2020-04-28",
        "eurosDiscount": 2.5,
        "extraMoneyAmount": 2.5,
        "burnPointsAmount": 500
    },
    {
        "id": "1500000080",
        "points": 100,
        "spendType": "TRANSACTION",
        "minimumSpent": 3,
        "incentiveVersion": "WELCOME_CONTINUITY",
        "image": "https:\/\/www.jumbo.com\/dam\/extra\/alg\/card-100points.png",
        "title": "Welkomstpunten",
        "description": "Speciaal voor jou",
        "startDate": "2019-12-04",
        "expirationDate": "2020-04-21"
    }
]
```

## Get profile
Call:
```php
$profile = $jumboExtraInstance->getProfile();
```

Returns:
```json
{
    "customerId": "f0a206b9----------------c249e6463f45",
    "name": {
        "familyName": "Jansen",
        "givenName": "Lars"
    },
    "birthDate": "[yyyy-mm-dd]",
    "email": "[HIDDEN]",
    "primaryPhone": {
        "primary": false,
        "typeCode": "Home",
        "countryCode": 31,
        "number": "[HIDDEN]"
    },
    "homeAddress": {
        "country": {
            "code": "NL",
            "name": "Netherlands"
        },
        "city": "[HIDDEN]",
        "postalCode": "[HIDDEN]",
        "street": "[HIDDEN]",
        "number": "[HIDDEN]"
    },
    "avgProfiling": {
        "isAllowed": true
    },
    "termsAndConditions": {
        "accepted": true
    },
    "checkoutPreferences": {
        "purchaseStamps": false,
        "promotionStamps": false,
        "printReceipt": false
    },
    "storePreferences": {
        "complexNumber": "[HIDDEN]",
        "name": "[HIDDEN]",
        "city": "[HIDDEN]"
    },
    "loyaltyCard": {
        "number": "2622274330410"
    }
}
```

## Update profile
Call:
```php
$jumboExtraInstance->updateProfile( bool $purchaseStamps, bool $promotionStamps, bool $printReceipt );
```

Returns:
```json
true
```

